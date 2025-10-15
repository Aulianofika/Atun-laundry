@extends('layouts.admin')

@section('title','Tambah Promo')

@section('content')
<h2 class="mb-4">Tambah Promo</h2>

<form method="POST" action="{{ url('/admin/promos') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Kode Promo</label>
        <input type="text" name="code" class="form-control" required value="{{ old('code') }}">
        @error('code') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Diskon (%)</label>
        <input type="number" name="discount" class="form-control" min="0" max="100" required value="{{ old('discount') }}">
        @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Berlaku Hingga</label>
        <input type="date" name="valid_until" class="form-control" required value="{{ old('valid_until') }}">
        @error('valid_until') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="active" class="form-check-input" checked>
        <label class="form-check-label">Aktif</label>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Promo</button>
    <a href="{{ url('/admin/promos') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
