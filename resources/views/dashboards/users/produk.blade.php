@extends('layouts.app')
@section('content')

<section id="produk">
    <div class="container pt-5">
      <form action="product">
        <div class="row ">
              @foreach ($products as $data)
                <div class="col-6 col-sm-3 mb-4">
                  <div class="card">
                    <img src="{{ Storage::url('products/').$data->image }}" class="card-img-top round" alt="">
                    <div class="isi-card">
                      <a class="judul-card" href="{{route('detailproduk', $data->id)}}">{{Str::limit($data->barang,30)}}</a>
                      <p class="f-20 jingga m-0">Rp. {{number_format($data->harga)}}</p>
                      @if ($data->status == 'belum rilis')
                      <p class="f-15 text-muted mt-1 mb-0">Kuota Barang : {{ number_format($data->minimal_rilis) }} {{ $data->satuan->satuan }} / {{ number_format($data->barang_dipesan) }} {{ $data->satuan->satuan }}</p>
                          @else
                      <small class="mb-0 mb-1 alert alert-danger p-2" style="width: 200px">Barang sudah rilis</small>
                      @endif
                    </div>
                </div>
                </div>
                @endforeach
          </div>
      </form>
      <img src="../assets/image/banner.jpg" class="img-fluid round mb-4" alt="">
    </div>

</section>
@endsection