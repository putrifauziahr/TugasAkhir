@extends('admin/layouts/admin')

@section('title', 'Admin | Hasil Akhir')

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
                                    <h4>Hasil Akhir</h4>
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
                                    <li class="breadcrumb-item"><a href="#">Hasil Akhir</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Hasil Akhir Kegiatan " {{$penyuluhan->kegiatan}} - {{$penyuluhan->tanggal}} "</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <canvas id="myChart"></canvas>
                            </div>


                            <script>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ["Tangibles", "Reliability", "Responsiveness", "Assurance", "Emphaty"],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: [
                                                <?php
                                                echo  $tangp - $tang
                                                ?>,
                                                <?php
                                                echo  $relip - $reli
                                                ?>,
                                                <?php
                                                echo  $responp - $respon
                                                ?>,
                                                <?php
                                                echo  $assup - $assu
                                                ?>,
                                                <?php
                                                echo  $emp - $em
                                                ?>
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
                        </div>
                    </div>
                </div>

                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Hasil Akhir Kegiatan " {{$penyuluhan->kegiatan}} - {{$penyuluhan->tanggal}} "</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover" id="hasil-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Nilai GAP</th>
                                            <th>Kesimpulan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Tangibles</td>
                                            <td>{{$tangp - $tang}}</td>
                                            @if($tangp - $tang == "0")
                                            <td>Sudah Sesuai Harapan Petani</td>
                                            @else($tangp - $tang <= "-1" ) <td>Harus Diperbaiki</td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Reliability</td>
                                            <td>{{$relip - $reli}}</td>
                                            @if($relip - $reli == "0")
                                            <td>Sudah Sesuai Harapan Petani</td>
                                            @else($relip - $reli <= "-1" ) <td>Harus Diperbaiki</td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Responsiveness</td>
                                            <td>{{$responp - $respon}}</td>
                                            @if($responp - $respon == "0")
                                            <td>Sudah Sesuai Harapan Petani</td>
                                            @else($responp - $respon <= "-1" ) <td>Harus Diperbaiki</td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Assurance</td>
                                            <td>{{$assup - $assu}}</td>
                                            @if($assup - $assu == "0")
                                            <td>Sudah Sesuai Harapan Petani</td>
                                            @else($assup - $assu <= "-1" ) <td>Harus Diperbaiki</td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Emphaty</td>
                                            <td>{{$emp - $em}}</td>
                                            @if($emp - $em == "0")
                                            <td>Sudah Sesuai Harapan Petani</td>
                                            @else($$emp - $em <= "-1" ) <td>Harus Diperbaiki</td>
                                                @endif
                                        </tr>
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

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#hasil-table').DataTable();
    });
</script>
@endpush