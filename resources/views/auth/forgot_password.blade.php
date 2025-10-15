@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
<div class="text-center mb-4">
    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center shadow-sm" style="width:70px; height:70px;">
        <i class="bi bi-heart text-pink" style="font-size:2rem;"></i>
    </div>
    <h2 class="mt-3 fw-bold text-pink">Lupa Password?</h2>
    <p class="text-muted" style="font-size:0.95rem;">Masukkan email dan password baru kamu di bawah ini</p>
</div>

@if(session('success'))
<div class="alert alert-success text-center py-2">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('reset.password') }}">
    @csrf

    <div class="mb-3 position-relative">
        <label for="email" class="form-label fw-semibold">Email</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0">
                <i class="bi bi-envelope-heart text-pink"></i>
            </span>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   class="form-control input-soft @error('email') is-invalid @enderror"
                   placeholder="Masukkan email kamu...">
        </div>
        @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 position-relative">
        <label for="password" class="form-label fw-semibold">Password Baru</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0">
                <i class="bi bi-lock text-pink"></i>
            </span>
            <input type="password" id="password" name="password" required
                   class="form-control input-soft @error('password') is-invalid @enderror"
                   placeholder="Masukkan password baru...">
        </div>
        @error('password')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 position-relative">
        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
        <div class="input-group">
            <span class="input-group-text bg-light border-0">
                <i class="bi bi-lock-fill text-pink"></i>
            </span>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   class="form-control input-soft"
                   placeholder="Ulangi password baru...">
        </div>
    </div>

    <button type="submit" class="btn btn-pink w-100 py-2">
        <i class="bi bi-arrow-repeat me-1"></i> Reset Password
    </button>
</form>

<div class="mt-4 text-center">
    <p class="mb-1">Ingat password kamu? <a href="/login" class="fw-semibold text-decoration-none text-pink-hover">Kembali ke Login</a></p>
</div>
@endsection
