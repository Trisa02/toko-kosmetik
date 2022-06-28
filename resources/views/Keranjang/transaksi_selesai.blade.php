@extends('template')
@section('content')
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Transaksi Selesai</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('home')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                 <p class="m-0"><a href={{route('cart')}}>Keranjang Saya</a></p>
            </div>
        </div>
    </div>
    {{-- @dd($kota) --}}
    <div class="container-fluid pt-10">
        <div class="row px-xl-18">
            <div class="col-md-2"></div>
            <div class="col-lg-8">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Detail Transaksi</h4>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-bold">Invoice :{{$selesai->order_id}}</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6 class="font-weight-medium">Total Pembayaran</h6>
                                    <h6 class="font-weight-bold">Rp.{{number_format($selesai->total_bayar)}}</h6>
                                </div>
                                <div class="form-group">
                                    <h6 class="font-weight-medium">Rincian Penerima</h6>
                                    <h6 class="font-weight-bold">{{$user->nama_user}}</h6>
                                    <h6 class="font-weight-bold">{{$kota->name}}</h6>
                                    <h6 class="font-weight-bold">{{$user->telepon}}</h6>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6 class="font-weight-medium">Waktu Pembayaran</h6>
                                    <h6 class="font-weight-bold">{{$selesai->transaction_time}}</h6>
                                </div>
                                <div class="form-group">
                                    <h6 class="font-weight-medium">Metode Pembayaran</h6>
                                    <h6 class="font-weight-bold">{{$selesai->payment_type}}</h6>
                                </div>
                                <div class="form-group">
                                    <h6 class="font-weight-medium">Status Transaksi</h6>
                                    <h6 class="font-weight-bold">
                                        @if ($selesai->transaction_status == 'settlement')
                                            Sudah Melakukan Pembayaran
                                        @else
                                            Menunggu Pembayaran
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Rincian Pesanan</h5>
                            <h6 class="font-weight-bold"></h6>
                        </div>
                        <table class="table">
                                @foreach ($keranjang as $kp)
                                <tr>
                                    <td >{{$kp->nama_barang}}</td>
                                    <td>{{$kp->qty}}</td>
                                    <td>Rp.{{number_format($kp->harga)}}</td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Rincian Pengiriman</h5>
                        </div>
                        <table class="table">
                            <tr>
                                <td>Pengiriman</td>
                                <td></td>
                                <td>{{$selesai->kurir}}</td>
                            </tr>
                            <tr>
                                <td>Ongkir</td>
                                <td></td>
                                <td>Rp. {{$selesai->ongkir}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total Pembayaran</h5>
                            <h5 class="font-weight-bold" >Rp.{{number_format($selesai->total_bayar)}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
