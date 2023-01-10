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
                            
                            <div class="container">
                                <h1>Laravel Crop Image Before Upload using Cropper JS - NiceSnippets.com</h1>
                                <input type="file" name="image" class="image">
                            </div>
                            
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Laravel Crop Image Before Upload using Cropper JS - NiceSnippets.com</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="img-container">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            </div>
                            </div>
                            <style type="text/css">
                                .img {
                                display: block;
                                max-width: 100%;
                                }
                                .preview {
                                overflow: hidden;
                                width: 160px; 
                                height: 160px;
                                margin: 10px;
                                border: 1px solid red;
                                }
                                .modal-lg{
                                max-width: 1000px !important;
                                }
                                </style>
                            <script>
                            
                            var $modal = $('#modal');
                            var image = document.getElementById('image');
                            var cropper;
                              
                            $("body").on("change", ".image", function(e){
                                var files = e.target.files;
                                var done = function (url) {
                                  image.src = url;
                                  $modal.modal('show');
                                };
                                var reader;
                                var file;
                                var url;
                            
                                if (files && files.length > 0) {
                                  file = files[0];
                            
                                  if (URL) {
                                    done(URL.createObjectURL(file));
                                  } else if (FileReader) {
                                    reader = new FileReader();
                                    reader.onload = function (e) {
                                      done(reader.result);
                                    };
                                    reader.readAsDataURL(file);
                                  }
                                }
                            });
                            
                            $modal.on('shown.bs.modal', function () {
                                cropper = new Cropper(image, {
                                  aspectRatio: 1,
                                  viewMode: 3,
                                  preview: '.preview'
                                });
                            }).on('hidden.bs.modal', function () {
                               cropper.destroy();
                               cropper = null;
                            });
                            
                            $("#crop").click(function(){
                                canvas = cropper.getCroppedCanvas({
                                    width: 160,
                                    height: 160,
                                  });
                            
                                canvas.toBlob(function(blob) {
                                    url = URL.createObjectURL(blob);
                                    var reader = new FileReader();
                                     reader.readAsDataURL(blob); 
                                     reader.onloadend = function() {
                                        var base64data = reader.result;	
                            
                                        $.ajax({
                                            type: "PUT",
                                            dataType: "json",
                                            url: "profile.update",
                                            data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
                                            success: function(data){
                                                $modal.modal('hide');
                                                alert("success upload image");
                                            }
                                          });
                                     }
                                });
                            })
                            
                            </script>
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                            <!-- error message untuk title -->
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn" type="submit" style="background-color: #D82B2A; color: white" >{{ __('Simpan') }}</button>
                    </div>
            </form>
        </div>

    </div>
</section>
@endsection


Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque magnam nostrum natus, suscipit dolorum similique. Inventore magnam odio laborum debitis deleniti molestias accusamus, possimus quaerat et cum cumque facilis corporis?