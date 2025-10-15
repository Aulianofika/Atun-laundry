<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

class ExpenseController extends Controller
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
        $expenses = Expense::orderBy('date','desc')->get();
        return view('admin.expenses.index', compact('expenses'));
    }

    public function create()
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        return view('admin.expenses.create');
    }

    public function store(Request $request)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $request->validate([
            'item' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
            'date' => 'required|date'
        ]);

        Expense::create($request->only('item','quantity','price','date'));

        return redirect('/admin/expenses')->with('success', 'Pengeluaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        $expense = Expense::findOrFail($id);
        return view('admin.expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $request->validate([
            'item' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
            'date' => 'required|date'
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->only('item','quantity','price','date'));

        return redirect('/admin/expenses')->with('success', 'Pengeluaran berhasil diupdate!');
    }

    public function destroy($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect('/admin/expenses')->with('success', 'Pengeluaran berhasil dihapus!');
    }
}
