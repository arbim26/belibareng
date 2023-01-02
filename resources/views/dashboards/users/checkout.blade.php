@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="../../assets/css/LogReg.css">
<section id="cart" style="background-color: #F5F5F5">
    <div class="container pt-5 pb-5">
        <form action="{{ route('checkout') }}">
        <div class="row">
            <h2 class="fw-bold text-center mb-3">Checkout</h2>
            <br>
            <div class="col-md-8 mt-3">
                <div class="d-flex flex-column">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Penerima</h5>
                            <hr>
                            <div class="row gy-2 gx-3 align-items-center">
                                <div class="col-md-4">
                                    <label class="label-text">{{ __('Nama') }}</label>
                                    <input class="@error('nama') is-invalid @enderror form-control" value="{{ $user->name }}" name="nama_penerima" id="name" type="text" required />
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="label-text">{{ __('Email') }}</label>
                                    <input class="@error('email') is-invalid @enderror form-control" value="{{ $user->email }}" name="email" id="email" type="text" required />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="label-text">{{ __('No Telphone') }}</label>
                                    <input class="@error('telp') is-invalid @enderror form-control" value="{{ $user->telp }}" name="telp" id="telp" type="text" required />
                                    @error('telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-shop-window"></i>Jawa Barat - Depok</h5>
                        @forelse ($data as $row)
                        
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <img src="{{ Storage::url('products/').$row->produk->image }}" class="rounded"
                                    style="width: 100%" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="col">
                                    <h2 class="fs-3 fw-bold" >{{ $row->produk->barang }}</h2>
                                </div>
                                <ul style="list-style: none" class="p-0">
                                    <li>Harga Barang : Rp. {{number_format($row->produk->harga, 2)}}</li>
                                    <li>Jumlah Barang : {{ $row->qty }} Pcs</li>
                                    <li>Total harga barang : Rp. {{ number_format($row->total, 2) }}</li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                        @empty
                        <div class="mt-4 alert alert-danger">
                            Belum ada barang di cart.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text fw-bold">Total Belanja</p>
                        <p >Rp. {{number_format($total, 2)}}</p>
                        <div class="d-grid gap-2">
                            <button class="btn btn-danger" type="submit">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>


</section>
@endsection

