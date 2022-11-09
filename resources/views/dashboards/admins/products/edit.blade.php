@extends('layouts.admin')

@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Barang</label>
                                <input type="text" class="form-control @error('barang') is-invalid @enderror" name="barang" value="{{ old('barang', $product->barang) }}" placeholder="Masukkan Nama Barang">
                            
                                <!-- error message untuk title -->
                                @error('barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $product->harga) }}" placeholder="Masukkan Harga Barang">
                            
                                <!-- error message untuk title -->
                                @error('harga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Stock</label>
                                <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Masukkan Stock Barang">
                            
                                <!-- error message untuk title -->
                                @error('stock')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten Blog">{{ old('content', $product->content) }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection