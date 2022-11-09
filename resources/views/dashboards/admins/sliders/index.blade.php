@extends('layouts.admin')

@section('main')
<div class="wrapper">
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row align-items-center my-4">
            <div class="col">
              <h2 class="h3 mb-0 page-title">Slider</h2>
            </div>
            <div class="col-auto">
              <a href="{{ route('slider.create') }}" type="button" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Create</a>
            </div>
          </div>
          @forelse ($sliders as $slider)
          <div class="row">
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <div class="card-body text-center">
                  <div class="avatar avatar-lg mt-4">
                    <a href="">
                      <img src="{{ Storage::url('public/sliders/').$slider->image }}" alt="..." class="avatar-img rounded-circle">
                    </a>
                  </div>
                  <div class="card-text my-2">
                    <strong class="card-title my-0">Bass Wendy </strong>
                    <p class="small text-muted mb-0">Accumsan Consulting</p>
                    <p class="small"><span class="badge badge-light text-muted">New York, USA</span></p>
                  </div>
                </div> <!-- ./card-text -->
                <div class="card-footer">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                      <small>
                        <span class="dot dot-lg bg-success mr-1"></span> Online </small>
                    </div>
                    <div class="col-auto">
                      <div class="file-action">
                        <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu m-2">
                          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                          <a class="dropdown-item" href="#"><i class="fe fe-meh fe-12 mr-4"></i>Profile</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-message-circle fe-12 mr-4"></i>Chat</a>
                          <a class="dropdown-item" href="{{ route('slider.edit', $slider->id) }}"><i class="fe fe-mail fe-12 mr-4"></i>Edit</a>
                          <a class="dropdown-item" href="{{ route('slider.destroy', $slider->id) }}"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-footer -->
              </div>
            </div> <!-- .col -->
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <div class="card-body text-center">
                  <div class="avatar avatar-lg mt-4">
                    <a href="">
                      <img src="{{ Storage::url('public/sliders/').$slider->image }}" alt="..." class="avatar-img rounded-circle">
                    </a>
                  </div>
                  <div class="card-text my-2">
                    <strong class="card-title my-0">Leblanc Yoshio</strong>
                    <p class="small text-muted mb-0">Tristique Ltd</p>
                    <p class="small"><span class="badge badge-light text-muted">United Kingdom</span></p>
                  </div>
                </div> <!-- ./card-text -->
                <div class="card-footer">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                      <small>
                        <span class="dot dot-lg bg-secondary mr-1"></span> Offline </small>
                    </div>
                    <div class="col-auto">
                      <div class="file-action">
                        <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu m-2">
                          <a class="dropdown-item" href="#"><i class="fe fe-meh fe-12 mr-4"></i>Profile</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-message-circle fe-12 mr-4"></i>Chat</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-mail fe-12 mr-4"></i>Contact</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-footer -->
              </div>
            </div> <!-- .col -->
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <div class="card-body text-center">
                  <div class="avatar avatar-lg mt-4">
                    <a href="">
                      <img src="{{ Storage::url('public/sliders/').$slider->image }}" alt="..." class="avatar-img rounded-circle">
                    </a>
                  </div>
                  <div class="card-text my-2">
                    <strong class="card-title my-0">Higgins Uriah</strong>
                    <p class="small text-muted mb-0">Suspendisse LLC</p>
                    <p class="small"><span class="badge badge-light text-muted">Canada</span></p>
                  </div>
                </div> <!-- ./card-text -->
                <div class="card-footer">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                      <small>
                        <span class="dot dot-lg bg-success mr-1"></span> Online </small>
                    </div>
                    <div class="col-auto">
                      <div class="file-action">
                        <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu m-2">
                          <a class="dropdown-item" href="#"><i class="fe fe-meh fe-12 mr-4"></i>Profile</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-message-circle fe-12 mr-4"></i>Chat</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-mail fe-12 mr-4"></i>Contact</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-footer -->
              </div>
            </div> <!-- .col -->
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <div class="card-body text-center">
                  <div class="avatar avatar-lg mt-4">
                    <a href="">
                      <img src="{{ Storage::url('public/sliders/').$slider->image }}" alt="..." class="avatar-img rounded-circle">
                    </a>
                  </div>
                  <div class="card-text my-2">
                    <strong class="card-title my-0">Bass Wendy </strong>
                    <p class="small text-muted mb-0">Accumsan Consulting</p>
                    <p class="small"><span class="badge badge-light text-muted">New York, USA</span></p>
                  </div>
                </div> <!-- ./card-text -->
                <div class="card-footer">
                  <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                      <small>
                        <span class="dot dot-lg bg-success mr-1"></span> Online </small>
                    </div>
                    <div class="col-auto">
                      <div class="file-action">
                        <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu m-2">
                          <a class="dropdown-item" href="#"><i class="fe fe-meh fe-12 mr-4"></i>Profile</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-message-circle fe-12 mr-4"></i>Chat</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-mail fe-12 mr-4"></i>Contact</a>
                          <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-footer -->
              </div>
            </div> <!-- .col -->
            <div class="col-md-9">
            </div> <!-- .col -->
          </div> <!-- .row -->
          <nav aria-label="Table Paging" class="my-3">
            <ul class="pagination justify-content-end mb-0">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    {{ $sliders->links() }}
  </main> <!-- main -->
</div>
    <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                                <tr>
                                    <td class="text-center">
                                        {{-- <img src="{{ Storage::url('public/sliders/').$slider->image }}" class="rounded" style="width: 150px"> --}}
                                    </td>
                                    <td class="text-center">
                                        {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('slider.destroy', $slider->id) }}" method="POST"> --}}
                                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        {{-- </form> --}}
                                    </td>
                                    <div class="row">
                                        <div class="col-md-3">
                                          <div class="card shadow mb-4">
                                            <div class="card-body text-center">
                                              <div class="avatar avatar-lg mt-4">
                                                <a href="">
                                                  <img src="{{ Storage::url('public/sliders/').$slider->image }}" alt="..." class="rounded" style="width: 150px">
                                                </a>
                                              </div>
                                            </div> <!-- ./card-text -->
                                            <div class="card-footer">
                                              <div class="row align-items-center justify-content-between">
                                                <div class="col-auto">
                                                  <small>
                                                    <span class="dot dot-lg bg-success mr-1"></span> Online </small>
                                                </div>
                                                <div class="col-auto">
                                                  <div class="file-action">
                                                    
                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu m-2">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                                        <a class="dropdown-item" href="{{ route('slider.destroy', $slider->id) }}"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
                                                         @csrf
                                                        @method('DELETE')
                                                        <a class="dropdown-item" href="{{ route('slider.edit', $slider->id) }}"><i class="fe fe-mail fe-12 mr-4"></i>Edit</a>
                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div> <!-- /.card-footer -->
                                          </div>
                                        </div> <!-- .col -->
                                
                              @empty
                                  <div class="alert alert-danger">
                                      Slider belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          
                    </div>
                </div>
            </div>
        </div>
    {{-- </main> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
@endsection