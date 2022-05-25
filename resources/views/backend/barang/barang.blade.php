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
	                <div class="float-left">
	                    <h5>Data Barang</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_barang')}}" class="btn btn-info btn-sm">Tambah Data</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Nama Brand</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Detail</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama_kategori }}</td>
                            <td>{{ $isi->nama_brand }}</td>
                            <td>{{ $isi->nama_barang }}</td>
                            <td>{{ $isi->stok }}</td>
                            <td>{{ $isi->harga }}</td>
                            <td>{{ $isi->detail }}</td>
                            <td><img src="{{asset('gambar/'. $isi->gambar)}}" width="30%" alt=""></td>
                            <td>
                                <a href="{{route('edit_barang',$isi->id_barang)}}" class=" btn btn-warning btn-block "><i class="fa fa-edit"></i></a>
                                <a href="{{route('hapus_barang',$isi->id_barang)}}" class=" btn btn-danger  btn-block "><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
	        </div>
	    </div>
	</div>

@if (session('success') == true)
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@endif

@endsection