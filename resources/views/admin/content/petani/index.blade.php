@extends('admin/layouts/admin')

@section('title', 'Admin | Petani')

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
                                    <h4>Data Petani</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Data Petani</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Session::has('alert'))
                <div class="alert alert-success">
                    {{ Session::get('alert') }}
                    @php
                    Session::forget('alert');
                    @endphp
                </div>
                @elseif(Session::get('alertF'))
                <div class="alert alert-danger">
                    {{ Session::get('alertF') }}
                    @php
                    Session::forget('alertF');
                    @endphp
                </div>
                @endif
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal"><i class="ti-plus"></i> Tambah Data</button>
                <div class="card">
                    <div class="card-header">
                        <h5>Data Petani</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="petani-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelompok Tani</th>
                                        <th>Komoditas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($petani as $ptn)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$ptn->nama}}</td>
                                        <td>{{$ptn->kelompok_tani}}</td>
                                        <td>{{$ptn->komoditas}}</td>
                                        <td>
                                            <a href="/admin/viewDetailPetani/{{$ptn->id_petani}}" class="btn btn-success"><i class="ti-zoom-in"></i>Detail</a>
                                            <a href="/admin/showDetailPetani/{{$ptn->id_petani}}" class="btn btn-info"><i class="ti-pencil-alt"></i>Edit</a>
                                            <a href="/admin/hapusPetani/{{$ptn->id_petani}}" class="btn btn-danger"><i class="ti-trash"></i>Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petani</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/tambahPetani" method="POST" onsubmit="return validasi_input(this)">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama">
                        @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username">
                        @error('username')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password">
                        @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Komoditas</label>
                        <select name="komoditas" class="form-control">
                            <option value="pilih">Pilih</option>
                            <option value="Holtikultura">Holtikultura</option>
                            <option value="Tanaman Pangan">Tanamanan Pangan</option>
                            <option value="Peternakan">Peternakan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kelompok Tani</label>
                        <select name="id_poktan" class="form-control">
                            <option value="pilih"> Pilih </option>
                            @foreach($poktan as $p)
                            <option value="{{ $p -> id_poktan}}">{{$p->kelompok_tani}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Desa</label>
                        <select name="kode_desa" class="form-control">
                            <option value="pilih"> Pilih </option>
                            @foreach($desa as $p)
                            <option value="{{ $p -> kode_desa}}">{{$p->desa}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
            </form>
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
        } else if (form.komoditas.value == "pilih") {
            alert("Anda belum mengisi Komoditas !");
            return (false);
        } else if (form.id_poktan.value == "pilih") {
            alert("Anda belum mengisi Kelompok Tani !");
            return (false);
        } else if (form.kode_desa.value == "pilih") {
            alert("Anda belum mengisi Desa !");
            return (false);
        }
        return (true);
    }
</script>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#petani-table').DataTable();
    });
</script>
@endpush