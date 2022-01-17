<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PULLAHTA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('new-assets/images/993688.png') }}">

        <!-- plugins -->
        <link href="{{ asset('new-assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('new-assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('new-assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('new-assets/libs/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('new-assets/libs/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 
        <link href="{{ asset('new-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('new-assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('new-assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('new-assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet" type="text/css" />
        <script src="{{ asset('admin/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('admin/js/sweetalert2.js') }}"></script>
    </head>

    <body>
        <!-- Pre-loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                    <div class="circle3"></div>
                </div>
            </div>
        </div>
        <!-- End Preloader-->

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="{{ route('dashboard') }}" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <img src="{{ asset('new-assets/images/993688.png') }}" alt="" height="24" />
                            <span class="d-inline h5 ml-1 text-logo">PULLAHTA</span>
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset('new-assets/images/993688.png') }}" alt="" height="24">
                        </span>
                    </a>

                    <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                        <li class="">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i data-feather="menu" class="menu-icon"></i>
                                <i data-feather="x" class="close-icon"></i>
                            </button>
                        </li>
                    </ul>

                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
                        <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <i data-feather="bell"></i>
                                <span class="noti-icon-badge total_notif" style="display: none"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title border-bottom">
                                    <h5 class="m-0 font-size-16">
                                        Notifikasi
                                    </h5>
                                </div>

                                <div class="slimscroll noti-scroll">
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                        <div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                        <div class="notify-icon">
                                            <img src="{{ asset('new-assets/images/users/avatar-1.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                        <div class="notify-icon">
                                            <img src="{{ asset('new-assets/images/users/avatar-2.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom active">
                                        <div class="notify-icon bg-success"><i class="uil uil-comment-message"></i> </div>
                                        <p class="notify-details">Jaclyn Brunswick commented on Dashboard<small class="text-muted">1
                                                min
                                                ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                        <div class="notify-icon bg-danger"><i class="uil uil-comment-message"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days
                                                ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="uil uil-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown notification-list align-self-center profile-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <div class="media user-profile ">
                                    <img src="{{ asset('new-assets/images/users/avatar-7.jpg') }}" alt="user-image" class="rounded-circle align-self-center" />
                                    <div class="media-body text-left">
                                        <h6 class="pro-user-name ml-2 my-0">
                                            <span>Shreyu N</span>
                                            <span class="pro-user-desc text-muted d-block mt-1">Administrator </span>
                                        </h6>
                                    </div>
                                    <span data-feather="chevron-down" class="ml-2 align-self-center"></span>
                                </div>
                            </a>
                            <div class="dropdown-menu profile-dropdown-items dropdown-menu-right">
                                <a href="{{ route('ubah.password') }}" class="dropdown-item notify-item">
                                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                    <span>Ubah Password</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="left-side-menu">
                <div class="media user-profile mt-2 mb-2">
                    <img src="{{ asset('new-assets/images/users/avatar-7.jpg') }}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
                    <img src="{{ asset('new-assets/images/users/avatar-7.jpg') }}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

                    <div class="media-body">
                        <h6 class="pro-user-name mt-0 mb-0">{{ Auth::user()->name }}</h6>
                        <span class="pro-user-desc">{{ Auth::user()->role }}</span>
                    </div>
                    <div class="dropdown align-self-center profile-dropdown-menu">
                        <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown">
                            <a href="{{ route('ubah.password') }}" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>Ubah Password</span>
                            </a>

                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">ANALYTICS</li>
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="menu-title">DATA</li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i data-feather="database"></i>
                                    <span> Data Informasi </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="true">
                                    <li>
                                        <a href="{{ route('rkpd') }}">RKPD</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lkpj') }}">LKPJ</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                @if(Auth::user()->username != 'datainformasi' && Auth::user()->username != 'bidang.ppm' && Auth::user()->username != 'bidang.psda' && Auth::user()->username != 'bidang.infrawil')
                                <a href="{{ route('sektoral') }}">
                                    <i data-feather="file-text"></i>
                                    <span> Data Sektoral </span>
                                </a>
                                @endif
                            </li>
                            <li>
                                @if(Auth::user()->username != 'datainformasi' && Auth::user()->username != 'bidang.ppm' && Auth::user()->username != 'bidang.psda' && Auth::user()->username != 'bidang.infrawil' && Auth::user()->role == 'super admin')
                                <a href="{{ route('opd.index') }}">
                                    <i data-feather="file-text"></i>
                                    <span> Perangkat Daerah </span>
                                </a>
                                @endif
                            </li>
                            @if(Auth::user()->role == 'super admin' && Auth::user()->username != 'datainformasi' && Auth::user()->username != 'bidang.ppm' && Auth::user()->username != 'bidang.psda' && Auth::user()->username != 'bidang.infrawil')
                            <li class="menu-title">USER</li>
                            <li>
                                <a href="{{ route('user.index') }}">
                                    <i data-feather="user"></i>
                                    <span> Manajemen User </span>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->role == 'super admin' && Auth::user()->username != 'datainformasi' && Auth::user()->username != 'bidang.ppm' && Auth::user()->username != 'bidang.psda' && Auth::user()->username != 'bidang.infrawil')
                            <li>
                                <a href="{{ route('api.index') }}">
                                    <i data-feather="settings" class="icon-dual"></i>
                                    <span> Manajemen API </span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="content-page">
                @yield('content')

            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php echo date("Y") ?> &copy; Diskomonfo Ciamis - v2.1</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i data-feather="x-circle"></i>
                </a>
                <h5 class="m-0">Customization</h5>
            </div>
    
            <div class="slimscroll-menu">
    
                <h5 class="font-size-16 pl-3 mt-4">Choose Variation</h5>
                <div class="p-3">
                    <h6>Default</h6>
                    <a href="index.html"><img src="{{ asset('new-assets/images/layouts/vertical.jpg') }}" alt="vertical" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Top Nav</h6>
                    <a href="layouts-horizontal.html"><img src="{{ asset('new-assets/images/layouts/horizontal.jpg') }}" alt="horizontal" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Dark Side Nav</h6>
                    <a href="layouts-dark-sidebar.html"><img src="{{ asset('new-assets/images/layouts/vertical-dark-sidebar.jpg') }}" alt="dark sidenav" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Condensed Side Nav</h6>
                    <a href="layouts-dark-sidebar.html"><img src="{{ asset('new-assets/images/layouts/vertical-condensed.jpg') }}" alt="condensed" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Fixed Width (Boxed)</h6>
                    <a href="layouts-boxed.html"><img src="{{ asset('new-assets/images/layouts/boxed.jpg') }}" alt="boxed"
                            class="img-thumbnail demo-img" /></a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('new-assets/js/vendor.min.js') }}"></script>

        <!-- optional plugins -->
        <script src="{{ asset('new-assets/libs/moment/moment.min.js') }}"></script>
        <script src="{{ asset('new-assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('new-assets/libs/flatpickr/flatpickr.min.js') }}"></script>

        <!-- page js -->
        <script src="{{ asset('new-assets/js/pages/dashboard.init.js') }}"></script>
        
        <script src="{{ asset('new-assets/libs/datatables/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('new-assets/libs/datatables/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('new-assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('new-assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        
        <script src="{{ asset('new-assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('new-assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('new-assets/libs/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('new-assets/libs/datatables/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('new-assets/libs/datatables/buttons.print.min.js') }}"></script>

        <script src="{{ asset('new-assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('new-assets/libs/datatables/dataTables.select.min.js') }}"></script>

        <!-- Datatables init -->
        <script src="{{ asset('new-assets/js/pages/datatables.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('new-assets/js/app.min.js') }}"></script>
        <script src="{{ asset('new-assets/libs/dropzone/dropzone.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
        <script>
            function loadlink(){
                $.ajax({
                    'url': '{{ route("notifikasi") }}',
                    'method': 'get',
                    'dataType': 'json'
                }).done(function(response){
                    if(response.length > 0){
                        $(".dropdown.notification-list").attr('data-original-title','anda memiliki ' + response.length + ' notifikasi')
                        $('.total_notif').css('display', '')
                        // console.log(response)
                        $('.slimscroll.noti-scroll').html(' ')
                        $.each(response, function(index, value){
                            if(value.jenis_file == 'rkpd'){
                                $('.slimscroll.noti-scroll').append('<a href="{{ route("rkpd.file") }}?id=' + value.opd_id + '&opd_file_id='+ value.id_notifikasi + '" class="dropdown-item notify-item border-bottom"><div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div> <p class="notify-details">(RKPD) <small class="text-muted"> Anda menerima file dari ' + value.name +'</small></p></a>')
                            }else if(value.jenis_file == 'lkpj'){
                                $('.slimscroll.noti-scroll').append('<a href="{{ route("lkpj.file") }}?id=' + value.opd_id + '&opd_file_id='+ value.id_notifikasi + '" class="dropdown-item notify-item border-bottom"><div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div><p class="notify-details">(LKPJ) <small class="text-muted">Anda menerima file dari ' + value.name +'</small></p></a>')
                            }else if(value.jenis_file == 'sektoral'){
                                $('.slimscroll.noti-scroll').append('<a href="{{ route("sektoral.file") }}?id=' + value.opd_id + '&opd_file_id='+ value.id_notifikasi + '" class="dropdown-item notify-item border-bottom"><div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div><p class="notify-details">(Sektoral) <small class="text-muted">Anda menerima file dari ' + value.name +'</small></p></a>')
                            }else{
                                $('.slimscroll.noti-scroll').append('<a href="{{ route("opd.file") }}?id=' + value.opd_id + '&opd_file_id='+ value.id_notifikasi + '" class="dropdown-item notify-item border-bottom"><div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div><p class="notify-details"><small class="text-muted">Anda menerima file dari ' + value.name +'</small></p></a>')
                            }
                            
                        })
                        return false
                    }else{
                        $('.slimscroll.noti-scroll').html('<p class="ml-3">anda tidak memiliki data baru</p>')
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