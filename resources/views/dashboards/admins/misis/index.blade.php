@extends('layouts.admin')
@section('main')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">MISI</h2>
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
                                        <a href="{{ route('misi.create')}}" class="btn btn-md btn-danger mb-3">ADD +</a>
                                      </div>
                                      <div class="form-group col-auto">
                                        <form class="form" method="get" action="">
                                          <div class="form-group w-100 mb-3">
                                              <input type="text" class="form-control" id="search1" value="" placeholder="Search">
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>GAMBAR</th>
                                            <th>JUDUL</th>
                                            <th>CONTENT</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($misi as $row)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ Storage::url('misi/').$row->image }}" class="rounded"
                                                    style="width: 150px">
                                            </td>
                                            <td>{{ $row->title }}</td>
                                            <td>{!! Str::limit($row->content,100) !!}</td>
                                            <td class="">
                                              <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <span class="text-muted sr-only">Action</span>
                                              </button>
                                            <div class="dropdown-menu dropdown-menu-right" style="">
                                                <a class="dropdown-item" href=" {{ route('misi.edit', $row->id) }}">Edit</a>
                                            </div>
                                          </td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-danger">
                                            Data Misi belum Tersedia.
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>
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

