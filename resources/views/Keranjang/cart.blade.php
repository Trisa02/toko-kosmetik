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
<div class="container-fluid pt-5">
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
                        <td class="align-middle">{{$cr->harga}}</td>
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
                        <td class="align-middle">Rp.{{$cr->total}}</td>
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
        </div>
        <div class="col-lg-4">
            {{-- <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form> --}}
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Pilih Pengiriman</h6>
                    </div>
                    {{-- <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Diskon</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div> --}}
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total Pembayaran</h5>
                        <h5 class="font-weight-bold">$160</h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
