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
                        <h5>Edit Data Kuisioner</h5>
                    </div>
                    <form onsubmit="return validasi_input(this)" class="form-horizontal form-material" action="/admin/postUpdateKuisioner/{{$kuis->id_kuis}}" method="POST">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="col-md-3">Pertanyaan</label>
                            <div class="col-md-12">
                                <input name="pertanyaan" type="text" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $kuis->pertanyaan}}">
                                @error('pertanyaan')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Kategori Pertanyaan</label>
                            <div class="col-md-12">
                                <select name="id_kategori" class="form-control">
                                    <option value="{{ $kuis->id_kategori}}">{{ $kuis->Kategoris->kategori}}</option>
                                    @foreach($kategori as $k)
                                    <option value="{{ $k -> id_kategori}}">{{$k->kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-info mx-auto mx-md-0 text-white"><i class="ti-pencil-alt"></i>Ubah</button>
                                <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('admin/showKuisioner')}}">Back</a>
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
        if (form.pertanyaan.value == "") {
            alert("Anda belum mengisi Pertanyaan !");
            return (false);
        } else if (form.id_kategori.value == "pilih") {
            alert("Anda belum memilih Kategori!");
            return (false);
        }
        return (true);
    }
</script>
@endsection