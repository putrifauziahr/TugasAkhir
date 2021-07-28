@extends('admin/layouts/admin')

@section('title', 'Admin | Kuisioner')

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
                        <h5>Data Kuisioner</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="kuisioner-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kuisioner</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($kuis as $k)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$k->pertanyaan}}</td>
                                        <td>{{$k->kategori}}</td>
                                        <td>
                                            <a href="/admin/viewDetailKuisioner/{{$k->id_kuis}}" class="btn btn-success"><i class="ti-pencil-alt"></i>Detail</a>
                                            <a href="/admin/showDetailKuisioner/{{$k->id_kuis}}" class="btn btn-info"><i class="ti-pencil-alt"></i>Edit</a>
                                            <a href="/admin/hapusKuisioner/{{$k->id_kuis}}" class="btn btn-danger"><i class="ti-trash"></i>Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kuisioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form onsubmit="return validasi_input(this)" action="/admin/tambahKuisioner" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="InputPertanyaan">Pertanyaan</label>
                        <input name="pertanyaan" type="text" class="form-control @error('pertanyaan') is-invalid @enderror" placeholder="Masukan Pertanyaan">
                        @error('pertanyaan')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori Pertanyaan</label>
                        <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                            @error('id_kategori') <div class="invalid-feedback">{{$message}}</div> @enderror
                            <option value="pilih">Pilih</option>
                            @foreach($kategori as $k)
                            <option value="{{ $k -> id_kategori}}">{{$k->kategori}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input hidden value="1" name="pilihanA">
                    <input hidden value="2" name="pilihanB">
                    <input hidden value="3" name="pilihanC">
                    <input hidden value="4" name="pilihanD">
                    <input hidden value="5" name="pilihanE">
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

@push('js')
<script>
    $(document).ready(function() {
        $('#kuisioner-table').DataTable();
    });
</script>
@endpush