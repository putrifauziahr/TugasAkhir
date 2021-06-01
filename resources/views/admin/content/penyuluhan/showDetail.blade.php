@extends('admin/layouts/admin')

@section('title', 'Admin | Detail Penyuluhan')

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
                                    <h4>Penyuluhan</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Penyuluhan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Data Penyuluhan</h5>
                    </div>
                    <form class="form-horizontal form-material" action="" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input name="kegiatan" type="text" class="form-control @error('kegiatan') is-invalid @enderror" placeholder="Masukan Kegiatan">
                            @error('kegiatan')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Tempat</label>
                            <input name="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" placeholder="Masukan Tempat">
                            @error('tempat')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Hari</label>
                            <select name="hari">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Masukan Tanggal">
                            @error('tanggal')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Waktu / Jam</label>
                            <input name="jam" type="text" class="form-control @error('jam') is-invalid @enderror" placeholder="Masukan Waktu">
                            @error('jam')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Pemateri</label>
                            <input name="pemateri" type="text" class="form-control @error('pemateri') is-invalid @enderror" placeholder="Masukan Pemateri">
                            @error('pemateri')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Peserta</label>
                            <input name="peserta" type="text" class="form-control @error('peserta') is-invalid @enderror" placeholder="Masukan Peserta">
                            @error('peserta')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input name="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukan Deskripsi">
                            @error('deskripsi')<div class="invalid-feedback">{{$message}}</div> @enderror
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