@extends('layouts.app')
  
@section('content')
<section id="cart">
    <div class="container pt-5 pb-5">
        <div class="row">
            <h2 class="fw-bold text-center mb-3">Keranjang Belanja</h2>
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
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-body">
                    <p class="card-text fw-bold">Total Belanja</p>
                    <p class="text-end">Rp. {{ $total }}</p>
                    <div class="d-grid gap-2">
                        <a class="btn text-white bg-red" href="{{ route('checkout') }}" style="background-color: #D82B2A;">Beli Sekarang</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection