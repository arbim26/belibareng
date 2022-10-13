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
              <th>Barang</th>
              <th>Jumlah</th>
              <th>Status</th>
              <th>Pembayaran</th>
              <th>Pengiriman</th>
              <th>Alamat</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tepung</td>
              <td>50 Kg</td>
              <td>Sedang diproses</td>
              <td>Transfer</td>
              <td>Kurir</td>
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
            </tr>
            <tr>
              <td>Minyak Goreng</td>
              <td>50 L</td>
              <td>Belum Bayar</td>
              <td>COD</td>
              <td>Kurir</td>
              <td>Lorem ipsum dolor, sit amet consectetur adipisicing.</td>
            </tr>
            <tr>
              <td>Detergen Sabun</td>
              <td>5 pcs</td>
              <td>Sudah diterima oleh pemilik</td>
              <td>Transfer</td>
              <td>Kurir</td>
              <td>Lorem ipsum dolor, sit amet consectetur adipisicing.</td>
            </tr>
          </tbody>
        </table>
        <br>
      </div>
</section>
@endsection