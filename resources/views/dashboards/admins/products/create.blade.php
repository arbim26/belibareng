@extends('layouts.admin')

@section('main')
    {{-- <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Barang</label>
                                <input type="text" class="form-control @error('barang') is-invalid @enderror" name="barang" value="{{ old('barang') }}" placeholder="Masukkan Nama Barang">
                            
                                <!-- error message untuk title -->
                                @error('barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Harga</label>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga">
                            
                                <!-- error message untuk title -->
                                @error('harga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Stock</label>
                                <input type="text" class="form-control @error('Stock') is-invalid @enderror" name="Stock" value="{{ old('Stock') }}" placeholder="Stock Barang">
                            
                                <!-- error message untuk title -->
                                @error('Stock')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KONTEN</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten Blog">{{ old('content') }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main> --}}
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
            <div class="col-12">
              
              <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="page-title">New</h2>
                <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Add Product</strong>
                  </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="simpleinput">Barang</label>
                            <input type="text" name="barang" id="simpleinput" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                            <label for="example-email">Harga</label>
                            <input type="number" name="harga" id="harga"  class="form-control" placeholder="Rp.">
                          </div>
                          <div class="form-group mb-3">
                            <label for="example-multiselect">Stock</label>
                            <input type="text" name="stock" id="stock" class="form-control" placeholder="L/kg">
                          </div>
                          <div class="form-group mb-3">
                            <label for="example-textarea">Content</label>
                            <textarea class="form-control" name="content" id="example-textarea" rows="4"></textarea>
                          </div>
                        </div> <!-- /.col -->
                        <div class="card-body">
                          <input type="file" name="image" class="dropzone bg-light rounded-lg" id="product">
                            <div class="dz-message needsclick">
                              <div class="circle circle-lg bg-primary">
                                <i class="fe fe-upload fe-24 text-white"></i>
                              </div>
                              <h5 class="text-muted mt-4">Drop files here or click to upload</h5>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                  </form>
                </div> <!-- / .card -->
          </main> <!-- main -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
