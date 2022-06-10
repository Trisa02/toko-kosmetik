@extends('backend.index')
@section('title')
	Kategori
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
	                <div class="float-left">
	                    <h5>Data Kategori</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_kategori')}}" class="btn btn-info btn-sm">Tambah Data</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama_kategori }}</td>
                            <td>{{ $isi->slug_kategori }}</td>
                            <td>
                                <a href="{{route('edit_kategori',$isi->id_kategori)}}" class=" btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="{{route('hapus_kategori',['id_kategori' => $isi->id_kategori])}}" class=" btn btn-danger"><i class="fa fa-trash"></i></a>
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