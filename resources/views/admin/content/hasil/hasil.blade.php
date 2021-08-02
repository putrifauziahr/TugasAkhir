@extends('admin/layouts/admin')

@section('title', 'Admin | Hasil Akhir')

@section ('container')
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
                    <div class="row">
                        <h1 class="text-center">Cara Membuat Grafik dengan Highcharts di Laravel 6/7</h1>
                        <div id="container"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    // var tang = <?php echo json_encode($tang) ?>;

    Highcharts.chart('container', {
        title: {
            text: 'Pengguna Baru, 2020'
        },
        subtitle: {
            text: 'Source: serambilaravel.com'
        },
        xAxis: {
            categories: ['Tangibles', 'Reliability', 'Responsiveness', 'Assurance', 'Emphaty']
        },
        yAxis: {
            title: {
                text: 'Jumlah Pengguna Mendafatar'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Pengguna Baru',
            data: tang
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 200
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>