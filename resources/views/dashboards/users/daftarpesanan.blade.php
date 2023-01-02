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
              <th>Nama Barang</th>
              <th>No Telephon</th>
              <th>Email</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($checkout as $row)
            <tr>
              <td>{{ $row->nama_penerima }}</td>
              <td>
                <ul>
                  {{-- @foreach ($produk as $item) --}}
                  <li>
                      {{ $row->order->detail->produk->barang }}
                  </li>
                  {{-- @endforeach --}}
                </ul>
              </td>
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