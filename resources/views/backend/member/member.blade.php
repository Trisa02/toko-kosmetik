@extends('backend.index')
@section('title')
	Member
@endsection

@section('content')
<!-- Setiap halaman harus pakai ini -->
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                 <h2>Member</h2>
            </div>
        </div>
    </div>
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="float-left">
	                    <h5>Data Member</h5>
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
                            <th>Alamat</th>
                            <th>Gambar</th>
                            <th>Password</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($member as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama_user }}</td>
                            <td>{{ $isi->username }}</td>
                            <td>{{ $isi->email }}</td>
                            <td>{{ $isi->no_tlpn }}</td>
                            <td>{{ $isi->alamat }}</td>
                            <td>{{ $isi->gambar_user }}</td>
                            <td>{{ $isi->password }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
	        </div>
	    </div>
	</div>


@endsection