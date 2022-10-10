@extends('layouts.LoginRegis')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-7 mb-5">
        <img src="{{ asset('assets/logo/logo belibareng 1-01.png') }}" class="mb-5" style="height: 30px" alt="">
        <h1 class="mb-3"><strong>Login</strong></h1>
        <p class="mb-3">Belum punya akun Belibareng? <a href="{{ route('register') }}" style="text-decoration: none; color: #c43315">Daftar</a></p>
        <form method="POST" action="{{ route('login') }}" s>
            @csrf

            <div class="form-group">
                <label for="email" class="text-md-end">{{ __('Alamat Email') }}</label>
                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password" class="text-md-end">{{ __('Sandi') }}</label>
                <input id="password" type="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="text-center mt-3 ">
                    <button type="submit" class="btn" style="background: #c43315; color: white; height: 40px; width: 200px;">
                        {{ __('Selesai') }}
                    </button>
                </div>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Lupa Kata Sandi?') }}
                </a>
                @endif

            </div>

            
        </form>
      </div>
    </div>
  </div>
@endsection
