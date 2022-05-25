<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('/')}}backend/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="{{ asset('/')}}backend/css/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{ asset('/')}}backend/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="{{ asset('/')}}backend/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{ asset('/')}}backend/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{ asset('/')}}backend/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{ asset('/')}}backend/css/custom.css" />

      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">


      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">
      <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image">
                       <img src="{{ asset('/')}}gambar/bingkai-unik-10.jpg" sizes="30%">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{route('daftar')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                 <label>Nama</label>
                                    <input type="text" class="form-control form-control-user" name="nama_user" placeholder="Name">
                                </div>
                                <div class="form-group" >
                                 <label>Username</label>
                                    <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>No. Telpon</label>
                                    <input type="text" class="form-control form-control-user" name="no_tlpn" placeholder="No. Telpon">
                                </div>
                                <div class="form-group" >
                                    <label>Alamat</label>
                                    <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar_user" class="form-control" placeholder="Gambar">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                </div><br><br>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                        
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>

    </div>
      <!-- jQuery -->
      <script src="{{ asset('/')}}backend/js/jquery.min.js"></script>
      <script src="{{ asset('/')}}backend/js/popper.min.js"></script>
      <script src="{{ asset('/')}}backend/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="{{ asset('/')}}backend/js/animate.js"></script>
      <!-- select country -->
      <script src="{{ asset('/')}}backend/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="{{ asset('/')}}backend/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{ asset('/')}}backend/js/custom.js"></script>
   </body>
</html>

