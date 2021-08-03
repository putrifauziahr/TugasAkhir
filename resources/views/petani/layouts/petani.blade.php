<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('/images/logo.png')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css')}}">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="{{route('petani/dashboard')}}">
                            <span style="padding-left: 40px; font-weight:bold;">Aplikasi Analisis </span>
                            <br>
                            <span style="padding-left: 40px; font-weight:bold;">Kepuasan Petani</span>
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>

                            <li>
                                <span id="tanggalwaktu"></span>
                                <script>
                                    var tw = new Date();
                                    if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
                                    else(a = tw.getTime());
                                    tw.setTime(a);
                                    var tahun = tw.getFullYear();
                                    var hari = tw.getDay();
                                    var bulan = tw.getMonth();
                                    var tanggal = tw.getDate();
                                    var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
                                    var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
                                    document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun + " Jam " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10) ? "0" : "") + tw.getMinutes() + (" W.I.B ");
                                </script>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    @if(Session::get('image') != null)
                                    <img src="{{ url('/profilPetani/'. Session::get('image'))}}" class="img-circle" height="40px" width="40px">
                                    @else
                                    <img src="{{url('images/userr.png')}}">
                                    @endif
                                    <span>Hi, {{Session::get('nama')}}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="{{url('petani/showProfil/'.Session::get('id_petani'))}}">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('logoutPetani')}}">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    @if(Session::get('image') != null)
                                    <img src="{{ url('/profilPetani/'. Session::get('image'))}}" class="img-circle" height="40px" width="40px">
                                    @else
                                    <img src="{{url('images/userr.png')}}">
                                    @endif
                                    <div class="user-details">
                                        <span>{{Session::get('username')}}</span>
                                        <span>Petani</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="/petani/dashboard">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b></b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('petani/showKuisioner')}}">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Kuisioner</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="map-google.html">
                                        <span class="pcoded-micon"><i class="icofont icofont-chart-bar-graph"></i><b></b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Hasil</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('petani/showRiwayat/'.Session::get('id_petani'))}}">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Riwayat Kuisioner</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    @yield('container')
                </div>
            </div>
        </div>
    </div>
</body>


<script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('assets/js/modernizr/modernizr.js')}}"></script>
<!-- am chart -->
<script src="{{ asset('assets/pages/widget/amchart/amcharts.min.js')}}"></script>
<script src="{{ asset('assets/pages/widget/amchart/serial.min.js')}}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{ asset('assets/pages/todo/todo.js')}}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.js')}}"></script>
<script type="text/javascript " src="{{ asset('assets/js/SmoothScroll.js')}}"></script>
<script src="{{ asset('assets/js/pcoded.min.js')}}"></script>
<script src="{{ asset('assets/js/demo-12.js')}}"></script>
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script>
    var $window = $(window);
    var nav = $('.fixed-button');
    $window.scroll(function() {
        if ($window.scrollTop() >= 200) {
            nav.addClass('active');
        } else {
            nav.removeClass('active');
        }
    });
</script>
</body>

</html>