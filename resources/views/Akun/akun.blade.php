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
                                @php
                                    $city = DB::table('cities')->where('city_id', Auth::user()->city_destination)->first();
                                    $province = DB::table('provinces')->where('province_id', Auth::user()->province_destination)->first();
                                @endphp
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
                                        <label>Provinsi </label>
                                        <select class="form-control provinsi-tujuan" name="province_destination" style="width:100%">
                                            <option value="0">-- Pilih Provinsi --</option>
                                            @foreach ($provinces as $province => $value)
                                                <option value="{{$province}}">{{ $value}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kota / Kabupaten</label>
                                        <select class="form-control kota-tujuan" name="city_destination" style="width: 100%">
                                            <option value="{{$city->city_id}}">{{$city->name}}</option>
                                        </select>
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

    @push('script')
    <script>
        $(document).ready(function(){
            $(".provinsi-tujuan, .kota-tujuan").select2({
                theme:'boostrap',width:'style',
            });
            //ajax provinsi dan kota
            $('select[name="province_destination"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        console.log(response)
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
            }
        });
    });
    </script>
    @endpush
@endsection
