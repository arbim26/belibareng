@extends('layouts.LoginRegis')

@section('content')
<div class="d-flex align-items-center justify-content-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

    <div class="align-items-center ">
        <h1><strong>Login</strong></h1>
        <p class="mb-4">Belum punya akun Belibareng? <a href="{{ route('login') }}" style="text-decoration: none; color: #c43315">Daftar</a></p>
        <form method="POST" action="{{ route('register') }}" style="width: 400px">
            @csrf

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
@endsection
