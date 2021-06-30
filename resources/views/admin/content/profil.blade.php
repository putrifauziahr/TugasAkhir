@extends('admin/layouts/admin')

@section('title', 'Profil Admin')

@section ('container')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Profil Admin</h4>
                                    <span>Dashboard Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Profil Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
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


                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <div class="card-header" style="color: black; font-size:20px; text-align:center;">
                                    <i class="fa fa-user"></i>
                                    Profil Admin
                                </div>
                                <center class="m-t-10">
                                    <a href="{{ url('/profilAdmin/'. $admin->image) }}" data-fancybox="gal">
                                        @if($admin->image != null)
                                        <img src="{{ url('/profilAdmin/'. $admin->image) }}" alt="Image" class="img-circle" style="height: 160px; width:160px">
                                        @else
                                        <img src="{{ url('images/user-dummy.png') }}" alt="Image" class="img-circle" style="height: 180px; width:180px">
                                        @endif
                                        <br>
                                        <br>
                                    </a>
                                </center>
                                <form action="/admin/updateFotoProfil/{{$admin->id_admin}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group alert-up-pd">
                                        <div class="form-group">
                                            <input name="image" type="file" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 d-flex">
                                                <button class="btn btn-info mx-auto mx-md-0 text-white">Update
                                                    Foto Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="/admin/postUpdateProfil/{{$admin->id_admin}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-group">
                                        <label class="col-md-3">Nama</label>
                                        <div class="col-md-12">
                                            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{$admin->nama}}">
                                            @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3">Username</label>
                                        <div class="col-md-12">
                                            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{$admin->username}}">
                                            @error('username')<div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3">Alamat</label>
                                        <div class="col-md-12">
                                            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{$admin->alamat}}">
                                            @error('alamat')<div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3">Kontak</label>
                                        <div class="col-md-12">
                                            <input name="kontak" type="text" class="form-control @error('kontak') is-invalid @enderror" value="{{$admin->kontak}}">
                                            @error('kontak')<div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-info mx-auto mx-md-0 text-white">Update Profile</button>
                                            <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="/admin/dashboard">Back</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection