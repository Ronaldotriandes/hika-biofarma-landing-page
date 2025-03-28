<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Selecao Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
  <style>
   
  </style>
   @livewireScripts
    @livewireStyles
    @yield('third_party_scripts')

    @stack('page_scripts')

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/images/logo hika.png" alt="Hika Biofarma" style="width: 200px; max-height: 100px; object-fit: contain;">
        <!-- <h1 class="sitename">Selecao</h1> -->
        </a>
        <nav id="navmenu" class="navmenu">
            <ul style="justify-items: flex-end;">
            @if(Auth::check())
            <li class="header-dropdown-mob" style="padding-right:20px; padding-left:20px"><img src="/images/ilyas Foto 1.png" alt="User" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; margin-right: 5px;"></li>
            <li class="header-dropdown-mob"><a href="#">{{Auth::user()->nama_lengkap}}</a></li>
            <li  class="header-dropdown-mob"><a href="#" style="color:#55A9B6">{{Auth::user()->role}}</a></li>
            @endif
            <li><a href="#">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            @if(Auth::check())
                <li class="dropdown left-dropdown">
                    <a href="#"  class="" >
                    <div style="display:flex; align-items:center" >
                            <span style=" margin-right:10px">{{Auth::user()->nama_lengkap}}</span>
                            <img src="/images/ilyas Foto 1.png" alt="User" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px;">
                            <i class="bi bi-chevron-down toggle-dropdown ms-1"></i>
                        </div>
                        
                    </a>
                    <ul class="left-dropdown-menu">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="{{ route('logout') }}">Log Out</a></li>
                    </ul>
                </li>
            @else
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
            @endif
                <!-- Convert these items to a dropdown -->
            </ul>
  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>

    </div>
  </header>
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>


  <main class="main">