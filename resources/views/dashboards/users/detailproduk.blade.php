@extends('layouts.app')

@section('content')
<section id="detailproduk">
    <div class="container pt-5 pb-5 ps-5 pe-5">
        <div class="row">
            <div class="col-sm-4">
                <img src="/assets/image/Tepung 2-01.jpg" class="round w-100" alt="...">
                <hr>
                <h6 class="jingga">Detail Produk</h6>
                <hr>
                <div class="text-detail">
                    <p>Berat 25Kg</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo odit atque repellendus iusto explicabo quidem in temporibus soluta libero molestiae.</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim debitis non ullam accusantium consequuntur corporis, optio tenetur dolor iusto saepe.</p>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                      <h3 class="fw-bolder">Tepung</h3>
                      <div class="d-flex gap-5">
                        <p class="text-decoration-line-through">Rp 16.000</p>
                        <p class="jingga">12.000</p>
                      </div>
                    </div>
                    <div class="card-body abu">
                        <ul>
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
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                        </span>
                                        <input type="text" class="form-control text-center" value="1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                        </span>
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
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection