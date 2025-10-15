@extends('layouts.admin')

@section('title','Edit Gaji Karyawan')

@section('content')
<h2 class="mb-4">Edit Gaji Karyawan</h2>

<form method="POST" action="{{ url('/admin/salaries/'.$salary->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama Karyawan</label>
        <input type="text" name="employee_name" class="form-control" required value="{{ old('employee_name', $salary->employee_name) }}">
        @error('employee_name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="date" class="form-control" required value="{{ old('date', $salary->date->format('Y-m-d')) }}">
        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Berat (kg)</label>
        <input type="number" step="0.01" name="weight" class="form-control" required value="{{ old('weight', $salary->weight) }}">
        @error('weight') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tarif per kg</label>
        <input type="number" name="rate_per_kg" class="form-control" required value="{{ old('rate_per_kg', $salary->rate_per_kg) }}">
        @error('rate_per_kg') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ url('/admin/salaries') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
    