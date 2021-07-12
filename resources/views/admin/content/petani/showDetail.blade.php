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
                    <form class="form-horizontal form-material" action="/admin/postUpdatePetani/{{$petani->id_petani}}" method="POST" onsubmit="return validasi_input(this)">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="col-md-3">Nama</label>
                            <div class="col-md-12">
                                <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{$petani->nama}}">
                                @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Username</label>
                            <div class="col-md-12">
                                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{$petani->username}}">
                                @error('username')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Password</label>
                            <div class="col-md-12">
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{$petani->password}}">
                                @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3"> Kelompok Tani</label>
                            <div class="col-md-12">
                                <select name="id_poktan" class="form-control">
                                    <option value="pilih">Pilih</option>
                                    @foreach($poktan as $p)
                                    <option value="{{ $p -> id_poktan}}">{{$p->kelompok_tani}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-info mx-auto mx-md-0 text-white"><i class="ti-pencil-alt"></i>Ubah</button>
                                <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('admin/showPetani')}}">Back</a>
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
        if (form.nama.value == "") {
            alert("Anda belum mengisi Nama !");
            return (false);
        } else if (form.username.value == "") {
            alert("Anda belum mengisi Username !");
            return (false);
        } else if (form.password.value == "") {
            alert("Anda belum mengisi Password !");
            return (false);
        } else if (form.id_poktan.value == "pilih") {
            alert("Anda belum mengisi Kelompok Tani !");
            return (false);
        }
        return (true);
    }
</script>
@endsection