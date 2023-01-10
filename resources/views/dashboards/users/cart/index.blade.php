@extends('layouts.app')
  
@section('content')
<section id="cart">
    <div class="container pt-5 pb-5">
        <div class="row">
            <h2 class="fw-bold text-center mb-3">Keranjang Belanja</h2>
            <br>
            <div class="col-md-8 mt-3">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="bi bi-x"></i>
                        </button>
                        <strong></strong> {{ session('success') }}
                    </div>
                @endif
                <div class="d-flex flex-column">
                    <div class="">
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center card-body">
                                <p class="m-0">@php echo count($data) @endphp Produk</p>
                                <form onsubmit="return confirm('Kosongkan Keranjang ?');" action="{{ route('cart.clear') }}" method="post">
                                    @csrf()
                                    <button type="submit" class="text-end link-danger fw-bold">Hapus Semua</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @forelse ($data as $row)
                    <div class="card mt-3">
                        <div class="card-body">
                          <h5 class="card-title"><i class="bi bi-shop-window" ></i>Jawa Barat - Depok</h5>
                          <div class="row pt-3">
                            <div class="col-md-2">
                                <img src="{{ Storage::url('products/').$row->produk->image }}" class="rounded" style="width: 100%" alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                  <div class="col"><p class="card-text">{{ $row->produk->barang }}</p></div>
                                  <div class="col"><p class="text-end">Rp{{number_format($row->produk->harga, 2)}}</p></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <form onsubmit="return confirm('Hapus Barang ?');" action="{{ route('cart.destroy', $row->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit">
                                            <i class="bi bi-trash" style="font-size: 1.5rem; color: #D82B2A "></i>
                                        </button>                    
                                    </form>
                                    <div class=" spinner border text-end">
                                        <form action="{{ route('cart.minus',$row->id) }}" method="POST">  
                                            @csrf
                                            <button class="mt-1" type="submit"><i class="bi bi-dash-lg"></i></button>
                                        </form>
                                        <input type="number" min="0" max="100" step="1"  value="{{ $row->qty }}" id="my-input" readonly>
                                        <form action="{{ route('cart.plus',$row->id) }}" method="POST">  
                                            @csrf
                                            <button class="mt-1" type="submit"><i class="bi bi-plus-lg"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>  
                    @empty
                    <div class="mt-4 alert alert-danger"> 
                        Belum ada barang di cart.
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-body">
                    <p class="card-text fw-bold">Total Belanja</p>
                    <p class="text-end">Rp. {{number_format($total, 2)}}</p>
                    <div class="d-grid gap-2">
                        <a class="btn text-white bg-red" href="{{ route('form.checkout') }}" style="background-color: #D82B2A;">Beli Sekarang</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection
@section('js')
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
@endsection