@extends('layouts.admin')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="product">
                            <a href="{{ route('product.create') }}" class="btn btn-md btn-danger text-white mb-3">ADD +
                            </a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">GAMBAR</th>
                                        <th scope="col" class="text-center">BARANG</th>
                                        <th scope="col" class="text-center">HARGA</th>
                                        <th scope="col" class="text-center">STOCK</th>
                                        <th scope="col" class="text-center">PACK</th>
                                        <th scope="col" class="text-center">BARNAG DIPESAN</th>
                                        <th scope="col" class="text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ Storage::url('public/products/').$product->image }}"
                                                class="rounded" style="height: 20vh">
                                        </td>
                                        <td class="text-center">{{Str::limit($product->barang,30)}}</td>
                                        <td class="text-center">{{ number_format($product->harga) }}</td>
                                        <td class="text-center">{{ number_format($product->minimal_rilis) }}
                                            {{ $product->satuan->satuan }}</td>
                                        <td class="text-center">{{ $product->jumlah_pack }}
                                            {{ $product->satuan->satuan }} / {{ $product->pack->pack }}</td>
                                        <td class="text-center">{{ number_format($product->barang_dipesan) }} {{ $product->pack->pack }}
                                        </td>
                                        <td class="">
                                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" style="">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    <a class="dropdown-item"
                                                        href=" {{ route('product.edit', $product->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item text-danger">Hapus</button>
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


@endsection
