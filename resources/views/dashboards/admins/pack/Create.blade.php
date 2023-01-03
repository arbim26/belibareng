@extends('layouts.admin')
@section('main')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">About Us</h2>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('pack.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Pack</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="pack" value="{{ old('title') }}" placeholder="Masukkan Nama pack">
                                    
                                        <!-- error message untuk title -->
                                        @error('title')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                    <a href="{{route("pack.index")}}" type="cancel" class="btn btn-md btn-danger">CANCEL</a>
        
                                </form> 
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection
