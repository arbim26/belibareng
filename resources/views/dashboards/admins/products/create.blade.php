@extends('layouts.admin')

@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
            <div class="col-12">
              
              <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="page-title mb-3">Tabahkan Produk</h2>
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Add Product</strong>
                  </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="simpleinput">Barang</label>
                            <input type="text" name="barang" id="simpleinput" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                            <label for="example-email">Harga</label>
                            <input type="number" name="harga" id="harga"  class="form-control" placeholder="Rp.">
                          </div>
                          <div class="form-row">
                            <div class="col-md-8 mb-3">
                              <label for="example-multiselect">Kuota Minimum Perilisan</label>
                              <input type="number" name="minimal_rilis" id="stock" class="form-control" placeholder="Masukkan Jumlah Kuota Minimum">
                            </div>
                            <div class="col-md-4 mb-3">
                              <label for="validationCustom04">Satuan</label>
                              <select class="custom-select" name="satuan_id" id="validationCustom04" required="">
                                @foreach ($satuan as $satuans)
                                 <option value="{{ $satuans->id }}">{{ $satuans->satuan }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-md-8 mb-3">
                              <label for="example-multiselect">Jumlah Pack</label>
                              <input type="number" name="jumlah_pack" id="stock" class="form-control" placeholder="Maukkan Jumlah Pack/Satuan">
                            </div>
                            <div class="col-md-4 mb-3">
                              <label for="validationCustom04">Satuan</label>
                              <select class="custom-select" name="pack_id" id="validationCustom04" required="">
                                @foreach ($pack as $packs)
                                  <option value="{{ $packs->id }}">{{ $packs->pack }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group mb-3">
                            <label for="example-textarea">Deskripsi</label>
                            <textarea class="form-control" name="content" id="example-textarea" rows="4"></textarea>
                          </div>
                        </div> <!-- /.col -->
                        <div class="card-body">
                          <input type="file" name="image" class="dropzone bg-light rounded-lg" id="product">
                          
                            {{-- <div class="dz-message needsclick">
                              <div class="circle circle-lg bg-danger">
                                <i class="fe fe-upload fe-24 text-white"></i>
                              </div>
                              <h5 class="text-muted mt-4">Drop files here or click to upload</h5>
                            </div> --}}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-danger">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                  </form>
                </div> <!-- / .card -->
          </main> <!-- main -->
    

<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
