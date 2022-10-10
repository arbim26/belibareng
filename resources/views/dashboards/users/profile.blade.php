@extends('layouts.app')
@section('content')


<section id="main">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
          Akun Saya
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="{{ route('profile') }}">Profile</a></li>
          <li class="list-group-item"><a href="{{ route('alamat') }}">Alamat</a></li>
          <li class="list-group-item"><a href="{{ route('password') }}">Password</a></li>
        </ul>
      </div>
        <div class="card">
            <h2>Profil Saya</h2>
            <h6>Kelola Informasi profil anda untuk mengontrol,melindungi dan mengamankan akun</h6>
            <br>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="Nama">
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="Email">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">No.Telepon</label>
            </div>
        </div>

    
</section>
@endsection