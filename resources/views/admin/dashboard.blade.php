@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<h1>Dashboard</h1>
<p>Halo, {{ Auth::user()->name }}</p>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Pesanan</div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalOrders }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Total Pendapatan</div>
            <div class="card-body">
                <h5 class="card-title">Rp {{ number_format($totalIncome,0,",",".") }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header">Total Pelanggan</div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalCustomers }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info mb-3">
            <div class="card-header">Promo Aktif</div>
            <div class="card-body">
                <h5 class="card-title">{{ $activePromos }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection
