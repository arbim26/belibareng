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
                        <div class="row">
                          <div class="col">
                            <p class="f-20 jingga">{{number_format($data->harga)}}</p>
                          </div>
                          <div class="col">
                            <p class="f-15 text-muted">{{$data->stock}}</p>
                          </div>
                        </div>
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