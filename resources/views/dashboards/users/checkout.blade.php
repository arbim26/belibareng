@extends('layouts.app')

@section('content')
<section id="cart" style="background-color: #F5F5F5">
    <div class="container pt-5 pb-5">
        <div class="row">
            <h2 class="fw-bold text-center mb-3">Checkout</h2>
            <br>
            <div class="col-md-8 mt-3">
                <div class="d-flex flex-column">
                    <div class="">
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center card-body">
                                <p class="m-0">@php echo count($cart) @endphp Produk</p>
                                <a class="text-end link-danger fw-bold" href="#" style="">Hapus Semua</a>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Penerima</h5>
                            <hr>
                            <form class="row gy-2 gx-3 align-items-center">
                                <div class="col-md-4">
                                    <label class="visually-hidden" for="autoSizingInput">Name</label>
                                    <input type="text" class="form-control" id="autoSizingInput" placeholder="Jane Doe">
                                </div>
                                <div class="col-md-4">
                                    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-text">@</div>
                                        <input type="text" class="form-control" id="autoSizingInputGroup"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-text">+62</div>
                                        <input type="text" class="form-control" id="autoSizingInputGroup"
                                            placeholder="Username">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-shop-window"></i>Jawa Barat - Depok</h5>
                        @forelse ($cart as $row)
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
                                <div class="d-flex justify-content-between">
                                    <div class=" spinner border text-end">
                                        <button id="decrement" onclick="stepper(this)"><i
                                                class="bi bi-dash-lg"></i></button>
                                        <input type="number" min="0" max="100" step="1" value="{{ $row->qty }}"
                                            id="my-input" readonly>
                                        <button id="increment" onclick="stepper(this)"><i
                                                class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="mt-4 alert alert-danger">
                            Belum ada barang di cart.
                        </div>
                        @endforelse
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Pembayaran</h5>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-2">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.604 15.4999L24.9998 26.1457L43.2707 15.5624" stroke="black"
                                            stroke-width="3.125" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M25 45.021V26.1251" stroke="black" stroke-width="3.125"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20.6873 5.16668L9.56228 11.3333C7.04144 12.7292 4.97894 16.2292 4.97894 19.1042V30.875C4.97894 33.75 7.04144 37.25 9.56228 38.6458L20.6873 44.8333C23.0623 46.1458 26.9581 46.1458 29.3331 44.8333L40.4581 38.6458C42.9789 37.25 45.0414 33.75 45.0414 30.875V19.1042C45.0414 16.2292 42.9789 12.7292 40.4581 11.3333L29.3331 5.14585C26.9373 3.83335 23.0623 3.83335 20.6873 5.16668Z"
                                            stroke="black" stroke-width="3.125" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>COD</p>
                                    <p>Mohon Isi Alamat Terlebih Dahulu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text fw-bold">Total Belanja</p>
                        @php $total = 0 @endphp
                        @foreach ($cart as $row)
                            @php $total = $row->where('user_id', $row->user_id)->sum('total'); @endphp
                        @endforeach
                        <p >Rp. {{number_format($total, 2)}}</p>
                        <div class="d-grid gap-2">
                            <button href="{{ route('checkout') }}" class="btn btn-danger" type="submit">Beli
                                Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</section>
@endsection
