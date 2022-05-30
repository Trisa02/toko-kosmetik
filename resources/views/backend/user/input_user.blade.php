@extends('backend.index')
@section('title')
    Barang
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
                    <h5>Tambah Brand</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('save_user')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama_user"  class="form-control" placeholder="Nama">
                                    @error('nama_user')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username"  class="form-control" placeholder="Username">
                                    @error('username')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email"  class="form-control" placeholder="Email">
                                    @error('email')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">No. Telepon</label>
                                    <input type="text" name="no_tlpn"  class="form-control" placeholder="No. Telepon">
                                    @error('no_tlpn')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password"  class="form-control" placeholder="Password">
                                    @error('password')
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
