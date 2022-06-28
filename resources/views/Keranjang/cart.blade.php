@extends('template')
@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Keranjang Belanja</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{route('home')}}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Keranjang Belanja</p>
        </div>
    </div>
</div>
<div class="container-fluid pt-8">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        $sub_total = 0;
                    @endphp
                    @foreach ($cart as $c => $cr)
                    <tr>
                        <td class="align-middle"><img src="{{asset('gambar/'.$cr->gambar)}}" alt="" style="width: 50px;"> {{$cr->nama_barang}}</td>
                        <td class="align-middle">Rp.{{number_format($cr->harga)}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <a href="{{route('qtykurang',[$cr->id_keranjang,$cr->id_barang])}}" class="btn btn-sm btn-primary"><i class="fa fa-minus"></i></a>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{$cr->qty}}">
                                <div class="input-group-btn">
                                    <a href="{{route('qtytambah',[$cr->id_keranjang,$cr->id_barang])}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">Rp.{{number_format($cr->total)}}</td>
                        <td class="align-middle"><a href="{{route('hapus-cart',$cr->id_keranjang)}}" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                    </tr>
                    @php
                        $sub_total += $cr->total;
                    @endphp
                    @endforeach
                    <tr>
                        <td colspan="3">Sub Total</td>
                        <td colspan="2" style="text-align: left">Rp. {{number_format($sub_total)}}</td>
                    </tr>

                </tbody>
            </table>
            <a href="{{route('penjualan')}}" class="btn btn-block btn-primary my-3 py-3">Checkout</a>
        </div>
    </div>
</div>
@endsection
