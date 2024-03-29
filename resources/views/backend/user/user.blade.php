@extends('backend.index')
@section('title')
	User
@endsection

@section('content')
<!-- Setiap halaman harus pakai ini -->
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                 <h2>User</h2>
            </div>
        </div>
    </div>
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="float-left">
	                    <h5>Data User</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_user')}}" class="btn btn-info btn-sm">Tambah User</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($user as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama_user }}</td>
                            <td>{{ $isi->username }}</td>
                            <td>{{ $isi->email }}</td>
                            <td>{{ $isi->no_tlpn }}</td>
                            <td>{{ $isi->password }}</td>
                            <td>
                                <a href="{{route('edit_user',$isi->id)}}" class=" btn btn-warning btn-block "><i class="fa fa-edit"></i></a>
                                <a href="{{route('hapus_user',$isi->id)}}" class=" btn btn-danger  btn-block "><i class="fa fa-trash"></i></a>
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