<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('/images/logo.png')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
</head>

<body class="fix-menu">
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

    <!-- Pre-loader end -->
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form action="/admin/login" class="md-float-material" method="POST">
                            {{csrf_field()}}
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Masuk</h3>
                                    </div>
                                </div>
                                @if(\Session::has('alert'))
                                <div class="alert alert-danger">
                                    <div>{{Session::get('alert')}}</div>
                                </div>
                                @endif
                                @if(\Session::has('alert-success'))
                                <div class="alert alert-success">
                                    <div>{{Session::get('alert-success')}}</div>
                                </div>
                                @endif

                                <hr />
                                <div class="input-group">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Masukan Username">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $alert }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $alert}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Masuk</button>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                        <p class="text-inverse text-left"><b>Terimakasih</b></p>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin/forgotPassword')}}">Lupa Password? Klik di sini </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>


    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('assets/js/modernizr/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/modernizr/css-scrollbars.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/common-pages.js')}}"></script>
</body>

</html>