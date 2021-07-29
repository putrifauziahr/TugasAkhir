@extends('admin/layouts/admin')

@section('title', 'Admin | Fuzzyfikasi')

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
                                    <h4>Fuzzyfikasi</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Fuzzyfikasi</a>
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
                <form action="/admin/tambahDefuzzyfikasi" method="POST">
                    {{csrf_field()}}
                    @foreach($fuzzy as $a)
                    <input type="text" name="id_fuzzy[]" value="{{$a->id_fuzzy}}" hidden>
                    <input type="text" name="harapan[]" value="{{($a->batasBawahHarapan +  $a->batasTengahHarapan + $a->batasAtasHarapan) / 3}}" hidden>
                    <input type="text" name="persepsi[]" value="{{($a->batasBawahPersepsi +  $a->batasTengahPersepsi + $a->batasAtasPersepsi) / 3}}" hidden>
                    @endforeach
                    <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#exampleModal"><i class="ti-plus"></i>Proses Defuzzyfikasi</button>
                </form>
                <div class="card">
                    <div class="card-header">
                        <h5>Data Fuzzyfikasi</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="fuzzy-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Batas Bawah Persepsi</th>
                                        <th>Batas Tengah Persepsi</th>
                                        <th>Batas Atas Persepsi</th>
                                        <th>Batas Bawah Harapan</th>
                                        <th>Batas Tengah Harapan</th>
                                        <th>Batas Atas Harapan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($fuzzy as $f)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$f->batasBawahPersepsi}}</td>
                                        <td>{{$f->batasTengahPersepsi}}</td>
                                        <td>{{$f->batasAtasPersepsi}}</td>
                                        <td>{{$f->batasBawahHarapan}}</td>
                                        <td>{{$f->batasTengahHarapan}}</td>
                                        <td>{{$f->batasAtasHarapan}}</td>
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
        $('#fuzzy-table').DataTable();
    });
</script>
@endpush