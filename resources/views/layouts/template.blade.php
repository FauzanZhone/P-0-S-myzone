<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('title')</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('template/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('template/demo/demo.css') }}" rel="stylesheet" />
  <script src="{{ asset('template/js/core/jquery.min.js') }}"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('template/img/bl.jpg') }}">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
           Online Shop
          <!-- <div class="logo-image-big">
            <img src="template/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">

        <!-- MENU -->

        <ul class="nav">
          <li class="active ">
            <a href="{{ route('dashboard') }}"> 
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @role('admin')
          <li>
            <a href="{{ url('penggunas') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>PENGGUNA</p>
            </a>
          </li>
          <li>
            <a href="{{ route('mereks.index') }}">
              <i class="nc-icon nc-tag-content"></i>
              <p>MEREK</p>
            </a>
          </li>
          <li>
            <a href="{{ url('distributors') }}">
              <i class="nc-icon nc-delivery-fast"></i>
              <p>DISTRIBUTOR</p>
            </a>
          </li>
          <li>
            <a href="{{  url('barangs') }}">
              <i class="nc-icon nc-app"></i>
              <p>BARANG</p>
            </a>
          </li>
          <li>
            <a href="{{  url('items') }}">
              <i class="nc-icon nc-cart-simple"></i>
              <p>CART</p>
            </a> 
          </li>
          <li>
            <a href="{{ url('transaksis') }}">
              <i class="nc-icon nc-money-coins"></i>
                <p>TRANSAKSI</p>
            </a>
          </li>
          @endrole

          @role('kasir')
          <li>
            <a href="{{  url('items') }}">
              <i class="nc-icon nc-cart-simple"></i>
              <p>Keranjang</p>
            </a> 
          </li>
          <li>
            <a href="{{ url('transaksis') }}">
              <i class="nc-icon nc-money-coins"></i>
                <p>TRANSAKSI</p>
            </a>
          </li>
          @endrole
          <li>
            <a href="{{ url('login') }}">
              <i class="nc-icon nc-spaceship"></i>
              <p>LOGOUT</p>
            </a>
          </li>
          {{-- <li>
            <a href="./typography.html">
              <i class="nc-icon nc-caps-small"></i>
              <p>Typography</p>
            </a>
          </li> --}}
          <li class="active-pro">
            <a href="./upgrade.html">
              {{-- <i class="nc-icon nc-spaceship"></i> --}}
              <p></p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel vh-100">
      <!-- Navbar -->
      {{-- <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent"> --}}
       
        <div class="container-fluid">
          <div class="pull-right">
        {{-- <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit">Logout</button>
        </form> --}}
          <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <form>
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Search...">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="nc-icon nc-zoom-split"></i>
                    </div>
                  </div>
                </div>
              </form> 
            <ul class="navbar-nav">
              {{-- <li class="nav-item">
                {{-- <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a> --}}
              {{-- </li> --}}
              {{-- <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> --}}
              <li class="nav-item">
                {{-- <a class="nav-link btn-rotate" href="javascript:;"> --}}
                  {{-- <i class="nc-icon nc-settings-gear-65"></i> --}}
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!-- CONTENT -->
        @yield('content')
      <!-- END CONTENT -->
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank"></a></li>
                {{-- <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li> --}}
                {{-- <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li> --}}
              </ul>
            </nav>
            {{-- <div class="credits ml-auto"> --}}
              {{-- <span class="copyright"> --}}
                <script>
                  // document.write(new Date().getFullYear())
                </script></i>
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('template/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('template/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('template/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('template/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('template/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript') }}"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('template/demo/demo.js') }}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <!-- Code Script MODAL -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
  <!-- AKHIR MODAL -->
</body>

</html>
