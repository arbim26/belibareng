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
            </div>
          </div>
          </div>
      </div>
    </div>
  </section>

  <section id="visi-misi">
    <h1 class="mb-5 text-center">Visi dan Misi Perusahaan</h1>
    <div class="container px-3 text-center">
        <div class="row gx-5">
          <div class="col">
           <div class="p-3 border bg-light round mb-5">
                <h2 class="mb-5">Visi</h2>
                    <img src="/assets/logo/Group.png" class="mb-5" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis cumque eveniet minima natus laboriosam ipsum! Officia inventore similique ab at, pariatur in nesciunt, repellendus atque iure impedit, sint praesentium alias!</p>
                </div>
          </div>
          <div class="col">
            <div class="p-3 border bg-light round mb-5">
                <h2 class="mb-5">Misi</h2>
                    <img src="/assets/logo/medal-star.png" class="mb-5" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis cumque eveniet minima natus laboriosam ipsum! Officia inventore similique ab at, pariatur in nesciunt, repellendus atque iure impedit, sint praesentium alias!</p>
                </div>
          </div>
        </div>
      </div>
  </section>
@endsection