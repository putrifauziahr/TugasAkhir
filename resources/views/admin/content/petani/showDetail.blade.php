@extends('admin/layouts/admin')

@section('title', 'Admin | Detail Petani')

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
                                    <h4>Petani</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Petani</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Data Petani</h5>
                    </div>
                    <form class="form-horizontal form-material" action="" method="POST">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama">
                            @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email">
                            @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password">
                            @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label> Kelompok Tani</label>
                            <select name="id_poktan">
                                <option value="id_poktan"></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat">
                            @error('alamat')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Kontak</label>
                            <input name="kontak" type="password" class="form-control @error('kontak') is-invalid @enderror" placeholder="Masukan Kontak">
                            @error('kontak')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-info mx-auto mx-md-0 text-white"><i class="ti-pencil-alt"></i>Ubah</button>
                                <a type="button" class="btn btn-danger d-none d-md-inline-block text-white" href="{{route('admin/showPenyuluhan')}}">Back</a>
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