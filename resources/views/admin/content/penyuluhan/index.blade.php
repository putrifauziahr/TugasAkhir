@extends('admin/layouts/admin')

@section('title', 'Admin | Penyuluhan')

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
                        <h5>Data Penyuluhan</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($penyuluhan as $p)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$p->kegiatan}}</td>
                                        <td>{{$p->hari}}</td>
                                        <td>{{$p->tanggal}}</td>
                                        <td>
                                            <a href="/admin/viewDetailPenyuluhan/{{$p->id_penyuluhan}}" class="btn btn-success"><i class="ti-pencil-alt"></i>Detail</a>
                                            <a href="/admin/showDetailPenyuluhan/{{$p->id_penyuluhan}}" class="btn btn-info"><i class="ti-pencil-alt"></i>Edit</a>
                                            <a href="/admin/hapusPenyuluhan/{{$p->id_penyuluhan}}" class="btn btn-danger"><i class="ti-trash"></i>Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penyuluhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/tambahPenyuluhan" method="POST" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
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
                        <select name="hari" class="form-control @error('hari') is-invalid @enderror">
                            <option value="pilih">Pilih</option>
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
                        @error('deskripsi') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            @error('status') <div class="invalid-feedback">{{$message}}</div> @enderror
                            <option value="pilih">Pilih</option>
                            <option value="Belum Dilaksanakan">Belum Dilaksanakan</option>
                            <option value="Sedang Dilaksanakan">Sedang Dilaksanakan</option>
                            <option value="Sudah Dilaksanakan">Sudah Dilaksanakan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" type="file" class="form-control @error('image') is-invalid @enderror">
                        @error('image') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validasi_input(form) {
        if (form.kegiatan.value == "") {
            alert("Anda belum mengisi Kegiatan !");
            return (false);
        } else if (form.tempat.value == "") {
            alert("Anda belum mengisi Tempat !");
            return (false);
        } else if (form.hari.value == "pilih") {
            alert("Anda belum mengisi Hari !");
            return (false);
        } else if (form.tanggal.value == "") {
            alert("Anda belum mengisi Tanggal !");
            return (false);
        } else if (form.jam.value == "") {
            alert("Anda belum mengisi Jam !");
            return (false);
        } else if (form.pemateri.value == "") {
            alert("Anda belum mengisi Pemateri !");
            return (false);
        } else if (form.peserta.value == "") {
            alert("Anda belum mengisi Peserta!");
            return (false);
        } else if (form.deskripsi.value == "") {
            alert("Anda belum mengisi Deskripsi!");
            return (false);
        } else if (form.status.value == "pilih") {
            alert("Anda belum mengisi Status !");
            return (false);
        } else if (form.image.value == "") {
            alert("Anda belum mengisi Gambar!");
            return (false);
        }
        return (true);
    }
</script>
@endsection