@extends('backend.index')
@section('title')
    Brand
@endsection

@section('content')
<!-- Setiap halaman harus pakai ini -->
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Kategori</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Kategori</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('update_kategori')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_kategori" value="{{$kategori->id_kategori}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}"  class="form-control" placeholder="Nama Kategori">
                                    @error('nama_kategori')
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
