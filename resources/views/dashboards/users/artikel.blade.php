@extends('layouts.app')
@section('content')

<section id="artikel">
    <div class="container pt-5">
      <h2 class="fw-bold text-center">Artikel</h2>
      <div class="container pt-5 pb-5">
          <div class="row">
            @foreach ($artikel as $data)
              <div class="col-6 col-sm-4 mb-4">
                <div class="card">
                  <img src="{{ Storage::url('artikels/').$data->image }}" class="card-img-top round" alt="">
                    <div class="isi-card">
                      <div class="title">
                        <a href="{{route('detailartikel', $data->id)}}" class="judul-card ">{{ Str::limit($data->title,100) }}</a>
                      </div>
                      <hr>
                      <div class="d-flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                        <p class="tanggal">
                          {{ $data->date }}
                        </p>
                      </div>
                    </div>
                </div>
              </div>
            @endforeach
          </div>

          <div class="text-end ">
            {{ $artikel->links('vendor.pagination.simple-bootstrap-5') }}
          </div>
        </div>
    </div>
  </section>
@endsection