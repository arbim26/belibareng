@extends('layouts.app')

@section('content')
<section class="banner">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner" style="height: 600px">
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
                <div class="col-6 col-sm-3 mb-4">
                  <div class="card">
                      <img src="../assets/image/oil.jpg" class="card-img-top round" alt="">
                      <div class="isi-card">
                        <h4 class="judul-card">Minyak Goreng</h4>
                        <div class="row">
                          <div class="col">
                            <p class="f-20 jingga">Rp28.000</p>
                          </div>
                          <div class="col">
                            <p class="f-15 text-muted">575/1000L</p>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-6 col-sm-3 mb-4">
                  <div class="card">
                      <img src="../assets/image/tepung.jpg" class="card-img-top round" alt="">
                      <div class="isi-card">
                        <h4 class="judul-card">Tepung</h4>
                        <div class="row">
                          <div class="col">
                            <p class="f-20 jingga">Rp12.000</p>
                          </div>
                          <div class="col">
                            <p class="f-15 text-muted">850/1000kg</p>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-6 col-sm-3 mb-4">
                  <div class="card">
                      <img src="../assets/image/sugar.jpg" class="card-img-top round" alt="">
                      <div class="isi-card">
                        <h4 class="judul-card">Gula</h4>
                        <div class="row">
                          <div class="col">
                            <p class="f-20 jingga">Rp10.000</p>
                          </div>
                          <div class="col">
                            <p class="f-15 text-muted">150/1000kg</p>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                  <div class="col-6 col-sm-3 mb-4">
                    <div class="card">
                        <img src="../assets/image/rice.jpg" class="card-img-top round" alt="">
                        <div class="isi-card">
                          <h4 class="judul-card">Beras</h4>
                          <div class="row">
                            <div class="col">
                              <p class="f-20 jingga">Rp8.000</p>
                            </div>
                            <div class="col">
                              <p class="f-15 text-muted">666/1000kg</p>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
            </div>

            <div class="text-end ">
              <a href="#" type="button" class="merah link">Selengkapnya</a>
            </div>
          </div>
    </div>
</section>

<section id="tentang-kami">
  <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-md-4">
        <img src="/assets/image/Kumpulan_Sembako.jpg" class="round tentangkami-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="p-1">
          <h2 class="fw-bold">Tentang Kami</h2>
          <p class="text-kami mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus fugiat, accusantium ex minima dicta pariatur ducimus autem, maxime excepturi deleniti tempore impedit modi sint earum neque doloribus, dolorem corporis? Provident dolorum nisi nesciunt praesentium odio eius consectetur quisquam, ipsa et dolorem repudiandae laboriosam, cupiditate, in iste quod voluptate obcaecati dolore? Iure, adipisci nostrum. Quam saepe maiores tenetur doloribus possimus laborum exercitationem, dignissimos sapiente commodi fuga ratione voluptas temporibus! Necessitatibus, eligendi corporis! Quisquam libero odio est veritatis illum optio a alias sit in quas explicabo voluptas sed, nam placeat expedita assumenda beatae magnam facere cum harum. Ut doloribus fugiat eveniet est!</p>
          <div class="text-end mt-5">
            <button type="button" class="btn" style="background-color: #D82B2A; color: white">Selengkapnya</button>
          </div>
        </div>
        </div>
    </div>
  </div>
</section>

<section id="artikel">
  <div class="container pt-5">
    <h2 class="fw-bold text-center">Artikel</h2>
    <div class="container pt-5 pb-5">
        <div class="row ">
            <div class="col-6 col-sm-4 mb-4">
              <div class="card">
                  <img src="../assets/image/artikel1.png" class="card-img-top round" alt="">
                  <div class="isi-card">
                    <h1 class="judul-card ">Bantu Pasarkan Produk UMKM, Mendag Akan Buka Hipermarket di Arab Saudi</h1>
                    <hr>
                    <div class="d-flex gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                      <p class="tanggal">
                        30 Okt 2022
                      </p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 mb-4">
              <div class="card">
                  <img src="../assets/image/artikel2.png" class="card-img-top round" alt="">
                  <div class="isi-card">
                    <h1 class="judul-card ">Bantu Pasarkan Produk UMKM, Mendag Akan Buka Hipermarket di Arab Saudi</h1>
                    <hr>
                    <div class="d-flex gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                      <p class="tanggal">
                        30 Okt 2022
                      </p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 mb-4">
              <div class="card">
                  <img src="../assets/image/artikel3.png" class="card-img-top round" alt="">
                  <div class="isi-card">
                    <h1 class="judul-card ">Bantu Pasarkan Produk UMKM, Mendag Akan Buka Hipermarket di Arab Saudi</h1>
                    <hr>
                    <div class="d-flex gap-2 ms-5">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                      <p class="tanggal">
                        30 Okt 2022
                      </p>
                    </div>
                  </div>
              </div>
            </div>


        </div>

        <div class="text-end ">
          <a href="#" type="button" class="merah link">Selengkapnya</a>
        </div>
      </div>
  </div>
</section>
@endsection
