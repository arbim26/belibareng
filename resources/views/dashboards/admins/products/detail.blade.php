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
                      <h3 class="fw-bolder">{{$data->barang}}</h3>
                      <div class="d-flex gap-5">
                        <p class="text-decoration-line-through">Rp 16.000</p>
                        <p class="jingga">Rp.{{ number_format($data->harga, 2) }}</p>
                      </div>
                    </div>
                    <div class="card-body abu">
                        <ul style="list-style: none; padding: 0;">
                            <li>
                                <div class="row">
                                    <label class="col-sm-3">1 bal</label>
                                    <p class="col-sm-9 m-0">25 kg</p>
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
                                    <label class="col-sm-3">Jumlah</label>
                                    <div class="col-sm-9 m-0">
                                        <div class="spinner border">
                                            <button id="decrement" onclick="stepper(this)"><i class="bi bi-dash-lg"></i></button>
                                            <input type="number" name="qty" min="1" max="100" step="1" value="1" id="my-input" readonly>
                                            <button id="increment" onclick="stepper(this)"><i class="bi bi-plus-lg"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <label class="col-sm-3">Kuota</label>
                                    <p class="col-sm-9 m-0">850/100kg</p>
                                </div>
                            </li>
                        </ul>
                        <div class="d-flex gap-1">
                            <form action="{{ route('cart.store') }}" method="POST">  
                                @csrf
                                <input type="hidden" name="produk_id" value={{$data->id}}>
                                <button class="btn text-white" type="submit" style="background-color: #D82B2A;">
                                    <i class="bi bi-cart2" style="font-size: 1.2rem;;"></i> Tambahkan Ke Keranjang
                                </button>
                            </form>
                            <a class="btn text-white bg-red" href="#" style="background-color: #D82B2A;">Beli Sekarang</a>
                        </div>
                </div>
                <div class="mt-5">
                    <h6>Daftar Pemesan</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th scope="col">Nama</th>
                              <th scope="col">Jumlah</th>
                              <th scope="col">Alaman</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>

                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection