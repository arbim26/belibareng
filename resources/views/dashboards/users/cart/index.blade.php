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
                                <p class="m-0">@php echo count($cart) @endphp Produk</p>
                                <form action="" method="post">
                                    @method('patch')
                                    @csrf()
                                    <button type="submit" class="text-end link-danger fw-bold">Hapus Semua</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @php $total = 0 @endphp
                    @php
                    @endphp
                    @foreach ($cart as $row)
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
                                    <form action="{{ route('cart.destroy', $row->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit">
                                            <i class="bi bi-trash" style="font-size: 1.5rem;"></i>
                                        </button>                    
                                    </form>
                                    <div class=" spinner border text-end">
                                      <button id="decrement" onclick="stepper(this)"><i class="bi bi-dash-lg"></i></button>
                                      <input type="number" min="0" max="100" step="1"  value="{{ $row['qty'] }}" id="my-input" readonly>
                                      <button id="increment" onclick="stepper(this)"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-body">
                    <p class="card-text fw-bold">Total Belanja</p>
                    {{-- <p class="text-end">Rp. {{number_format($total, 2)}}</p> --}}
                    <div class="d-grid gap-2">
                        <button class="btn btn-danger" type="button">Beli Sekarang</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection
@section('js')
{{-- <script type="text/javascript">
  
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
  
</script> --}}
@endsection