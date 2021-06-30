<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('petani/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- slick slider -->
  <link rel="stylesheet" href="{{ asset('petani/plugins/slick/slick.css')}}">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="{{ asset('petani/plugins/themify-icons/themify-icons.css')}}">
  <!-- animation css -->
  <link rel="stylesheet" href="{{ asset('petani/plugins/animate/animate.css')}}">
  <!-- aos -->
  <link rel="stylesheet" href="{{ asset('petani/plugins/aos/aos.css')}}">
  <!-- venobox popup -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css')}}">

  <!-- Main Stylesheet -->
  <link href="{{ asset('petani/css/style.css')}}" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="{{ asset('petani/images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('petani/images/favicon.png')}}" type="image/x-icon">

</head>

<body>
  <!-- preloader start -->
  <div class="preloader">
    <img src="{{ asset('petani/images/preloader.gif')}}" alt="preloader">
  </div>
  <!-- preloader end -->

  <!-- header -->
  <header class="fixed-top header">
    <div class="top-header py-2 bg-white">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-4 text-center text-lg-left">
            <a class="text-color mr-3" href="callto:+443003030266"><strong>CALL</strong> +44 300 303 0266</a>
            <ul class="list-inline d-inline">
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-8 text-center text-lg-right">
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#">
                  Balai Penyuluhan Pertanian Kecamatan Gabuswetan
                </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- navbar -->
    <div class="navigation w-100">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
          <a class="navbar-brand" href="index.html"><img src="{{ asset('petani/images/logo.png')}}" alt="logo"></a>
          <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto text-center">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('beranda/showPenyuluhan')}}">Penyuluhan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('beranda/showTentang')}}">Tentang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('beranda/showKontak')}}">Kontak</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('petani/login')}}">Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- /header -->

  <!-- page title -->
  <section class="page-title-section overlay" data-background="{{ asset('petani/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Beranda</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
          </ul>
          <p class="text-lighten">
            Balai Penyuluhan Pertanian Kecamatan Gabuswetan, merupakan tempat untuk kegiatan untuk masyarakat kecamatan Gabuswetan
            mendapatkan pengetahuan mengenai pertanian.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->


  @yield('container')


  <!-- footer -->
  <footer>
    <!-- footer content -->
    <div class="footer bg-footer section border-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-8 mb-5 mb-lg-0">
            <!-- logo -->
            <a class="logo-footer" href="index.html"><img class="img-fluid mb-4" src="{{ asset('petani/images/logo.png')}}" alt="logo"></a>
            <ul class="list-unstyled">
              <li class="mb-2">23621 15 Mile Rd #C104, Clinton MI, 48035, New York, USA</li>
              <li class="mb-2">+1 (2) 345 6789</li>
              <li class="mb-2">+1 (2) 345 6789</li>
              <li class="mb-2">contact@yourdomain.com</li>
            </ul>
          </div>
          <!-- company -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">COMPANY</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="about.html">About Us</a></li>
              <li class="mb-3"><a class="text-color" href="teacher.html">Our Teacher</a></li>
              <li class="mb-3"><a class="text-color" href="contact.html">Contact</a></li>
              <li class="mb-3"><a class="text-color" href="blog.html">Blog</a></li>
            </ul>
          </div>
          <!-- links -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">LINKS</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="courses.html">Courses</a></li>
              <li class="mb-3"><a class="text-color" href="event.html">Events</a></li>
              <li class="mb-3"><a class="text-color" href="gallary.html">Gallary</a></li>
              <li class="mb-3"><a class="text-color" href="faqs.html">FAQs</a></li>
            </ul>
          </div>
          <!-- support -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">SUPPORT</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="#">Forums</a></li>
              <li class="mb-3"><a class="text-color" href="#">Documentation</a></li>
              <li class="mb-3"><a class="text-color" href="#">Language</a></li>
              <li class="mb-3"><a class="text-color" href="#">Release Status</a></li>
            </ul>
          </div>
          <!-- support -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">RECOMMEND</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="#">WordPress</a></li>
              <li class="mb-3"><a class="text-color" href="#">LearnPress</a></li>
              <li class="mb-3"><a class="text-color" href="#">WooCommerce</a></li>
              <li class="mb-3"><a class="text-color" href="#">bbPress</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- copyright -->
    <div class="copyright py-4 bg-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 text-sm-left text-center">
            <p class="mb-0">Copyright
              <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
              </script>
              © themefisher
            </p>
          </div>
          <div class="col-sm-5 text-sm-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-facebook text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-twitter-alt text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-linkedin text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-instagram text-primary"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->

  <!-- jQuery -->
  <script src="{{ asset('petani/plugins/jQuery/jquery.min.js')}}"></script>
  <!-- Bootstrap JS -->
  <script src="{{ asset('petani/plugins/bootstrap/bootstrap.min.js')}}"></script>
  <!-- slick slider -->
  <script src="{{ asset('petani/plugins/slick/slick.min.js')}}"></script>
  <!-- aos -->
  <script src="{{ asset('petani/plugins/aos/aos.js')}}"></script>
  <!-- venobox popup -->
  <script src="{{ asset('petani/plugins/venobox/venobox.min.js')}}"></script>
  <!-- filter -->
  <script src="{{ asset('petani/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
  <script src="{{ asset('petani/plugins/google-map/gmap.js')}}"></script>

  <!-- Main Script -->
  <script src="{{ asset('petani/js/script.js')}}"></script>

</body>

</html>