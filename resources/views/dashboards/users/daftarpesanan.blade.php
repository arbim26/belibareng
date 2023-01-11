@extends('layouts.app')
@section('content')

<section id="daftarpesanan" style="min-height: 300px">
    <div class="container col-10">
        <br>
        <h2>Daftar Pesanan</h2>
        <br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Invoice</th>
              <th>Nama Penerima</th>
              <th>No Telephone</th>
              <th>Email</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          {{-- {{dd($checkout->cart)}}   --}}
          @forelse ($checkout as $row)
          {{-- @php
              dd($row->cart->produk->barang)
          @endphp --}}
            <tr>
              <td>{{ $row->no_invoice }}</td>
              <td>{{ $row->nama_penerima }}</td>
              <td>{{ $row->tlp }}</td>
              <td>{{ $row->email }}</td>
              <td>{{ $row->cart->produk->barang }}</td>
              <td>{{ $row->qty }}</td>
              <td>{{ $row->status }}</td>
            </tr>
            @empty
            <div class="mt-4 alert alert-danger"> 
                Anda belum membeli apapun.
            </div>
          @endforelse
          </tbody>
        </table>
        <br>
        {{ $checkout->links('vendor.pagination.bootstrap-5') }}
    </div>
</section>
@endsection