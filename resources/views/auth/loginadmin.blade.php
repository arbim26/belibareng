@extends('layouts.loregadmin')
@section('content')
    <div class="light">
        <div class="wrapper vh-100">
          <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center">
                @csrf
              <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                  <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                  </g>
                </svg>
              </a>
              <h1 class="h6 mb-5 mt-2">Sign in</h1>
              <div class="form-group">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
              </div>
              <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" required="">
              </div>

              <div class="form-check checkbox mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
              {{-- <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Stay logged in </label>
              </div> --}}
              <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Submit') }}</button>

              @if (Route::has('password.request'))
                <a class="btn btn-link mt-3" href="{{ route('password.request') }}">
                    {{ __('Lupa Kata Sandi?') }}
                </a>
                @endif

              <p class="mt-5 mb-3 text-muted">© Copyright Belibareng 2022</p>
            </form>
          </div>
        </div>
    </div>

@endsection