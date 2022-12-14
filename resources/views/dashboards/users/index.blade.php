@extends('layouts.app')

@section('content')
<section class="banner">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item img-fluid active" data-bs-interval="2000">
          <img src="../assets/image/Slider 1.jpg" class="img-fluid d-block w-100" alt="...">
        </div>
        <div class="carousel-item img-fluid" data-bs-interval="2000">
          <img src="../assets/image/Slider 2.jpg" class="img-fluid d-block w-100" alt="...">
        </div>
        <div class="carousel-item img-fluid" data-bs-interval="2000">
          <img src="../assets/image/Slider 3.jpg" class="img-fluid d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</section>

<section id="produk">
    <div class="container pt-5">
        <h2 class="fw-bold text-center">Produk Kami</h2>
        <div class="container pt-5 pb-5">
            <div class="row ">
              @foreach ($products->take(4) as $data)
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
            <div class="text-end">
              <a href="{{ route('produk') }}" type="button" class="merah">Selengkapnya</a>
            </div>
          </div>
    </div>
</section>

<section id="tentang-kami">
  <div class="container pt-5 pb-5">
    <div class="row">
      @foreach ($tentangkami as $aboutus)
      <div class="col-md-4">
        <img src="{{ Storage::url('aboutus/').$aboutus->image }}" class="round tentangkami-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="p-1">
          <h2 class="fw-bold">{{$aboutus->title}}</h2>
          <p class="text-kami mt-3">{!! $aboutus->content !!}</p>
          <div class="text-end mt-5">
   
          </div>
        </div>
        </div>
      @endforeach
    </div>
    <div class="text-end">
      <a href="{{ route('tentangkami') }}" type="button" class="merah">Selengkapnya</a>
    </div>
  </div>
</section>

<section id="artikel">
  <div class="container pt-5">
    <h2 class="fw-bold text-center">Artikel</h2>
    <div class="container pt-5 pb-5">
      <div class="row">
          @foreach ($artikel->take(3) as $data)
          <div class="col-6 col-md-4 mb-4 d-flex ">
            <div class="card">
              <img src="{{ Storage::url('artikels/').$data->image }}" class="card-img-top round" alt="">
              <div class="isi-card d-flex flex-column ">
                <div class="title">
                  <a href="{{route('detailartikel', $data->id)}}" class="judul-card ">{{ Str::limit($data->title,100) }}</a>
                </div>
                <hr>
                <div class="d-flex gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                    <p class="tanggal">
                      {{ $data->created_at }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

        <div class="text-end ">
          <a href="{{ route('artikel') }}" type="button" class="merah link">Selengkapnya</a>
        </div>
      </div>
  </div>
</section>  
@endsection
