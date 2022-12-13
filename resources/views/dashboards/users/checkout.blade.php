@extends('layouts.app')

@section('content')
<section id="cart">
    <div class="container pt-5 pb-5">
        <div class="row">
            <h2 class="fw-bold text-center mb-3">Checkout</h2>
            <br>
            <div class="col-md-8 mt-3">
                <div class="d-flex flex-column">
                    <div class="">
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center card-body">
                            <p class="m-0">{{ count((array) session('cart')) }} Produk</p>
                            <a class="text-end link-danger fw-bold" href="#" style="" >Hapus Semua</a>
                            </div>
                        </div>
                    </div>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <div class="card mt-3"> 
                        <div class="card-body">
                          <h5 class="card-title"><i class="bi bi-shop-window" ></i> Jawa Barat - Depok</h5>
                          <div class="row pt-3">
                            <div class="col-md-2">
                                <img src="{{ Storage::url('products/').$details['image'] }}" class="rounded" style="width: 100%" alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                  <div class="col"><p class="card-text">{{ $details['name'] }}</p></div>
                                  <div class="col"><p class="text-end">Rp{{ $details['price'] }}</p></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn p-0 remove-from-cart"><i class="bi bi-trash" style="font-size: 1.5rem;"></i></a>
                                    <div class=" spinner border text-end">
                                      <button id="decrement" onclick="stepper(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="20"    height="20" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                          <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                        </svg> </button>
                                      <input type="number" min="0" max="100" step="1"  value="{{ $details['quantity'] }}" id="my-input" readonly>
                                      <button id="increment" onclick="stepper(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="20"    height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                      </svg> </button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="card mt-3">
                        <div class="card-body">
                          <h5 class="card-title">Pembayaran</h5>
                          <hr>
                          <div class="card">
                            <div class="card-body">
                                <div class="col-md-2">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.604 15.4999L24.9998 26.1457L43.2707 15.5624" stroke="black" stroke-width="3.125" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M25 45.021V26.1251" stroke="black" stroke-width="3.125" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M20.6873 5.16668L9.56228 11.3333C7.04144 12.7292 4.97894 16.2292 4.97894 19.1042V30.875C4.97894 33.75 7.04144 37.25 9.56228 38.6458L20.6873 44.8333C23.0623 46.1458 26.9581 46.1458 29.3331 44.8333L40.4581 38.6458C42.9789 37.25 45.0414 33.75 45.0414 30.875V19.1042C45.0414 16.2292 42.9789 12.7292 40.4581 11.3333L29.3331 5.14585C26.9373 3.83335 23.0623 3.83335 20.6873 5.16668Z" stroke="black" stroke-width="3.125" stroke-linecap="round" stroke-linejoin="round"/>
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
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-body">
                    <p class="card-text fw-bold">Total Belanja</p>
                    <p class="text-end">Rp. {{ $total }}</p>
                    <div class="d-grid gap-2">
                        <button href="{{ route('checkout') }}" class="btn btn-danger" type="submit">Beli Sekarang</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection