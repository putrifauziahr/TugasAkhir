@extends('admin/layouts/admin')

@section('title', 'Admin | Hasil Kuisioner')

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
                                    <h4>Hasil Kuisioner</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Hasil Kuisioner</a>
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
                <form action="/admin/tambahFuzzyfikasi" method="POST">
                    {{csrf_field()}}
                    @foreach($hasil as $a)
                    <input type="text" name="id_hasil" value="{{$a->id_hasil}}" hidden>
                    @endforeach
                    <input type="text" name="batasBawahHarapan" hidden>
                    <input type="text" name="batasTengahHarapan" hidden>
                    <input type="text" name="batasAtasHarapan" hidden>
                    <input type="text" name="batasBawahPersepsi" hidden>
                    <input type="text" name="batasTengahPersepsi" hidden>
                    <input type="text" name="batasAtasPersepsi" hidden>
                    <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#exampleModal"><i class="ti-plus"></i>Proses Fuzzyfikasi</button>

                </form>
                <div class="card">
                    <div class="card-header">
                        <h5>Data Hasil Kuisioner</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kegiatan Penyuluhan</th>
                                        <th>ID Petani</th>
                                        <th>ID Kuisioner</th>
                                        <th>Jawaban Harapan</th>
                                        <th>Jawaban Persepsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($hasil as $a)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <th>{{$a->id_penyuluhan}}</th>
                                        <td>{{$a->id_petani}}</td>
                                        <th>{{$a->id_kuis}}</th>
                                        <td>{{$a->jawabanhar}}</td>
                                        <td>{{$a->jawabanper}}</td>
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
@endsection