<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Promo;

class AdminController extends Controller
{
    public function index()
    {
        // cek role manual
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/login')->with('error', 'Akses ditolak!');
        }

        $totalOrders = Order::count();
        $totalIncome = Order::where('payment_status', 'paid')->sum('total');
        $totalCustomers = User::where('role', 'customer')->count();
        $activePromos = Promo::where('active', true)->count();

        return view('admin.dashboard', compact(
            'totalOrders', 'totalIncome', 'totalCustomers', 'activePromos'
        ));
    }
}
