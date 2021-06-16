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
                    <form class="form-horizontal form-material" action="/admin/postUpdatePenyuluhan/{{$penyuluhan->id_penyuluhan}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="col-md-3">Nama Kegiatan</label>
                            <div class="col-md-12">
                                <input name="kegiatan" type="text" class="form-control @error('kegiatan') is-invalid @enderror" value="{{$penyuluhan->kegiatan}}">
                                @error('kegiatan')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Tempat</label>
                            <div class="col-md-12">
                                <input name="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" value="{{$penyuluhan->tempat}}">
                                @error('tempat')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Hari</label>
                            <div class="col-md-12">
                                <select name="hari" class="form-control">
                                    <option>{{$penyuluhan->hari}}</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Tanggal</label>
                            <div class="col-md-12">
                                <input name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{$penyuluhan->tanggal}}">
                                @error('tanggal')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Waktu / Jam</label>
                            <div class="col-md-12">
                                <input name="jam" type="text" class="form-control @error('jam') is-invalid @enderror" value="{{$penyuluhan->jam}}">
                                @error('jam')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Pemateri</label>
                            <div class="col-md-12">
                                <input name="pemateri" type="text" class="form-control @error('pemateri') is-invalid @enderror" value="{{$penyuluhan->pemateri}}">
                                @error('pemateri')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Peserta</label>
                            <div class="col-md-12">
                                <input name="peserta" type="text" class="form-control @error('peserta') is-invalid @enderror" value="{{$penyuluhan->peserta}}">
                                @error('peserta')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Deskripsi</label>
                            <div class="col-md-12">
                                <input name="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{$penyuluhan->deskripsi}}">
                                @error('deskripsi')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Image</label>
                            <div class="col-md-5">
                                <input name="image" type="file" class="form-control @error('image') is-invalid @enderror">
                                <a href="{{ url('/berkasPenyuluhan/'. $penyuluhan->image) }}" data-fancybox="gal">
                                    <img src="{{ url('/berkasPenyuluhan/'. $penyuluhan->image) }}" alt="Image" class="img-fluid" style="height: 250px; width:250px">
                                    @error('image')<div class="invalid-feedback">{{$message}}</div> @enderror
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-info mx-auto mx-md-0 text-white"><i class="ti-pencil-alt"></i>Ubah</button>
                                <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('admin/showPenyuluhan')}}">Back</a>
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