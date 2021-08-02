@extends('admin/layouts/admin')

@section('title', 'Admin | Defuzzyfikasi')

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
                                    <h4>Defuzzyfikasi</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Proses Data</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Defuzzyfikasi</a>
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
                <div class="card">
                    <div class="card-header">
                        <h5>Data Fuzzyfikasi</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="defuzzy-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Kategori</th>
                                        <th>Kegiatan Penyuluhan</th>
                                        <th>Persepsi</th>
                                        <th>Harapan</th>
                                        <th>GAP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($defuzzy as $f)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$f->pertanyaan}}</td>
                                        <td>{{$f->kategori}}</td>
                                        <td>{{$f->kegiatan}}</td>
                                        <td>{{$f->persepsi}}</td>
                                        <td>{{$f->harapan}}</td>
                                        <td>{{$f->persepsi - $f->harapan}}</td>

                                        <td>{{$tang}}</td>
                                        <td>{{$tangp}}</td>
                                        <td>{{ $tangp - $tang}}</td>
                                        <td>=================</td>

                                        <td>{{$reli}}</td>
                                        <td>{{$relip}}</td>
                                        <td>{{ $relip - $reli}}</td>
                                        <td>=================</td>

                                        <td>{{$respon}}</td>
                                        <td>{{$responp}}</td>
                                        <td>{{ $responp - $respon}}</td>
                                        <td>=================</td>

                                        <td>{{$assu}}</td>
                                        <td>{{$assup}}</td>
                                        <td>{{$assup - $assu}}</td>
                                        <td>=================</td>

                                        <td>{{$em}}</td>
                                        <td>{{$emp}}</td>
                                        <td>{{$emp - $em}}</td>
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

@push('js')
<script>
    $(document).ready(function() {
        $('#defuzzy-table').DataTable();
    });
</script>
@endpush