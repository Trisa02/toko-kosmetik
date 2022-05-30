@extends('backend.index')
@section('title')
    Diskon
@endsection

@section('content')
<!-- Setiap halaman harus pakai ini -->
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Diskon</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Diskon</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('save_diskon')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <select name="id_barang" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($barang as $i => $isi)
                                        <option value="{{ $isi->id_barang}}">{{ $isi->nama_barang}}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_barang')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Detail Diskon</label>
                                    <input type="text" name="detail_diskon" class="form-control" placeholder="Detail Diskon">
                                    @error('detail_diskon')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar_diskon" class="form-control" placeholder="Gambar">
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
