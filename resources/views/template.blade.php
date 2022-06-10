<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Toko Kosmetik</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('/')}}img/logo.png" rel="shortcut icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('/')}}lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('/')}}css/style.css" rel="stylesheet">


</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    @if(session('id_user') == null)
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="{{route('registert')}}">Daftar</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="{{route('logint')}}">Masuk</a>
                    @else
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="{{route('akun')}}">Akun {{session('id_user')}}</a>
                    <span class="text-muted px-2">|</span>

                    <form id="formLogout" method="post" action="{{route('logout')}}">
                    @csrf
                    <a onclick="logout()" href="#" class="text-dark">logout</a>
                    </form>

                    <script>
                        function logout()
                        {
                            $('#formLogout').submit();
                        }
                    </script>
                    @endif



                </div>
            </div>
            <div class="col-lg-6  text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!-- Topbar End -->




    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold text-center">Toko Kosmetik</h1>
                </a>
                {{-- <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p> --}}
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Jl. Dr. Sutomo No.146, Kubu Marapalam, Kec. Lubuk Begalung, Kota Padang, Sumatera Barat 25146</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>tokokosmetik@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Tentang Kami</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>About</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Karir</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Kebijakan Pribadi</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Persyaratan Penggunaan</a>

                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Layanan</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Delifery</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>FAQ</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Temukan Toko</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Hubungi Kami</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    Copyright. 2022. TokoKosmetik <br/>
                    <a href="https://themewagon.com" target="_blank">Persyaratan Kebijakan</a><br>
                    <a href="https://themewagon.com" target="_blank">Kebijakan Privasi</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <p>Pilih Pembayaran</p>
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}lib/easing/easing.min.js"></script>
    <script src="{{asset('/')}}lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('/')}}mail/jqBootstrapValidation.min.js"></script>
    <script src="{{asset('/')}}mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/')}}js/main.js"></script>
</body>

</html>
