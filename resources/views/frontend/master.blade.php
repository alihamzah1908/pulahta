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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/navbar-top-fixed.css') }}" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark p-3">
        <div class='container'>
            <img src="{{ asset('frontend/img/logo-diskominfo.png') }}" style="width: 3rem;">
            <a class="navbar-brand ml-3" href="javascript:void(0)"><p>DAFTAR PERMINTAAN DATA</p></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Indikator
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item">Logout</a>
                    </div>
                    </li> -->
                </ul>
                <!-- <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0" type="submit"><strong>Search</strong></button>
                </form> -->
                <a href="{{ route('dataset') }}">
                    <button class="btn btn-link border text-white my-2 my-sm-0">Perangkat Daerah</button>
                </a>
                <a href="{{ route('statistik') }}" class="ml-3">
                    <button class="btn btn-link border text-white my-2 my-sm-0">Statistik</button>
                </a>
                <a class="ml-3" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button class="btn btn-link border text-white my-2 my-sm-0"> {{ __('Logout') }}</button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <main role="main" class="container" style="margin-top: 55px;">
        <div class="ml-0">
            <form class="form-inline mt-2 mt-md-0" action="{{ route('dataset') }}" method="get">
                <input class="form-control mr-sm-2 col-md-11" name="nama_opd" style="border-radius: 9px;padding:10px;" type="text" placeholder="cari perangkat daerah" aria-label="Cari perangkat daerah" value="{{ request()->nama_opd }}">
                <button class="btn my-2 my-sm-0" style="border-radius: 9px;padding:10px;" type="submit"><strong>Cari</strong></button>
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
