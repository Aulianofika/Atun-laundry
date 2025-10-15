@extends('layouts.admin')

@section('title','Tambah Pesanan')

@section('content')
<h2 class="mb-4">Tambah Pesanan</h2>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ url('/admin/orders') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Pelanggan</label>
        <select name="user_id" class="form-control" required>
            <option value="">-- Pilih Pelanggan --</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->email }})</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis Pengiriman</label>
        <select name="delivery_type" class="form-control" required>
            <option value="">-- Pilih Jenis Pengiriman --</option>
            <option value="antar_sendiri">Antar Sendiri</option>
            <option value="jemput_antar">Jemput & Antar</option>
        </select>
    </div>

    <h4>Layanan</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Layanan</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->name }}</td>
                <td>{{ number_format($service->price) }}</td>
                <td>
                    <input type="checkbox" name="services[]" value="{{ $service->id }}">
                    <input type="number" name="quantities[]" value="1" min="1" class="form-control mt-1">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
</form>
@endsection
