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
                    <form action="{{route('update_barang')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                    <input type="text" name="id_barang" value="{{ $barang->id_barang}}" class="form-control" hidden>
                                    @error('id_barang')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($kategori as $i => $isi)
                                        <option value="{{ $isi->id_kategori}}">{{ $isi->nama_kategori}}</option>
                                        @endforeach
                                        <script>
                                            document.getElementById('id_kategori').value = '{{$barang->id_kategori}}'
                                        </script>
                                    </select>
                                    @error('nama_kategori')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Brand</label>
                                    <select name="id_brand" class="form-control" id="id_brand">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($brand as $i => $isi)
                                        <option value="{{ $isi->id_brand}}">{{ $isi->nama_brand}}</option>
                                        @endforeach
                                        <script>
                                            document.getElementById('id_brand').value = '{{$barang->id_brand}}'
                                        </script>
                                    </select>
                                    @error('nama_brand')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <input type="text" name="nama_barang" value="{{$barang->nama_barang}}"  class="form-control" placeholder="Nama Barang">
                                    @error('nama_barang')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="text" name="stok" value="{{$barang->stok}}"  class="form-control" placeholder="Stok">
                                    @error('stok')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" value="{{$barang->harga}}"  class="form-control" placeholder="Harga">
                                    @error('harga')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Detail</label>
                                    <textarea class="form-control" name="detail" value="" cols="30" rows="5">{{$barang->detail}}</textarea>
                                    @error('detail')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <i><?= $barang->gambar ?></i>
                                    <input type="file" name="gambar" class="form-control" placeholder="Gambar">
                                    @error('gambar')
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
