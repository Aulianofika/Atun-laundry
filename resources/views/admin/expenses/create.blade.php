@extends('layouts.admin')

@section('title','Tambah Pengeluaran')

@section('content')
<h2>Tambah Pengeluaran</h2>
<form method="POST" action="/admin/expenses">
    @csrf
    <div class="mb-3">
        <label>Item</label>
        <input type="text" name="item" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="quantity" class="form-control" min="1" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" class="form-control" min="0" required>
    </div>
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
    </div>
    <button class="btn btn-primary" type="submit">Simpan Pengeluaran</button>
    <a href="/admin/expenses" class="btn btn-secondary">Kembali</a>
</form>
@endsection
