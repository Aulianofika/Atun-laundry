<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Service;
use App\Models\User;

class OrderController extends Controller
{
    private function checkAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return false;
        }
        return true;
    }

    // ================= ADMIN =================
    public function index()
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        $orders = Order::with('user','orderItems.service')->orderBy('order_date','desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        $customers = User::where('role','customer')->get();
        $services = Service::all();
        return view('admin.orders.create', compact('customers','services'));
    }

    public function store(Request $request)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'delivery_type' => 'required|in:antar_sendiri,jemput_antar',
            'services' => 'required|array',
            'quantities' => 'required|array'
        ]);

        $order = Order::create([
            'user_id' => $request->user_id,
            'order_date' => now(),
            'delivery_type' => $request->delivery_type,
            'status' => 'pending',
            'payment_status' => 'unpaid',
            'total' => 0
        ]);

        $total = 0;
        foreach($request->services as $index => $service_id) {
            $service = Service::find($service_id);
            $quantity = $request->quantities[$index];
            $subtotal = $service->price * $quantity;

            OrderItem::create([
                'order_id' => $order->id,
                'service_id' => $service_id,
                'quantity' => $quantity,
                'subtotal' => $subtotal
            ]);

            $total += $subtotal;
        }

        $order->total = $total;
        $order->save();

        return redirect('/admin/orders')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $order = Order::with('orderItems.service')->findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,process,done,taken',
            'payment_status' => 'required|in:unpaid,paid'
        ]);

        $order->status = $request->status;
        $order->payment_status = $request->payment_status;
        $order->save();

        return redirect('/admin/orders')->with('success', 'Pesanan berhasil diupdate!');
    }

    public function destroy($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect('/admin/orders')->with('success', 'Pesanan berhasil dihapus!');
    }

    // ================= CUSTOMER =================
    // Klik tombol "Pesan" langsung membuat order
    public function orderCustomer(Service $service)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'customer') {
            return redirect('/login')->with('error', 'Akses ditolak!');
        }

        // Order langsung dengan quantity 1 dan delivery default
        $quantity = 1;
        $delivery_type = 'antar_sendiri';
        $subtotal = $service->price * $quantity;

        $order = Order::create([
            'user_id' => $user->id,
            'order_date' => now(),
            'delivery_type' => $delivery_type,
            'status' => 'pending',
            'payment_status' => 'unpaid',
            'total' => $subtotal
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'service_id' => $service->id,
            'quantity' => $quantity,
            'subtotal' => $subtotal
        ]);

        return redirect('/customer/home')->with('success', 'Pesanan berhasil dibuat!');
    }
}
