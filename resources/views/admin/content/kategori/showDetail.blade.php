@extends('admin/layouts/admin')

@section('title', 'Admin | Detail Kategori Pertanyaan')

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
                                    <h4>Kategori Pertanyaan</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Kategori Pertanyaan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Data Kategori Pertanyaan</h5>
                    </div>
                    <form class="form-horizontal form-material" action="/admin/postUpdateKategori/{{$kategori->id_kategori}}" method="POST" onsubmit="return validasi_input(this)">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-md-3">Judul</label>
                            <div class="col-md-3">
                                <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ $kategori->kategori}}">
                                @error('kategori')<div class="invalid-feedback">{{$message}}</div> @enderror
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
        if (form.kategori.value == "") {
            alert("Anda belum mengisi Kategori !");
            return (false);
        }
        return (true);
    }
</script>
@endsection