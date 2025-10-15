@extends('layouts.admin')

@section('title','Edit Promo')

@section('content')
<h2 class="mb-4">Edit Promo</h2>

<form method="POST" action="{{ url('/admin/promos/'.$promo->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Kode Promo</label>
        <input type="text" name="code" class="form-control" required value="{{ old('code', $promo->code) }}">
        @error('code') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" required value="{{ old('title', $promo->title) }}">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Diskon (%)</label>
        <input type="number" name="discount" class="form-control" min="0" max="100" required value="{{ old('discount', $promo->discount) }}">
        @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Berlaku Hingga</label>
        <input type="date" name="valid_until" class="form-control" required value="{{ old('valid_until', $promo->valid_until->format('Y-m-d')) }}">
        @error('valid_until') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="active" class="form-check-input" {{ $promo->active ? 'checked' : '' }}>
        <label class="form-check-label">Aktif</label>
    </div>

    <button type="submit" class="btn btn-primary">Update Promo</button>
    <a href="{{ url('/admin/promos') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
