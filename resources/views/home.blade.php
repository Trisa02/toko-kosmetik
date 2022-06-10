@extends('template')
@section('content')
<!-- Navbar Start -->
<div class="row align-items-center py-3 px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
        <a href="" class="text-decoration-none">
            <h1 class="m-0 display-5 font-weight-semi-bold text-center">Toko Kosmetik</h1>
        </a>
    </div>
    <div class="col-lg-6 col-6 text-left">
        <form id="form" class="row g-3" method="get" action="" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8">
                <label for="inputNama" class="form-label">Nama Produk</label>
                <input type="text" name="tnama" id="tnama" required class="form-control">
            </div>
            <div class="col-md-4">
                <button type="button" onclick="cariBarang()" id="btnCari" class="btn btn-info" style="margin-top:32px; color:white;">
                    <i class="bi bi-search"></i>Cari
                </button>
            </div>
        </form>
    </div>
    <div class="col-lg-3 col-6 text-right">
        @auth
        <a href="{{route('cart')}}" class="btn border">
            <i class="fas fa-shopping-cart text-primary">Keranjang Saya</i>
            <span class="badge">0</span>
        </a>
        @endauth

    </div>
</div>
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">

        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Kategori Kosmetik</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical" style="overflow: scroll">
                <div class="navbar-nav w-100 " style="height: 400px;">
                    @foreach ($kategori as $ktr)
                    <a href="{{route('kategori.produk',$ktr->slug_kategori)}}"
                        class="nav-item nav-link">{{$ktr->nama_kategori}}</a>
                    @endforeach

                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="img/makeup1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Khusus Tanggal 21.05.2022
                                    Diskon 10 % </h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Untuk Semua Produk Make Up
                                </h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="img/bodycare1.jpeg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Diskon 5 % Khusus Tanggal
                                    22.05.2022</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Untuk Semua Produk Body Care
                                    Scarllet</h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->

<!-- Featured Start -->

<!-- Featured End -->


<!-- Categories Start -->

<!-- Categories End -->


<!-- Offer Start -->
<div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">Diskon Produk</span></h2>
</div>
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                <img src="img/micellar.png" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">Untuk semua produk Micellar Water Garnier</h5>
                    <h1 class="mb-1 font-weight-semi-bold">Diskon 10%</h1>
                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                <img src="img/masker.png" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">Masker Organik</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Diskon 5%</h1>
                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->

<!-- Products End -->


<!-- Subscribe Start -->

<!-- Subscribe End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Belanja Produk</span></h2>
    </div>
    <div class="row px-xl-5 pb-3" id="caribarang">
        @foreach ($barang as $brg)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{asset('gambar/'.$brg->gambar)}}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{$brg->nama_barang}}</h6>
                    <div class="d-flex justify-content-center">

                        <h6>Rp{{$brg->harga}}</h6>
                        <h6 class="text-muted ml-2"></h6>

                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{route('detail',$brg->slug_barang)}}" class="btn btn-sm text-dark p-0"><i
                            class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    {{-- <a href="{{route('cart')}}" class="btn btn-sm text-dark p-0"><i
                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a> --}}
                    <form action="{{route('simpan-cart')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_barang" value="{{$brg->id_barang}}" >
                        <input type="hidden" name="tanggal" id="tanggal" >
                        <input type="hidden" name="qty" id="qty" value="1" >
                        <input type="hidden" name="total" id="total">

                        <button  class="btn btn-sm text-dark p-0"><i
                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Products End -->




<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Belanja Brands</span></h2>
    </div>

    <div class="row px-xl-5">
        <div class="col">

            <div class="owl-carousel vendor-carousel">
                @foreach ($brands as $brd)
                <div class="vendor-item border p-4">
                    <a href="{{route('kategori.brands',$brd->nama_brand)}}"><img
                            src="{{asset('gambar/'.$brd->foto_brand)}}" alt=""></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>



</div>



<!-- Vendor End -->


<script>

    function cariBarang() {

        var nama = $('#tnama').val();


        if (nama == '') {
            alert('Masukan Nama Produk Terlebih Dahulu !')
        } else if (nama != '') {
            var namabarang = nama;
        } else {
            var namabarang = nama;
        }
        $('#caribarang').load("/cari-barang/" + namabarang)
    }

</script>


@endsection
