@extends('layouts.app')

@section('content')
<div class="auth-card">
  <div class="auth-card-top">
    <img src="{{ asset('logoIREPORT.png') }}" alt="IReport Logo">
    <h4>IReport</h4>
    <small>Platform Pelaporan Infrastruktur Publik</small>
  </div>

  <div class="auth-card-body">
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3">
        <label for="email">Alamat Email</label>
        <input id="email" type="email"
          class="form-control @error('email') is-invalid @enderror"
          name="email" value="{{ old('email') }}"
          required autocomplete="email" autofocus
          placeholder="email@contoh.com">
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password">Password</label>
        <input id="password" type="password"
          class="form-control @error('password') is-invalid @enderror"
          name="password" required autocomplete="current-password"
          placeholder="••••••••">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check mb-0">
          <input class="form-check-input" type="checkbox" name="remember"
            id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember"
            style="font-size:.78rem;color:#6b7280">Ingat saya</label>
        </div>
        <a href="/register" style="font-size:.78rem;color:var(--ir-blue)">Belum punya akun?</a>
      </div>

      <button type="submit" class="btn-auth">
        <i class="fas fa-sign-in-alt me-1"></i> Masuk
      </button>
    </form>

    {{-- Demo Credentials --}}
    <div class="auth-demo-box">
      <div class="auth-demo-label">
        <i class="fas fa-key me-1" style="color:#16a34a"></i> Akun Demo
      </div>
      <div class="auth-demo-btns">
        <button type="button" class="btn btn-outline-success btn-demo"
          onclick="document.getElementById('email').value='bro@mail.com';document.getElementById('password').value='123';">
          <i class="fas fa-user me-1"></i> User
        </button>
        <button type="button" class="btn btn-outline-primary btn-demo"
          onclick="document.getElementById('email').value='tes@mail.com';document.getElementById('password').value='123';">
          <i class="fas fa-user-edit me-1"></i> Reporter
        </button>
        <button type="button" class="btn btn-outline-danger btn-demo"
          onclick="document.getElementById('email').value='w@mail.com';document.getElementById('password').value='123';">
          <i class="fas fa-user-shield me-1"></i> Admin
        </button>
      </div>
      <p class="auth-demo-hint">Password semua akun: <code>123</code></p>
    </div>
  </div>
</div>
@endsection
