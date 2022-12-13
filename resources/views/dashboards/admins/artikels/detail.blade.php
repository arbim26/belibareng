@extends('layouts.app')
@section('content')
<section id="subartikel">
    <div class="container p-4">
        <div class="row d-flex">
            <div class="col-8 border-end">
                <div>
                    <img src="{{ Storage::url('articles/').$data->image }}" class="img-artikel" style="width: 100%" alt="...">
                    {{-- <label for="img-artikel">Foto : kemendag</label> --}}
                </div>
                <div class="text-artikel mt-3">
                    <h1>{{ $data->title }}</h1>
                    <div class="isi-artikel mt-4">
                        {!! $data->content !!}
                    </div>
                </div>
            </div>
            <div class="col-4 recent-posts">
                    <ul style="list-style-type:none;">
                        <li>
                            <div class="d-flex gap-2">
                                <div style="width: 4px; height: 25px; background: #EC5E24;"></div>
                                <h5>Recent Posts</h5>
                            </div>
                            <hr>
                        </li>
                        <li>
                            <a href="">Bantu Pasarkan Produk UMKM, Mendag Akan Buka Hipermarket di Arab Saudi</a>
                            <hr>
                        </li>
                        <li>
                            <a href="">Bantu Pasarkan Produk UMKM, Mendag Akan Buka Hipermarket di Arab Saudi</a>
                            <hr>
                        </li>
                        <li>
                            <a href="">Bantu Pasarkan Produk UMKM, Mendag Akan Buka Hipermarket di Arab Saudi</a>
                            <hr>
                        </li>
                        <li>
                            <a href="">Bantu Pasarkan Produk UMKM, Mendag Akan Buka Hipermarket di Arab Saudi</a>
                            <hr>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</section>
@endsection