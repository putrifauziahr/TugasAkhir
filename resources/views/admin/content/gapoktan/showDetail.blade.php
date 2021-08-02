@extends('admin/layouts/admin')

@section('title', 'Admin | Detail Gapoktan')

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
                                    <h4>Gapoktan</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Gapoktan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Edit Data Gapoktan</h5>
                    </div>
                    <form class="form-horizontal form-material" action="/admin/postUpdateGapoktan/{{$gapoktan->id_gapoktan}}" method="POST" onsubmit="return validasi_input(this)">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-md-3">Gapoktan</label>
                            <div class="col-md-3">
                                <input type="text" name="gapoktan" class="form-control @error('gapoktan') is-invalid @enderror" value="{{ $gapoktan->gapoktan}}">
                                @error('gapoktan')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <button class="btn btn-info mx-auto mx-md-0 text-white"><i class="ti-pencil-alt"></i>Ubah</button>
                                <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('admin/showGapoktan')}}">Kembali</a>
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
        if (form.gapoktan.value == "") {
            alert("Anda belum mengisi Gapoktan !");
            return (false);
        }
        return (true);
    }
</script>
@endsection