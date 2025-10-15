@extends('layouts.admin')

@section('title','Edit Pengeluaran')

@section('content')
<h2>Edit Pengeluaran</h2>
<form method="POST" action="/admin/expenses/{{ $expense->id }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Item</label>
        <input type="text" name="item" class="form-control" value="{{ $expense->item }}" required>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="quantity" class="form-control" min="1" value="{{ $expense->quantity }}" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" class="form-control" min="0" value="{{ $expense->price }}" required>
    </div>
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="date" class="form-control" value="{{ $expense->date }}" required>
    </div>
    <button class="btn btn-primary" type="submit">Update Pengeluaran</button>
    <a href="/admin/expenses" class="btn btn-secondary">Kembali</a>
</form>
@endsection
