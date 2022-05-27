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
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <h6>John David</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li><a href="{{route('home')}}"><i class="fa fa-table purple_color2"></i> <span>Dashboard</span></a></li>

                     <li><a href="{{route('brand')}}"><i class="fa fa-table orange_color2"></i> <span>Brand</span></a></li>

                     <li><a href="{{route('kategori')}}"><i class="fa fa-briefcase blue1_color"></i> <span>Kategori</span></a></li>

                     <li><a href="{{route('barang')}}"><i class="fa fa-paper-plane red_color"></i> <span>Barang</span></a></li>

                     <li><a href="{{route('slider')}}"><i class="fa fa-object-group green_color"></i> <span>Slider</span></a></li>

                     <li><a href="{{route('user')}}"><i class="fa fa-clone yellow_color"></i> <span>User</span></a></li>

                     <li><a href="{{route('member')}}"><i class="fa fa-object-group green_color"></i> <span>Member</span></a></li>

                     <li><a href="{{route('diskon')}}"><i class="fa fa-paper-plane red_color"></i> <span>Diskon</span></a></li>

                     <!-- <li><a href=""><i class="fa fa-diamond yellow_color"></i> <span>User</span></a></li> -->
                     
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user">John David</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.html">My Profile</a>
                                       <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item" href="help.html">Help</a>
                                       <form action="{{route('adminLogout')}}" method="post">
                                          @csrf

                                          <input type="submit" name="Logout" class="dropdown-item"><span></span> <i class="fa fa-sign-out"></i></input>
                                       </form>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     @yield('content')
                    
                     
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                           Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                        </p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
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
      <!-- owl carousel -->
      <script src="{{ asset('/')}}backend/js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="{{ asset('/')}}backend/js/Chart.min.js"></script>
      <script src="{{ asset('/')}}backend/js/Chart.bundle.min.js"></script>
      <script src="{{ asset('/')}}backend/js/utils.js"></script>
      <script src="vjs/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="{{ asset('/')}}js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{ asset('/')}}js/custom.js"></script>
      <script src="{{ asset('/')}}js/chart_custom_style1.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      @if (session('success') == true)
          <script>
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: '{{ session('success') }}',
                  showConfirmButton: false,
                  timer: 1500
              })
          </script>

      @endif
      @if (session('error') == true)
          <script>
              Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: '{{ session('error') }}',
                  showConfirmButton: false,
                  timer: 5000
              })
          </script>

      @endif
   </body>
</html>