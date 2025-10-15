<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Promo;

class PromoController extends Controller
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
        $promos = Promo::orderBy('valid_until','desc')->get();
        return view('admin.promos.index', compact('promos'));
    }

    public function create()
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        return view('admin.promos.create');
    }

    public function store(Request $request)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $request->validate([
            'code' => 'required|unique:promos,code',
            'title' => 'required',
            'discount' => 'required|integer|min:0|max:100',
            'valid_until' => 'required|date',
            'description' => 'nullable',
            'active' => 'nullable'
        ]);

        Promo::create([
            'code' => $request->code,
            'title' => $request->title,
            'description' => $request->description,
            'discount' => $request->discount,
            'valid_until' => $request->valid_until,
            'active' => $request->has('active')
        ]);

        return redirect('/admin/promos')->with('success', 'Promo berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        $promo = Promo::findOrFail($id);
        return view('admin.promos.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $request->validate([
            'code' => 'required|unique:promos,code,'.$id,
            'title' => 'required',
            'discount' => 'required|integer|min:0|max:100',
            'valid_until' => 'required|date',
            'description' => 'nullable',
            'active' => 'nullable'
        ]);

        $promo = Promo::findOrFail($id);
        $promo->update([
            'code' => $request->code,
            'title' => $request->title,
            'description' => $request->description,
            'discount' => $request->discount,
            'valid_until' => $request->valid_until,
            'active' => $request->has('active')
        ]);

        return redirect('/admin/promos')->with('success', 'Promo berhasil diupdate!');
    }

    public function destroy($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        $promo = Promo::findOrFail($id);
        $promo->delete();
        return redirect('/admin/promos')->with('success', 'Promo berhasil dihapus!');
    }
}
