@extends('admin/layouts/admin')

@section('title', 'Admin | Riwayat Hasil Akhir')

@section ('container')
<script src="{{ asset('assets/js/Chart.js')}}"></script>
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Riawayat Hasil Akhir</h4>
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
                                    <li class="breadcrumb-item"><a href="#">Riwayat Hasil Akhir</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="card">
                    <div class="card-header">
                        <h5>Data Penyuluhan</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="penyuluhan-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
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
                                        <td>{{$p->status}}</td>
                                        <td>
                                            <a href="/admin/showDetailRiwayat/{{$p->id_penyuluhan}}" class="btn btn-success"><i class="ti-zoom-in"></i>Hasil Akhir</a>
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

@endsection