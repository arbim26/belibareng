@extends('layouts.app')
@section('content')


<section id="profile">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        Akun Saya
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{ route('profile') }}">Profile</a></li>
                        <li class="list-group-item"><a href="{{ route('alamat') }}">Alamat</a></li>
                        <li class="list-group-item"><a href="{{ route('password') }}">Password</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 card ps-5 pe-5 pt-3 pb-3">

              <div class="mb-3">
                <h2>Profil Saya</h2>
                <h6>Kelola Informasi profil anda untuk mengontrol,melindungi dan mengamankan akun</h6>
                <hr>
              </div>

                <div class="row">
                    <div class="col-9 pe-5">
                        <div class="mb-4 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail">
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail">
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">No.Telpon</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputPassword">
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputPassword">
                            </div>
                        </div>

                        <button class="btn" style="background-color: #D82B2A; color: white">Simpan</button>
                    </div>

                    <div class="col-3 text-center">
                        <img src="https://i.pinimg.com/564x/69/9c/65/699c6525f476e3d305d80b63691d9628.jpg" style="height: 200px; border-radius: 500px" alt="">
                        <p class="mt-2">Ukuran gambar: maks. 1 MB Format gambar: .JPEG, .PNG</p>
                        <button class="btn" style="background-color: #D82B2A; color: white">Upload Gambar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
