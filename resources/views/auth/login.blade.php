@extends('layouts.LoginRegis')

@section('content')
  <div class="main" style="width: 23rem;">
      <img class="mb-5" src="{{ asset('assets/logo/logo belibareng 1-01.png') }}" style="height: 35px;">
      <h3 class="fw-normal mb-3" style="letter-spacing: 1px;">Log in</h3>
      <p>Belum punya akun? <a href="{{ route('register') }}" class="link-info" style="color: #D82B2A;">Daftar di sini</a></p>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="label mb-4">
            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            <label for="email" class="label-text">{{ __('Alamat Email') }}</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="label mb-4">
            <input id="password" type="password"
            class=" @error('password') is-invalid @enderror" name="password" required
            autocomplete="new-password">
            <label for="password" class="label-text">{{ __('Sandi') }}</label>
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
      <div class="pt-1 mb-4 text-center submit">
          <button type="submit" class="btn btn-lg btn-block text-white text-center">
            {{ __('Selesai') }}
          </button>
      </div>
      @if (Route::has('password.request'))
      <p class="small mb-2 pb-lg-2 text-center"><a class="text-muted" href="{{ route('password.request') }}">Lupa Sandi?</a></p>
      @endif
        
    </form>
  </div>
@endsection
