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
	                <div class="float-left">
	                    <h5>Data Diskon</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_diskon')}}" class="btn btn-info btn-sm">Tambah Data</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Detail Diskon</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($diskon as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama_barang }}</td>
                            <td>{{ $isi->detail_diskon }}</td>
                            <td><img src="{{asset('gambar/'. $isi->gambar_diskon)}}" width="30%" alt=""></td>
                            <td>
                                <a href="{{route('hapus_diskon',$isi->id_diskon)}}" class=" btn btn-danger  btn-block "><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
	        </div>
	    </div>
	</div>

@endsection