<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

class ServiceController extends Controller
{
    private function checkAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return false;
        }
        return true;
    }

    public function index()
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'unit' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            // Simpan gambar ke storage/app/public/services
            $path = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit,
            'image' => $path,
        ]);

        return redirect('/admin/services')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'unit' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $service = Service::findOrFail($id);

        // Jika user upload gambar baru, hapus yang lama dan simpan yang baru
        if ($request->hasFile('image')) {
            if ($service->image && file_exists(storage_path('app/public/' . $service->image))) {
                unlink(storage_path('app/public/' . $service->image));
            }
            $path = $request->file('image')->store('services', 'public');
            $service->image = $path;
        }

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit,
            'image' => $service->image,
        ]);

        return redirect('/admin/services')->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $service = Service::findOrFail($id);

        // Hapus gambar dari storage
        if ($service->image && file_exists(storage_path('app/public/' . $service->image))) {
            unlink(storage_path('app/public/' . $service->image));
        }

        $service->delete();

        return redirect('/admin/services')->with('success', 'Layanan berhasil dihapus!');
    }
}
