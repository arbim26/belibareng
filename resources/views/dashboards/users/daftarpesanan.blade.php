@extends('layouts.app')
@section('content')

<section id="daftarpesanan">
    <div class="container col-10">
        <br>
        <h2>Daftar Pesanan</h2>
        <br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama Penerima</th>
              <th>Invoice</th>
              <th>Nama Barang</th>
              <th>No Telephone</th>
              <th>Email</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          {{-- {{dd($checkout->cart)}}   --}}
          @foreach ($checkout as $row)
            <tr>
              <td>{{ $row->nama_penerima }}</td>
              <td>{{ $row->no_invoice }}</td>
              <td>{{ $row->cart->produk->barang }}</td>
              <td>{{ $row->tlp }}</td>
              <td>{{ $row->email }}</td>
              <td>{{ $row->status }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <br>
    </div>
</section>
@endsection