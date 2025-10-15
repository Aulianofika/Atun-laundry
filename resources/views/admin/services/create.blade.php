@extends('layouts.admin')

@section('title','Tambah Layanan')

@section('content')
<h2>Tambah Layanan</h2>
<form method="POST" action="/admin/services" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Nama Layanan</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Satuan</label>
        <select name="unit" class="form-control" required>
            <option value="Kg">Kg</option>
            <option value="Pcs">Pcs</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Foto Layanan</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary" type="submit">Simpan</button>
    <a href="/admin/services" class="btn btn-secondary">Kembali</a>
</form>
@endsection
