<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Data Set Opd Kabupaten Ciamis</title>
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icon.png') }}" />  
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-top-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/navbar-top-fixed.css') }}" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark p-3">
        <div class="row col-lg-12">
            <div class="col-md-6 d-flex justify-content-start">
                <img src="{{ asset('frontend/img/logo-diskominfo.png') }}" style="width: 3.5rem;">
                <a class="navbar-brand ml-3" href="javascript:void(0)"><p>DAFTAR PERMINTAAN DATA</p></a>
            </div>
            <div class="col-md-5 ml-1 mt-2">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-3">
                            <a href="{{ route('dataset') }}" class="text-white">
                                <i class="fa fa-building-o" aria-hidden="true"></i> Perangkat Daerah
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a href="{{ route('statistik') }}" class="text-white">
                                <i class="fa fa-bar-chart" aria-hidden="true"></i> Statistik
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="text-white"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main role="main" class="container" style="margin-top: 100px;">
        <div class="ml-0">
            <form class="form-inline mt-2 mt-md-0" action="{{ route('dataset') }}" method="get">
                <input class="form-control mr-sm-2 col-md-11" name="nama_opd" style="border-radius: 9px;padding:10px;" type="text" placeholder="cari perangkat daerah" aria-label="Cari perangkat daerah" value="{{ request()->nama_opd }}">
                <button class="btn my-2 my-sm-0" style="border-radius: 9px;padding:10px;" type="submit"><strong><i class="fa fa-search" aria-hidden="true"></i> Cari</strong></button>
            </form>
        </div>
        <!-- <div class="jumbotron"> -->
            <!-- <h1>Navbar example</h1> -->
            @yield('content')
        <!-- </div> -->
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    @stack('scripts')
  </body>
</html>
