  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>@yield('title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('petani/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('petani/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('petani/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('petani/css/owl.theme.default.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('petani/css/templatemo-style.css')}}">

  </head>

  <body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
      <div class="spinner">

        <span class="spinner-rotate"></span>

      </div>
    </section>


    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
      <div class="container">

        <div class="navbar-header">
          <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
          </button>

          <!-- lOGO TEXT HERE -->
          <a href="#" class="navbar-brand">BPP Kecamatan Gabuswetan</a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-nav-first">
            <li><a href="{{url('/')}}" class="smoothScroll">Beranda</a></li>
            <li><a href="{{route('beranda/showPenyuluhan')}}" class="smoothScroll">Penyuluhan</a></li>
            <li><a href="{{route('beranda/showTentang')}}" class="smoothScroll">Tentang Kami</a></li>
            <li><a href="{{route('beranda/showKontak')}}" class="smoothScroll">Kontak</a></li>
            <li><a href="{{route('petani/login')}}" class="smoothScroll">Login</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-home"></i>Gabuswetan</a></li>
          </ul>
        </div>

      </div>
    </section>


    <!-- HOME -->
    <section id="home">
      <div class="row">

        <div class="owl-carousel owl-theme home-slider">
          <div class="item item-first">
            <div class="caption">
              <div class="container">
                <div class="col-md-6 col-sm-12">
                  <h1>BPP Kecamatan Gabuswetan</h1>
                  <h3>Membantu Masyarakat dalam meningkatkan pengetahuan mengenai pertanian.</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="item item-second">
            <div class="caption">
              <div class="container">
                <div class="col-md-6 col-sm-12">
                  <h1>Membantu Masyarakat Mendapatkan Pupuk Subsidi</h1>
                  <h3>Menyalurkan pupuk subsidi dari pemerintah kepada masyarakat kecamatan Gabuswetan</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="item item-third">
            <div class="caption">
              <div class="container">
                <div class="col-md-6 col-sm-12">
                  <h1>Bekerja sama dengan berbagai industri pupuk</h1>
                  <h3>Memperkenalkan berbagai jenis pupuk untuk kebutuhan pertanian masyarakat </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    @yield('container')

    <!-- FOOTER -->
    <footer id="footer">
      <div class="container">
        <div class="row">

          <div class="col-md-4 col-sm-6">
            <div class="footer-info">
              <div class="section-title">
                <h2>Alamat</h2>
              </div>
              <address>
                <p>Desa Babakan Jaya, Kecamatan Gabuswetan</p>
              </address>

              <ul class="social-icon">
                <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                <li><a href="#" class="fa fa-twitter"></a></li>
                <li><a href="#" class="fa fa-instagram"></a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="footer-info">
              <div class="section-title">
                <h2>Kontak Info</h2>
              </div>
              <address>
                <p>085321041904</p>
                <p><a href="mailto:youremail.com">bpp.gabuswetan@gmail.com</a></p>
              </address>
            </div>
          </div>

          <div class="col-md-4 col-sm-12">
            <div class="footer-info newsletter-form">
              <div class="section-title">
                <h2>Hak Cipta</h2>
              </div>
              <div>
                <div class="copyright-text">
                  <p>Copyright &copy; 2018 Company</p>
                  <p>Design: <a rel="nofollow" href="http://templatemo.com" title="html5 templates" target="_parent">Template Mo</a></p>
                  <p>Distribution: <a href="https://themewagon.com/">ThemeWagon</a></p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </footer>


    <!-- SCRIPTS -->
    <script src="{{ asset('petani/js/jquery.js')}}">
    </script>
    <script src="{{ asset('petani/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('petani/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('petani/js/smoothscroll.js')}}"></script>
    <script src="{{ asset('petani/js/custom.js')}}"></script>

  </body>

  </html>