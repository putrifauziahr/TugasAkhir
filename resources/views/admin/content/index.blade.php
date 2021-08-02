@extends('admin/layouts/admin')

@section('title', 'Dashboard Admin')

@section ('container')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Kategori</span>
                                    <h4>{{$kategori}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{route('admin/showKategori')}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Kuisioner</span>
                                    <h4>{{$kuis}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{route('admin/showKuisioner')}}">Lihat Selengkapnya</a>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-green card1-icon"></i>
                                    <span class="text-c-green f-w-600">KelompokTani</span>
                                    <h4>{{$poktan}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{route('admin/showKelompokTani')}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-yellow card1-icon"></i>
                                    <span class="text-c-yellow f-w-600">Petani</span>
                                    <h4>{{$petani}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{route('admin/showPetani')}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Penyuluhan</span>
                                    <h4>{{$penyuluhan}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{route('admin/showPenyuluhan')}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-green card1-icon"></i>
                                    <span class="text-c-green f-w-600">Desa</span>
                                    <h4>{{$desa}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{route('admin/showDesa')}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-yellow card1-icon"></i>
                                    <span class="text-c-yellow f-w-600">Gapoktan</span>
                                    <h4>{{$gapoktan}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{route('admin/showGapoktan')}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endsection