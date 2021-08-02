@extends('admin/layouts/admin')

@section('title', 'Admin | Detail Kuisioner')

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
                                    <h4>Kuisioner</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Kuisioner</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Data Kuisioner</h5>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Pertanyaan</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $kuis->pertanyaan}}">
                            @error('pertanyaan')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3">Kategori Pertanyaan</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $kuis->Kategoris->kategori}}">
                            @error('pertanyaan')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3">Sangat Kurang</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $kuis->pilihanA}}">
                            @error('pertanyaan')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3">Kurang Puas</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $kuis->pilihanB}}">
                            @error('pertanyaan')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3">Cukup Puas</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $kuis->pilihanC}}">
                            @error('pertanyaan')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3">Puas</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $kuis->pilihanD}}">
                            @error('pertanyaan')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3">Sangat Puas</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $kuis->pilihanE}}">
                            @error('pertanyaan')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('admin/showKuisioner')}}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection