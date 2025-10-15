@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="text-center mb-4">
    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center shadow-sm" style="width:70px; height:70px;">
        <i class="bi bi-heart text-pink" style="font-size:2rem;"></i>
    </div>
    <h2 class="mt-3 fw-bold text-pink">Daftar Akun Baru</h2>
    <p class="text-muted" style="font-size:0.95rem;">Bergabunglah dan nikmati kemudahan layanan AtunLaundry</p>
</div>

@if(session('error'))
<div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
@endif
@if(session('success'))
<div class="alert alert-success text-center py-2">{{ session('success') }}</div>
@endif

<form method="POST" action="/register">
    @csrf

    <div class="mb-3">
        <label class="form-label fw-semibold">Nama Lengkap</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0">
                <i class="bi bi-person-heart text-pink"></i>
            </span>
            <input type="text" name="name" class="form-control input-soft" placeholder="Masukkan nama kamu..." required>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Email</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0">
                <i class="bi bi-envelope-heart text-pink"></i>
            </span>
            <input type="email" name="email" class="form-control input-soft" placeholder="Masukkan email kamu..." required>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Password</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0">
                <i class="bi bi-lock text-pink"></i>
            </span>
            <input type="password" name="password" class="form-control input-soft" placeholder="Masukkan password..." required>
        </div>
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">Konfirmasi Password</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0">
                <i class="bi bi-shield-lock text-pink"></i>
            </span>
            <input type="password" name="password_confirmation" class="form-control input-soft" placeholder="Ulangi password kamu..." required>
        </div>
    </div>

    <button type="submit" class="btn btn-pink w-100 py-2">
        <i class="bi bi-person-plus me-1"></i> Daftar Sekarang
    </button>
</form>

<div class="mt-4 text-center">
    <p class="mb-1">Sudah punya akun? 
        <a href="/login" class="fw-semibold text-decoration-none text-pink-hover">Masuk di sini</a>
    </p>
</div>
@endsection
