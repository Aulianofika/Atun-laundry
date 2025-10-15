@extends('layouts.admin')

@section('title','Gaji Karyawan')

@section('content')
<h2 class="mb-4">Daftar Gaji Karyawan</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ url('/admin/salaries/create') }}" class="btn btn-primary mb-3">+ Tambah Gaji</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Karyawan</th>
            <th>Tanggal</th>
            <th>Berat (kg)</th>
            <th>Tarif/kg</th>
            <th>Total Gaji</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($salaries as $salary)
        <tr>
            <td>{{ $salary->employee_name }}</td>
            <td>{{ $salary->date->format('d-m-Y') }}</td>
            <td>{{ $salary->weight }}</td>
            <td>{{ number_format($salary->rate_per_kg,0,',','.') }}</td>
            <td>{{ number_format($salary->weight * $salary->rate_per_kg,0,',','.') }}</td>
            <td>
                <a href="{{ url('/admin/salaries/'.$salary->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ url('/admin/salaries/'.$salary->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data gaji ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
