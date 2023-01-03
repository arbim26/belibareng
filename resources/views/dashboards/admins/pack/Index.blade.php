@extends('layouts.admin')
@section('main')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">Tambah Pack Baru</h2>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <div class="toolbar">
                                    <form class="form">
                                        <div class="form-row">
                                            <div class="form-group col-auto mr-auto">
                                                <a href="{{ route('pack.create')}}"
                                                    class="btn btn-md btn-primary mb-3">TAMBAH PACK</a>
                                            </div>
                                            <div class="form-group col-auto">
                                                <div class="form-group col-auto">
                                                    <label for="search" class="sr-only">Search</label>
                                                    <input type="text" class="form-control" id="search1" value="" placeholder="Search">
                                                </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>pack</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $index => $row)
                                        <tr>
                                            <td>{{ $data->firstItem() + $index }}</td>
                                            <td>{{ $row->pack }}</td>
                                            <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('pack.destroy', $row->id) }}" method="POST">
                                                <a class="text-dark" href="{{ route('pack.edit', $row->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger">Hapus</button>
                                            </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-danger">
                                            Data Artikel belum Tersedia.
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $data->links('vendor.pagination.bootstrap-5') }}
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection
