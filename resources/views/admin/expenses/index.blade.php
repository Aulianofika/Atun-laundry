@extends('layouts.admin')

@section('title','Data Pengeluaran')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Data Pengeluaran</h2>
    <a href="{{ url('/admin/expenses/create') }}" class="btn btn-primary">+ Tambah Pengeluaran</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Item</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expenses as $expense)
        <tr>
            <td>{{ $expense->item }}</td>
            <td>{{ $expense->date->format('d-m-Y') }}</td>
            <td>{{ $expense->quantity }}</td>
            <td>{{ number_format($expense->price,0,',','.') }}</td>
            <td>{{ number_format($expense->quantity * $expense->price,0,',','.') }}</td>
            <td>
                <a href="{{ url('/admin/expenses/'.$expense->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ url('/admin/expenses/'.$expense->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus pengeluaran ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
