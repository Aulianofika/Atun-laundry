@extends('layouts.admin')

@section('title', 'Edit Pesanan')

@section('content')
<div class="container mt-4">
    <h2>Edit Pesanan #{{ $order->id }}</h2>

    <form action="{{ url('/admin/orders/'.$order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
                <option value="pending" {{ $order->status=='pending' ? 'selected':'' }}>Pending</option>
                <option value="process" {{ $order->status=='process' ? 'selected':'' }}>Process</option>
                <option value="done" {{ $order->status=='done' ? 'selected':'' }}>Done</option>
                <option value="taken" {{ $order->status=='taken' ? 'selected':'' }}>Taken</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status Pembayaran</label>
            <select name="payment_status" class="form-select" required>
                <option value="unpaid" {{ $order->payment_status=='unpaid' ? 'selected':'' }}>Unpaid</option>
                <option value="paid" {{ $order->payment_status=='paid' ? 'selected':'' }}>Paid</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/admin/orders') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
