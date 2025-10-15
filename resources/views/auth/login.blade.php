@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="text-center mb-4">
    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center shadow-sm" style="width:70px; height:70px;">
        <i class="bi bi-heart text-pink" style="font-size:2rem;"></i>
    </div>
    <h2 class="mt-3 fw-bold text-pink">Selamat Datang</h2>
    <p class="text-muted" style="font-size:0.95rem;">Masuk untuk menikmati Layanan AtunLaundry!</p>
</div>

@if(session('error'))
<div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
@endif
@if(session('success'))
<div class="alert alert-success text-center py-2">{{ session('success') }}</div>
@endif

<form method="POST" action="/login">
    @csrf
    <div class="mb-3 position-relative">
        <label class="form-label fw-semibold">Email</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0">
                <i class="bi bi-envelope-heart text-pink"></i>
            </span>
            <input type="email" name="email" class="form-control input-soft" placeholder="Masukkan email kamu..." required>
        </div>
    </div>

    <div class="mb-3 position-relative">
        <label class="form-label fw-semibold">Password</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0">
                <i class="bi bi-lock text-pink"></i>
            </span>
            <input type="password" name="password" class="form-control input-soft" placeholder="Masukkan password..." required>
        </div>
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" name="remember" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Ingat saya</label>
    </div>

    <button type="submit" class="btn btn-pink w-100 py-2">
        <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang
    </button>
</form>

<div class="mt-4 text-center">
    <p class="mb-1">Belum punya akun? <a href="/register" class="fw-semibold text-decoration-none text-pink-hover">Daftar Sekarang</a></p>
    <a href="/forgot-password" class="text-muted small text-decoration-none">Lupa password?</a>
</div>
@endsection
