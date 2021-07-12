@extends('admin/layouts/admin')

@section('title', 'Admin | Detail Desa')

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
                                    <h4>Desa</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Desa</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Data Desa</h5>
                    </div>
                    <form class="form-horizontal form-material" action="/admin/postUpdateDesa/{{$desa->kode_desa}}" method="POST" onsubmit="return validasi_input(this)">
                        {{csrf_field()}}


                        <div class="form-group">
                            <label class="col-md-3">Kode Desa</label>
                            <div class="col-md-3">
                                <input type="text" name="kode_desa" class="form-control @error('kode_desa') is-invalid @enderror" value="{{ $desa->kode_desa}}">
                                @error('kode_desa')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Nama Desa</label>
                            <div class="col-md-3">
                                <input type="text" name="nama_desa" class="form-control @error('nama_desa') is-invalid @enderror" value="{{ $desa->nama_desa}}">
                                @error('nama_desa')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-info mx-auto mx-md-0 text-white"><i class="ti-pencil-alt"></i>Ubah</button>
                                <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('admin/showKategori')}}">Back</a>
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
<script type="text/javascript">
    function validasi_input(form) {
        if (form.kode_desa.value == "") {
            alert("Anda belum mengisi Kode Desa !");
            return (false);
        } else if (form.nama_desa.value == "pilih") {
            alert("Anda belum memilih Nama Desa !");
            return (false);
        }
        return (true);
    }
</script>
@endsection