<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployeeSalary;

class EmployeeSalaryController extends Controller
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
        $salaries = EmployeeSalary::orderBy('date','desc')->get();
        return view('admin.salaries.index', compact('salaries'));
    }

    public function create()
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        return view('admin.salaries.create');
    }

    public function store(Request $request)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $request->validate([
            'employee_name' => 'required|string',
            'date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'rate_per_kg' => 'required|integer|min:0',
        ]);

        EmployeeSalary::create([
            'employee_name' => $request->employee_name,
            'date' => $request->date,
            'weight' => $request->weight,
            'rate_per_kg' => $request->rate_per_kg,
            'total_salary' => $request->weight * $request->rate_per_kg
        ]);

        return redirect('/admin/salaries')->with('success', 'Gaji karyawan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        $salary = EmployeeSalary::findOrFail($id);
        return view('admin.salaries.edit', compact('salary'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');

        $request->validate([
            'employee_name' => 'required|string',
            'date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'rate_per_kg' => 'required|integer|min:0',
        ]);

        $salary = EmployeeSalary::findOrFail($id);
        $salary->update([
            'employee_name' => $request->employee_name,
            'date' => $request->date,
            'weight' => $request->weight,
            'rate_per_kg' => $request->rate_per_kg,
            'total_salary' => $request->weight * $request->rate_per_kg
        ]);

        return redirect('/admin/salaries')->with('success', 'Gaji karyawan berhasil diupdate!');
    }

    public function destroy($id)
    {
        if (!$this->checkAdmin()) return redirect('/login')->with('error', 'Akses ditolak!');
        $salary = EmployeeSalary::findOrFail($id);
        $salary->delete();
        return redirect('/admin/salaries')->with('success', 'Gaji karyawan berhasil dihapus!');
    }
}
