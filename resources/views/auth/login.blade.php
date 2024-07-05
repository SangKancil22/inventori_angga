@extends('layouts.guest')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <a href="." class="navbar-brand navbar-brand-autodark"><img src="#" height="36"
                                    alt="">Inventori Barang</a>
                        </div>
                        <div class="card card-md">
                            <div class="card-body">
                                <h2 class="h2 text-center mb-4">Login Akun</h2>
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Email address') }}</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __('Masukkan email') }}" required autofocus tabindex="1">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">

                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ __('Masukkan Password') }}" required tabindex="2">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" tabindex="3"
                                                name="remember" />
                                            <span class="form-check-label">{{ __('Ingat Saya') }}</span>
                                        </label>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="text-center text-secondary mt-3">
                            Belum Mempunyai Akun?  <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    <img src="./dist/static/illustrations/undraw_secure_login_pdn4.svg" height="300"
                        class="d-block mx-auto" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
