@extends('layouts.admin')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pesanan</h2>
    <a href="{{ url('/admin/orders/create') }}" class="btn btn-primary mb-3">+ Tambah Pesanan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Delivery</th>
                <th>Status</th>
                <th>Pembayaran</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ ucfirst($order->delivery_type) }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>{{ ucfirst($order->payment_status) }}</td>
                <td>Rp {{ number_format($order->total,0,',','.') }}</td>
                <td>
                    <a href="{{ url('/admin/orders/'.$order->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ url('/admin/orders/'.$order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus pesanan?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
