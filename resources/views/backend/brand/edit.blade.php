@extends('backend.index')
@section('title')
    Brand
@endsection

@section('content')
<!-- Setiap halaman harus pakai ini -->
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Brand</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Brand</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('update_brand')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_brand" value="{{$brand->id_brand}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Brand</label>
                                    <input type="text" name="nama_brand" value="{{$brand->nama_brand}}"  class="form-control" placeholder="Tahun Ajaran">
                                    @error('nama_brand')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block ">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
