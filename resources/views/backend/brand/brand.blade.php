@extends('backend.index')
@section('title')
	Brand
@endsection

@section('content')
<!-- Setiap halaman harus pakai ini -->
                    <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                    </div>
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="float-left">
	                    <h5>Data Brand</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_brand')}}" class="btn btn-info btn-sm">Tambah Data</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Brand</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brand as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama_brand }}</td>
                            <td>
                                <a href="{{route('edit_brand',$isi->id_brand)}}" class=" btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="{{route('hapus_brand',$isi->id_brand)}}" class=" btn btn-danger"><i class="fa fa-trash"></i></a>
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