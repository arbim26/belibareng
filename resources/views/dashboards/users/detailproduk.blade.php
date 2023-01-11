@extends('layouts.app')

@section('content')
<section id="detailproduk">
    <div class="container pt-5 pb-5 ps-5 pe-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ Storage::url('products/').$data->image }}"  class="round w-100" alt="...">
                <hr>
                <h6 class="jingga">Detail Produk</h6>
                <hr>
                <div class="text-detail">
                    <p>Berat 25Kg</p>
                    <p>{!! $data->content !!}</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                      <h2 class="fw-bolder">{{$data->barang}}</h2>
                      <p class="jingga fs-3 m-0">Rp. {{ number_format($data->harga) }}</p>
                      <p class="text-decoration-line-through text-muted fs-6 m-0">Rp. 16.000</p>
                    </div>
                    <div class="card-body abu">
                        <ul style="list-style: none; padding: 0;">
                            <li>
                                <div class="row">
                                    <label class="col-sm-3">1 {{ $data->pack->pack }}</label>
                                    <p class="col-sm-9 m-0">{{ $data->jumlah_pack }} {{ $data->satuan->satuan }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <label class="col-sm-3">Pengambilan</label>
                                    <p class="col-sm-9 m-0">Diambil di Gudang</p>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <label class="col-sm-3">Kuota</label>
                                    <p class="col-sm-9 m-0">
                                        @if ($data->status == 'belum rilis')
                                            {{ number_format($data->barang_dipesan) }} {{ $data->satuan->satuan }} / {{ number_format($data->minimal_rilis) }} {{ $data->satuan->satuan }} 
                                        @else
                                        <div class="ms-3 alert alert-danger text-center" style="width: 365px">Barang sudah rilis</div>
                                        @endif
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <div class="d-flex gap-1">
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="produk_id" value={{$data->id}}>
                                <button class="btn text-white"  <?php if ($data->status == 'barang sudah rilis'){ ?> disabled <?php   } ?> type="submit" style="background-color: #D82B2A;">
                                    <i class="bi bi-cart2" style="font-size: 1.2rem;;"></i> Tambahkan Ke Keranjang
                                </button>
                            </form>
                            <a class="btn text-white bg-red" href="#" style="background-color: #D82B2A;">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h6>Daftar Pemesan</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th scope="col">Nama</th>
                              <th scope="col">Jumlah</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($cart as $row) 
                                @forelse ($row->checkout as $item)                                    
                                <tr>
                                    <td>{{ $item->nama_penerima}}</td>
                                    <td>{{ $row->qty}} {{ $data->pack->pack }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">
                                        <div class="alert alert-danger text-center">Belum ada yang memesan barang ini</div>
                                    </td>         
                                </tr>
                                @endforelse
                            @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection