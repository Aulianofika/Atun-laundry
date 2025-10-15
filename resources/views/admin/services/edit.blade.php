@extends('layouts.admin')

@section('title','Edit Layanan')

@section('content')
<h2>Edit Layanan</h2>
<form method="POST" action="/admin/services/{{ $service->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Layanan</label>
        <input type="text" name="name" value="{{ $service->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" value="{{ $service->price }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Satuan</label>
        <select name="unit" class="form-control" required>
            <option value="Kg" {{ $service->unit == 'Kg' ? 'selected' : '' }}>Kg</option>
            <option value="Pcs" {{ $service->unit == 'Pcs' ? 'selected' : '' }}>Pcs</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Foto Layanan Saat Ini</label><br>
        @if($service->image)
            <img src="{{ asset('storage/' . $service->image) }}" width="100">
        @else
            <span class="text-muted">Tidak ada gambar</span>
        @endif
    </div>

    <div class="mb-3">
        <label>Ganti Foto (Opsional)</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
    <a href="/admin/services" class="btn btn-secondary">Kembali</a>
</form>
@endsection
