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
                        <p class="jingga">{{$data->harga}}</p>
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
                                            <button id="decrement" onclick="stepper(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                              </svg> </button>
                                            <input type="number" min="0" max="100" step="1" value="20" id="my-input" readonly>
                                            <button id="increment" onclick="stepper(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                              </svg> </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <label class="col-sm-3">Kuota</label>
                                    <p class="col-sm-9 m-0">850/1000kg</p>
                                </div>
                            </li>
                        </ul>
                        <a class="btn text-white bg-red" href="{{ route('add.to.cart', $data->id) }}" style="background-color: #D82B2A;">
                            <div class="d-flex gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg>
                                <p class="m-0">Masukkan Keranjang</p>
                            </div>
                        </a>
                        <a class="btn text-white bg-red" href="{{ route('cart') }}" style="background-color: #D82B2A;">Beli Sekarang</a>
                    </div>
                </div>
                <div class="mt-5">
                    <h6>Daftar Pemesan</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th scope="col">Nama</th>
                              <th scope="col">Jumlah</th>
                              <th scope="col">Alamat</th>
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