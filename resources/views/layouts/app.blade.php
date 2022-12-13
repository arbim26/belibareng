<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="../assets/Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/Scripts/bootstrap.min.js"></script>
    
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Metro UI -->
    
    {{-- <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <link rel="stylesheet" href="../../assets/css/main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>BeliBareng</title>
</head>

<body>

    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-white bg-body shadow p-3 mb-5 bg-body fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                    <img src="../../assets/logo/logo belibareng 1-01.png" width="" height="40" alt="">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('user.dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tentangkami') }}">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('artikel') }}">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('produk') }}">Produk</a>
                        </li>
                        @endauth

                        <div class="navbar-nav d-flex gap-2">
                            <div class="dropdown">
                                <button type="button" class="dropbtn" data-toggle="dropdown">
                                    <i class="bi bi-cart" style="font-size: 1.6rem; color: black;"></i><span class="position-absolute start-75 translate-middle badge rounded-pill bg-danger" style="top: 10px">{{ count((array) session('cart')) }}</span>
                                </button>
                                <div class="dropdown-cart hover">
                                    @php $total = 0 @endphp
                                    @foreach((array) session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                    @endforeach
                                    <div class="row d-flex d-flex justify-content-between">
                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                            <p>Total: <span class="jingga">Rp {{ $total }}</span></p>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-6 checkout text-end jingga">
                                            <a href="{{ route('cart') }}" class="jingga">Lihat Selengkapnya</a>
                                        </div>
                                    </div>
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            <hr>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-lg-3 col-sm-3 col-3 ">
                                                    <img src="{{ Storage::url('products/').$details['image'] }}" style="width: 100%"; height="auto"/>
                                                </div>
                                                <div class="col-lg-5 col-sm-5 col-5" >
                                                    <h4 class="fw-bolder">{{ $details['name'] }}</h4>
                                                    <p class="count" style="font-size: 12px"> Jumlah:{{ $details['quantity'] }}</p>
                                                </div>
                                                <div class="col-lg-4 col-sm-4 col-4 ">
                                                    <span class="price jingga"> Rp{{ $details['price'] }}</span> 
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                              </div>
                            <div class="dropdown">


                            </div>

                            <div class="dropdown">
                                <a class="" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="bi bi-person-circle" style="font-size: 1.75rem; color: black;"></i>
                                </a>
                                <ul class="dropdown-menu hover" aria-labelledby="dropdow  nMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Akun Saya</a></li>
                                    <li><a class="dropdown-item" href="">Pesanan Saya</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </form>
                            </div>
                        </div>
                </div>
            </div>

            </div>
        </nav>
    </section>

    <div class="wrapper">
        @yield('content')
    </div>

    <section id="footer">
        <div class="container pt-5 pb-5">
            <div class="row d-flex text-white justify-content-center">
                <div class="kontak col-md-4">
                    <h5 class="mb-3">Hubungi Kami</h5>
                    <div class="d-flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                        <p>
                            belibareng
                        </p>
                    </div>
                    <div class="d-flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                        <p>
                            Facebook
                        </p>
                    </div>
                    <div class="d-flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                        <p>
                            belibareng
                        </p>
                    </div>
                    <div class="d-flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                        <p>
                            belibareng@gmail.com
                        </p>
                    </div>
                </div>

                <div class="tentang-kami col-md-4">
                    <div class="d-flex gap-3">
                        <img src="../assets/logo/logo belibareng 2-01.png" style="height: 40px" alt="">
                        <h5 class="mb-3">Tentang Kami</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum placeat in, neque reprehenderit
                        iste voluptas delectus! Pariatur praesentium tempore commodi doloremque, libero atque sequi
                        perspiciatis debitis ea, explicabo quaerat nesciunt id nam rerum, similique maxime sed sapiente?
                        Id, numquam facilis!</p>
                </div>

                <div class="artikel col-md-4">
                    <h5>Lokasi Kami</h5>
                    <div id="googleMap" style="width:100%;height:200px;"></div>
                </div>
            </div>
          </div>

          <div class="copyright d-flex justify-content-center">
            <h6 class="text-white">Copyright © Digital Forte Indonesia</h6>
          </div>
          
        </div>
    </section>

    <!-- Metro UI -->
    {{-- <script src="https://cdn.korzh.com/metroui/v4/js/metro.min.js"></script> --}}
    <script>
        // fungsi initialize untuk mempersiapkan peta
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-8.5830695,116.3202515),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        }

        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <script>
    const myInput = document.getElementById("my-input");
    function stepper(btn){
        let id = btn.getAttribute("id");
        let min = myInput.getAttribute("min");
        let max = myInput.getAttribute("max");
        let step = myInput.getAttribute("step");
        let val = myInput.getAttribute("value");
        let calcStep = (id == "increment") ? (step*1) : (step * -1);
        let newValue = parseInt(val) + calcStep;
        
        if(newValue >= min && newValue <= max){
            myInput.setAttribute("value", newValue);
        }
    }
    </script>

<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>





    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
