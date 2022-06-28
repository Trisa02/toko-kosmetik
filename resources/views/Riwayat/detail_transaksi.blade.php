@extends('template')
@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Riwayat Transaksi</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{route('home')}}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0"><a href="">Riwayat Transaksi</a></p>
        </div>
    </div>
</div>
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
                        <h6 class="font-weight-bold">Invoice :{{$transaksi->order_id}}</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6 class="font-weight-bold">Alamat Pengiriman</h6>
                                <h6 class="font-weight-medium">{{$user->nama_user}}</h6>
                                <h6 class="font-weight-medium">{{$kota->name}}</h6>
                                <h6 class="font-weight-medium">{{$user->telepon}}</h6>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6 class="font-weight-bold">Kurir</h6>
                                <h6 class="font-weight-medium">{{$transaksi->kurir}}</h6>
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
                        @php
                                    $sub_total=0;
                        @endphp
                            @foreach ($detail as $dtl)
                            <tr>
                                <td style="width: 70%"><img src="{{asset('gambar/'.$dtl->gambar)}}" alt="" style="width: 50px;"> {{$dtl->nama_barang}} </td>
                                <td><b>{{$dtl->qty}} pcs</b> </td>
                                <th>:</th>
                                <td>Rp.{{number_format($dtl->total)}}</td>
                            </tr>
                            @php
                                    $sub_total += $dtl->total;
                                @endphp
                            @endforeach


                    </table>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Rincian Pembayaran</h5>
                    </div>
                        <table class="table">
                            <tr>

                                <th style="width: 80%">Sub Total Produk</th>
                                <th>:</th>
                                <td>Rp.{{number_format($sub_total)}}</td>
                            </tr>
                            <tr>
                                <th style="width: 80%">Ongkir</th>
                                <th>:</th>
                                <td >Rp.{{number_format($transaksi->ongkir)}}</td>
                            </tr>
                            <tr>
                                <th style="width: 80%">Total belanja</th>
                                <th>:</th>
                                <td >Rp.{{number_format($transaksi->total_bayar)}}</td>
                            </tr>
                        </table>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <table class="table">
                        <tr>
                            <th style="width: 80%">Metode Pembayaran</th>
                            <th>:</th>
                            <td>{{$transaksi->payment_type}}</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        @if ($transaksi->nomor_resi == null)
                            <h6 class="text-center"><i class="text-danger"><i class="fa fa-times"></i> Nomor Resi Belum Diinput</i></h6>
                            @else
                            <button type="button" class="btn btn-primary btn-block"><i class="fa fa-search"></i> LACAK BARANG</button>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
