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
                    <form action="{{route('update_slider')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                    <input type="text" name="id_slider" value="{{ $slider->id_slider}}" class="form-control" hidden>
                                    @error('id_slider')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Judul Slider</label>
                                    <input type="text" name="judul_slider" value="{{$slider->judul_slider}}" class="form-control" placeholder="Judul Slider">
                                    @error('judul_slider')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <i><?= $slider->gambar_slider ?></i>
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
