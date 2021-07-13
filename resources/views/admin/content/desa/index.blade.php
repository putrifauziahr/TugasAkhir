@extends('admin/layouts/admin')

@section('title', 'Admin | Desa')

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
                        <h5>Data Kategori Pertanyaan</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Desa</th>
                                        <th>Nama Desa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($desa as $d)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$d->kode_desa}}</td>
                                        <td>{{$d->desa}}</td>
                                        <td>
                                            <a href="/admin/showDetailDesa/{{$d->kode_desa}}" class="btn btn-info"><i class="ti-pencil-alt"></i>Edit</a>
                                            <a href="/admin/hapusDesa/{{$d->kode_desa}}" class="btn btn-danger"><i class="ti-trash"></i>Hapus</a>
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
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/tambahDesa" method="POST" onsubmit="return validasi_input(this)">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="InputNamaAktivitas">Kode Desa</label>
                        <input name="kode_desa" type="numeric" class="form-control @error('kode_desa') is-invalid @enderror" placeholder="Masukan Kode Desa">
                        @error('kode_desa')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="InputNamaAktivitas">Nama Desa</label>
                        <input name="desa" type="text" class="form-control @error('desa') is-invalid @enderror" placeholder="Masukan Nama Desa">
                        @error('desa')<div class="invalid-feedback">{{$message}}</div> @enderror
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
        if (form.kode_desa.value == "") {
            alert("Anda belum mengisi Kode Desa !");
            return (false);
        } else if (form.desa.value == "") {
            alert("Anda belum mengisi Nama Desa !");
            return (false);
        }
        return (true);
    }
</script>
@endsection