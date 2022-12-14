@extends('layouts.admin')

@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="product">
                        <a href="{{ route('product.create') }}" class="btn btn-md btn-primary text-white mb-3">TAMBAH PRODUCT</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">BARANG</th>
                                <th scope="col">HARGA</th>
                                <th scope="col">STOCK</th>
                                <th scope="col">DESKRIPSI</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($products as $product)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/products/').$product->image }}" class="rounded" style="height: 20vh">
                                    </td>
                                    <td>{{Str::limit($product->barang,30)}}</td>
                                    <td>{{ $product->harga }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{!!Str::limit(Str::limit($product->content,50),50)!!}</td>
                                    <td class="">
                                      <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="text-muted sr-only">Action</span>
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-right" style="">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                          <a class="dropdown-item" href=" {{ route('product.edit', $product->id) }}">Edit</a>
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                        </form>
                                      </div>
                                  </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Product belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $products->links() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
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