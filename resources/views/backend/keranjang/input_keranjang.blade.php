@extends('backend.index')
@section('title')
    Keranjang
@endsection

@section('content')
<!-- Setiap halaman harus pakai ini -->
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Keranjang</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Keranjang</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('save_keranjang')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Id Transaksi</label>
                                    <select name="id_transaksi" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                    </select>
                                    @error('id_transaksi')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <select name="id_barang" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($barang as $i => $isi)
                                        <option value="{{ $isi->id_barang}}">{{ $isi->nama_barang}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_barang')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal"  class="form-control" placeholder="Nama Barang">
                                    @error('tanggal')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="text" name="stok_keranjang"  class="form-control" placeholder="Stok">
                                    @error('stok_keranjang')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Detail Barang</label>
                                    <textarea class="form-control" name="detail" cols="30" rows="5"></textarea>
                                    @error('detail')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga"  class="form-control" placeholder="Harga">
                                    @error('harga')
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
