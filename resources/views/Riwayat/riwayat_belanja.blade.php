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
            <div class="col-lg-8 ">
                @foreach ($riwayat as $rw)
                <div class="card border-secondary mb-5">
                    {{-- @dd($riwayat); --}}
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-bold">  <a  href="{{route('detail-transaksi', ['order_id' => $rw['invoice']] )}}">Invoice : {{$rw['invoice']}}</a> </h6>
                            <h6>@if ($rw['status']=='settlement')
                                Status : Sudah Melakukan Pembayaran
                            @else
                                Status : Belum Melakukan Pembayaran
                            @endif</h6>
                        </div>
                        <div class="row">
                            <table class="table">
                                @foreach ($rw['data'] as $item)
                                <tr >
                                    <td><img src="{{asset('gambar/'.$item->gambar)}}" alt="" style="width: 50px;"> {{$item->nama_barang}}</td></td>
                                    <td>Rp.{{number_format($item->harga,0,',','.')}}</td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h6 class="font-weight-bold">Total Pesanan</h6>
                            <h6>Rp. {{number_format($rw['total_bayar'],0,',','.')}}</h6>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
