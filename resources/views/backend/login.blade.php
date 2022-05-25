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
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     
                  </div>
                  <div class="login_form">
                     <form action="{{route('aksi_login')}}" method="post">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Email Address</label>
                              <input type="email" name="email" placeholder="E-mail" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" />
                           </div>
                           <div class="text-center">
                              <a class="small" href="forgot-password.html">Forgot Password?</a>
                           </div>
                           <div class="text-center">
                              <a class="small" href="{{route('register')}}">Create an Account!</a>
                           </div><br><br>
                           <div class="text-center">
                              <button class="main_bt">Sing In</button>
                           </div>
                        </fieldset>
                     </form>
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

