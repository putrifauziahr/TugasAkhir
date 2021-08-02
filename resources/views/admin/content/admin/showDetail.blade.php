@extends('admin/layouts/admin')

@section('title', 'Admin | Detail Admin')

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
                                    <h4>Admin</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Data Master</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Data Admin</h5>
                    </div>
                    <form class="form-horizontal form-material" action="/admin/postUpdateAdmin/{{$admin->id_admin}}" method="POST">
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
                                <input class="form-control @error('username') is-invalid @enderror" value="{{$admin->username}}">
                                @error('username')<div class="invalid-feedback">{{$message}}</div> @enderror
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
                            <label class="col-md-3">Alamat</label>
                            <div class="col-md-12">
                                <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{$admin->alamat}}">
                                @error('alamat')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('admin/showAdmin')}}">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection