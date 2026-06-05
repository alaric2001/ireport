@extends('layouts.app')

@section('content')
<div class="container">
    <div class="register-logo">
        <img src="{{ asset('logoIREPORT.png') }}" alt="" style="width: 100px">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> --}}
                                    <a class="btn btn-link" href="/register">
                                        {{ __('Belum punya akun?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Demo credentials untuk recruiter --}}
            <div class="card mt-3" style="border:1px solid #d1e7dd;background:#f0fdf4">
                <div class="card-body py-3">
                    <p class="mb-2 text-center" style="font-size:.8rem;color:#6c757d;font-weight:600;letter-spacing:.05em">
                        <i class="fas fa-key" style="color:#198754"></i>&nbsp; AKUN DEMO
                    </p>
                    <div class="d-flex justify-content-center" style="gap:.5rem;flex-wrap:wrap">
                        <button type="button"
                            onclick="document.getElementById('email').value='bro@mail.com';document.getElementById('password').value='123';"
                            class="btn btn-sm btn-outline-success">
                            <i class="fas fa-user"></i>&nbsp;User &mdash; bro@mail.com
                        </button>
                        <button type="button"
                            onclick="document.getElementById('email').value='tes@mail.com';document.getElementById('password').value='123';"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-user-edit"></i>&nbsp;Reporter &mdash; tes@mail.com
                        </button>
                    </div>
                    <p class="mb-0 text-center mt-2" style="font-size:.75rem;color:#6c757d">
                        Password semua akun: <code>123</code>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
