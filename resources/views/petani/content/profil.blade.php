@extends('petani/layouts/petani')

@section('title', 'Profil Petani')

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
                                    <h4>Profil Petani</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Profil Petani</a>
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
                <div class="card">
                    <div class="card-header">
                        <h5>Data Petani</h5>
                    </div>
                    <form class="form-horizontal form-material" action="/petani/postUpdateProfil/{{$petani->id_petani}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="col-md-3">Nama</label>
                            <div class="col-md-12">
                                <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{$petani->nama}}">
                                @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Email</label>
                            <div class="col-md-12">
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{$petani->email}}">
                                @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Alamat</label>
                            <div class="col-md-12">
                                <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{$petani->alamat}}">
                                @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Kontak</label>
                            <div class="col-md-12">
                                <input name="kontak" type="text" class="form-control @error('kontak') is-invalid @enderror" value="{{$petani->kontak}}">
                                @error('kontak')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Image</label>
                            <div class="col-md-5">
                                <input name="image" type="file" class="form-control @error('image') is-invalid @enderror">
                                <a href="{{ url('/profilPetani/'. $petani->image) }}" data-fancybox="gal">
                                    <img src="{{ url('/profilPetani/'. $petani->image) }}" alt="Image" class="img-fluid" style="height: 250px; width:250px">
                                    @error('image')<div class="invalid-feedback">{{$message}}</div> @enderror
                                </a>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white">Update
                                    Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endsection