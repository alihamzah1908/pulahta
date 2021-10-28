<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icon.png') }}" />
        <title>Administrator Pulahta</title>
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light border-bottom">
            <a class="navbar-brand" href="{{ route('dashboard') }}">PULAHTA</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" /> -->
                    <!-- <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="notifikasi" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell" aria-hidden="true">
                            <span class="num text-danger font-weight-bold total_notif"></span>
                        </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right notifikasi" aria-labelledby="notifikasi">

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a> -->
                        <!-- <div class="dropdown-divider"></div> -->

                        <a href="{{ route('ubah.password') }}" class="nav-link text-dark font-italic">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp; Ubah Password
                        </a>
                        <a class="nav-link text-dark font-italic" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light border-right" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">ANALYTICS</div>
                            <a class="nav-link {{ request()->getName == 'admin' ? ' active' : '' }}" href="{{ route('dashboard') }}"
                                ><div class="sb-nav-link-icon"><i class="fa fa-tachometer" aria-hidden="true"></i>
                            </div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">DATA</div>
                            <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Kelola Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a> -->
                            <!-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> -->
                                    <a class="nav-link" href="{{ route('opd.index') }}"><i class="fa fa-building" aria-hidden="true"></i>&nbsp; Perangkat Daerah</a>
                                    <a class="nav-link" href="{{ route('user.index') }}"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Manajemen User</a>
                                    @if(Auth::user()->role == 'super admin')
                                    <a class="nav-link" href="{{ route('api.index') }}"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Manajemen API</a>
                                    @endif
                                    <!-- <a class="nav-link" href="{{ route('opd.file') }}">OPD File</a> -->
                                <!-- </nav>
                            </div> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Diskominfo Ciamis 2021</div>
                            <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('admin/js/sweetalert2.js') }}"></script>
        <script src="{{ asset('admin/js/jquery-3.4.1.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <!-- <script src="{{ asset('admin/js/Chart.min.js') }}" crossorigin="anonymous"></script> -->
        <script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/bootstrap.min.js') }}" crossorigin="anonymous"></script> -->
        <!-- <script src="{{ asset('admin/assets/demo/datatables-demo.js') }}"></script> -->
        <script>
            function loadlink(){
                $.ajax({
                    'url': '{{ route("notifikasi") }}',
                    'method': 'get',
                    'dataType': 'json'
                }).done(function(response){
                    $('.total_notif').html(response.length)
                    if(response.length > 0){
                        // console.log(response)
                        $('.notifikasi').html(' ')
                        $.each(response, function(index, value){
                            $('.notifikasi').append('<a href="{{ route("opd.file") }}?id=' + value.opd_id + '&opd_file_id='+ value.id_notifikasi + '"><p class="p-2">Anda menerima file dari ' + value.name +'</p></a>')
                        })
                        return false
                    }else{
                        $('.notifikasi').html(' ')
                    }
                })
            }
            loadlink();
            setInterval(function(){
                loadlink()
            }, 10000);
        </script>
        @stack('scripts')
    </body>
</html>
