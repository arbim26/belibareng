@extends('layouts.LoginRegis')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-7">
            <h1><strong>Daftar Sekarang</strong></h1>
            <p class="mb-3">Sudah punya akun Belibareng? <a href="{{ route('login') }}" style="text-decoration: none; color: #c43315">Masuk</a></p>
                <form method="POST" action="{{ route('register') }}">
                @csrf

                    <div class="form-group">
                        <label for="name" class="text-md-end">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                        
                    <div class="form-group">
                        <label for="email" class="text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                        
                    <div class="form-group">
                        <label for="telp" class="text-md-end">{{ __('Telephone') }}</label>
                        <input id="telp" type="number" class="form-control form-control-lg @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" required autocomplete="telp">

                        @error('telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                        
                    <div class="form-group">
                        <label for="password" class="text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                        
                     <div class="form-group">
                        <label for="password-confirm" class="text-md-end">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="row mb-0">
                        <div class="text-center mt-3 ">
                            <button type="submit" class="btn" style="background: #c43315; color: white; width: 200px;">
                                {{ __('Selesai') }}
                            </button>
                        </div>
                    </div>
                        
                    </form>
          </div>
    </div>
</div>


@endsection
