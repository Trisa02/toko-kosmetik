@extends('template')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Profil Saya</h3>
                    <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
                </div>
                <div class="card-body">
                    <form action="{{route('editakun',$akun->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="{{asset('gambar/'.$akun->gambar)}}" width="30%" height="30%" class="rounded-circle" alt="Cinque Terre">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="gambar" >
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama User</label>
                                        <input type="text" value="{{$akun->nama_user}}" name="nama_user" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" value="{{$akun->username}}" name="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email_user">Email</label>
                                        <input type="text" name="email_user" value="{{$akun->email_user}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" value="{{$akun->password}}" class="form-control">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{$akun->alamat}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input class="form-control" type="text" value={{$akun->telepon}} name="telepon" placeholder="Input No Telepon" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
