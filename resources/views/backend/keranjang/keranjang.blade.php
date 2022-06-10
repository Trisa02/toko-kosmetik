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
	                <div class="float-left">
	                    <h5>Data Keranjang</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_keranjang')}}" class="btn btn-info btn-sm">Tambah Data</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Tanggal</th>
                            <th>Detail</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keranjang as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->id_transaksi }}</td>
                            <td>{{ $isi->nama_barang }}</td>
                            <td>{{ $isi->stok_keranjang }}</td>
                            <td>{{ $isi->tanggal }}</td>
                            <td>{{ $isi->detail }}</td>
                            <td>{{ $isi->harga }}</td>
                            <td>{{ $isi->total }}</td></td>
                            <td>
                                <a href="{{route('edit_keranjang',$isi->id_keranjang)}}" class=" btn btn-warning btn-block "><i class="fa fa-edit"></i></a>
                                <a href="{{route('hapus_keranjang',$isi->id_keranjang)}}" class=" btn btn-danger  btn-block "><i class="fa fa-trash"></i></a>
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