@extends('layouts.LoginRegis')

@section('content')
<div class="main" style="width: 23rem;">

    <img class="mb-5" src="{{ asset('assets/logo/logo belibareng 1-01.png') }}" style="height: 35px;">
    <h3 class="fw-normal mb-3" style="letter-spacing: 1px;">Daftar</h3>
    <p>Sudah punya akun? <a href="{{route('login')}}" class="link-info" style="color: #D82B2A;">Masuk di sini</a></p>
    <form action="{{ route('register') }}" method="POST">
      @csrf
    </form>
    <form action="{{ route('register') }}" method="POST">
      @csrf
      <div class="label mb-4">
          <input class="@error('nama') is-invalid @enderror" name="name" id="name" type="text" required />
          <label class="label-text">{{ __('Nama') }}</label>
          @error('nama')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
      <div class="row g-3 label-twin mb-4">
          <div class="col">
              <input class="@error('email') is-invalid @enderror" name="email" id="email" type="text" required />
              <label class="label-text">{{ __('Email') }}</label>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
          <div class="col">
              <input class="@error('telp') is-invalid @enderror" name="telp" id="telp" type="number" required />
              <label class="label-text">{{ __('No Telphone') }}</label>
              @error('telp')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>
      <div class="label mb-4">
        <input class="@error('password') is-invalid @enderror" name="password" id="password" type="password" required />
        <label class="label-text">{{ __('Password') }}</label>
        <i class="bi bi-eye-slash" id="togglePassword"></i>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="label mb-4">
        <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password"/>
        <label for="password-confirm" class="label-text">{{ __('Confirm Password') }}</label>
        <i class="bi bi-eye-slash" id="toggleconfirmPassword"></i>
      </div>

      <div class="row mb-3">
          <div class="col-md-6">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>
                  <p class="small mb-2" for="remember">Ingat Saya</p>
              </div>
          </div>
      </div>

      <div class="pt-1 mb-4 text-center submit">
        <button type="submit" class="btn btn-lg btn-block text-white text-center">
          {{ __('Selesai') }}
        </button>
    </div>
    </form>
</div>

@endsection
