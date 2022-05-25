@extends('backend.index')
@section('title')
    Barang
@endsection

@section('content')
<!-- Setiap halaman harus pakai ini -->
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Barang</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Brand</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('save_slider')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Judul Slider</label>
                                    <input type="text" name="judul_slider"  class="form-control" placeholder="Judul Slider">
                                    @error('judul_slider')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar_slider" class="form-control" placeholder="Gambar">
                                    @error('gambar_slider')
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
