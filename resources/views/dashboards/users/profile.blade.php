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
            <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="row">
                    <div class="col-9 pe-5">
                        <div class="mb-4 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        
                        <div class="mb-4 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="telp" class="col-sm-2 col-form-label">No.Telp</label>
                            <div class="col-sm-10">
                              <input id="telp" type="text" class="form-control"  name="telp" value="{{ old('telp', $user->telp) }}" required autocomplete="telp">

                                @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                          </div>


                        <div class="mb-4 row">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin" value="laki-laki" @if($user->jenis_kelamin == 'laki-laki') {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="jenis_kelamin">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin" value="perempuan" @if($user->jenis_kelamin == 'perempuan') {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- <input type="file" name="image" class="dropzone bg-light rounded-lg" id="image"> --}}

                        <div class="mb-4 row">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value=" {{ $user->tanggal_lahir }} ">
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-3 text-center">

                        <div class="profile-pic-wrapper">
                            <div class="pic-holder">
                              <!-- uploaded pic shown here -->
                              <img id="image" class="pic" src="{{ asset('') }}">
                          
                              <Input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                              <label for="newProfilePhoto" class="upload-file-block">
                                <div class="text-center">
                                  <div class="mb-2">
                                    <i class="fa fa-camera fa-2x"></i>
                                  </div>
                                  <div class="text-uppercase">
                                    Update <br /> Profile Photo
                                  </div>
                                </div>
                              </label>
                            </div>
                          
                            </hr>
                            <p class="text-info text-center small">Note: Ukuran gambar: maks. 1 MB </br> Format gambar: .JPEG, .PNG</p>
                          </div>

                          <style>
                            .profile-pic-wrapper {
                            width: 100%;
                            position: relative;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            }
                            .pic-holder {
                            text-align: center;
                            position: relative;
                            border-radius: 50%;
                            width: 150px;
                            height: 150px;
                            overflow: hidden;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin-bottom: 20px;
                            }

                            .pic-holder .pic {
                            height: 100%;
                            width: 100%;
                            -o-object-fit: cover;
                            object-fit: cover;
                            -o-object-position: center;
                            object-position: center;
                            }

                            .pic-holder .upload-file-block,
                            .pic-holder .upload-loader {
                            position: absolute;
                            top: 0;
                            left: 0;
                            height: 100%;
                            width: 100%;
                            background-color: rgba(90, 92, 105, 0.7);
                            color: #f8f9fc;
                            font-size: 12px;
                            font-weight: 600;
                            opacity: 0;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            transition: all 0.2s;
                            }

                            .pic-holder .upload-file-block {
                            cursor: pointer;
                            }

                            .pic-holder:hover .upload-file-block,
                            .uploadProfileInput:focus ~ .upload-file-block {
                            opacity: 1;
                            }

                            .pic-holder.uploadInProgress .upload-file-block {
                            display: none;
                            }

                            .pic-holder.uploadInProgress .upload-loader {
                            opacity: 1;
                            }

                            /* Snackbar css */
                            .snackbar {
                            visibility: hidden;
                            min-width: 250px;
                            background-color: #333;
                            color: #fff;
                            text-align: center;
                            border-radius: 2px;
                            padding: 16px;
                            position: fixed;
                            z-index: 1;
                            left: 50%;
                            bottom: 30px;
                            font-size: 14px;
                            transform: translateX(-50%);
                            }

                            .snackbar.show {
                            visibility: visible;
                            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                            animation: fadein 0.5s, fadeout 0.5s 2.5s;
                            }

                            @-webkit-keyframes fadein {
                            from {
                                bottom: 0;
                                opacity: 0;
                            }
                            to {
                                bottom: 30px;
                                opacity: 1;
                            }
                            }

                            @keyframes fadein {
                            from {
                                bottom: 0;
                                opacity: 0;
                            }
                            to {
                                bottom: 30px;
                                opacity: 1;
                            }
                            }

                            @-webkit-keyframes fadeout {
                            from {
                                bottom: 30px;
                                opacity: 1;
                            }
                            to {
                                bottom: 0;
                                opacity: 0;
                            }
                            }

                            @keyframes fadeout {
                            from {
                                bottom: 30px;
                                opacity: 1;
                            }
                            to {
                                bottom: 0;
                                opacity: 0;
                            }
                            }

                          </style>

                          <script>
                            $(document).on("change", ".uploadProfileInput", function () {
                            var triggerInput = this;
                            var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
                            var holder = $(this).closest(".pic-holder");
                            var wrapper = $(this).closest(".profile-pic-wrapper");
                            $(wrapper).find('[role="alert"]').remove();
                            triggerInput.blur();
                            var files = !!this.files ? this.files : [];
                            if (!files.length || !window.FileReader) {
                                return;
                            }
                            if (/^image/.test(files[0].type)) {
                                // only image file
                                var reader = new FileReader(); // instance of the FileReader
                                reader.readAsDataURL(files[0]); // read the local file

                                reader.onloadend = function () {
                                $(holder).addClass("uploadInProgress");
                                $(holder).find(".pic").attr("src", this.result);
                                $(holder).append(
                                    '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
                                );

                                // Dummy timeout; call API or AJAX below
                                setTimeout(() => {
                                    $(holder).removeClass("uploadInProgress");
                                    $(holder).find(".upload-loader").remove();
                                    // If upload successful
                                    if (Math.random() < 0.9) {
                                    $(wrapper).append(
                                        '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
                                    );

                                    // Clear input after upload
                                    $(triggerInput).val("");

                                    setTimeout(() => {
                                        $(wrapper).find('[role="alert"]').remove();
                                    }, 3000);
                                    } else {
                                    $(holder).find(".pic").attr("src", currentImg);
                                    $(wrapper).append(
                                        '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
                                    );

                                    // Clear input after upload
                                    $(triggerInput).val("");
                                    setTimeout(() => {
                                        $(wrapper).find('[role="alert"]').remove();
                                    }, 3000);
                                    }
                                }, 1500);
                                };
                            } else {
                                $(wrapper).append(
                                '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
                                );
                                setTimeout(() => {
                                $(wrapper).find('role="alert"').remove();
                                }, 3000);
                            }
                            });

                          </script>

                            {{-- <img src="https://i.pinimg.com/564x/69/9c/65/699c6525f476e3d305d80b63691d9628.jpg" style="height: 200px; border-radius: 500px" alt="">
                            <input type="file" class="form-control" style="background-color: #D82B2A; color: white"> --}}
                            
                        </div>
                    </div>
                    <button class="btn" type="submit" style="background-color: #D82B2A; color: white" >{{ __('Simpan') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection


