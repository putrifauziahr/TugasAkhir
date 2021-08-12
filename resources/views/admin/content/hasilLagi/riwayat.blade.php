@extends('admin/layouts/admin')

@section('title', 'Admin | Riwayat Hasil')

@section ('container')
<script src="{{ asset('assets/js/Chart.js')}}"></script>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Riwayat Hasil</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Riwayat Hasil</a>
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



                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Hasil Akhir Kegiatan</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <canvas id="myChart"></canvas>
                            </div>
                            @foreach($riwayat as $r)

                            <script>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [
                                            <?php
                                            echo $r->id_riwayat;
                                            ?>,
                                        ],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: [
                                                <?php
                                                echo $r->tangibles + $r->reliability + $r->respon + $r->assurance + $r->empati;
                                                ?>,
                                            ],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Data Riwayat Hasil Akhir Analisis Kepuasan Petani</h5>
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
                                    @foreach($riwayat as $p)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$p->Penyuluhans->kegiatan}}</td>
                                        <td>{{$p->Penyuluhans->hari}}</td>
                                        <td>{{$p->Penyuluhans->tanggal}}</td>
                                        <td>{{$p->Penyuluhans->status}}</td>
                                        <td>
                                            <a href="/admin/showDetailRiwayatAkhir/{{$p->id_riwayat}}" class="btn btn-success"><i class="ti-zoom-in"></i>Hasil Akhir</a>
                                            <a href="/admin/hapusRiwayat/{{$p->id_riwayat}}" class="btn btn-danger"><i class="ti-trash"></i>Hapus</a>
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

@push('js')
<script>
    $(document).ready(function() {
        $('#nilai-table').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#hasil-table').DataTable();
    });
</script>
@endpush