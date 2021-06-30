@extends('petani/layouts/petani')

@section('title', 'Dashboard Petani')

@section ('container')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- card1 start -->
                        @foreach($penyuluhan as $pen)
                        <div class="col-md-6 col-xl-4">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                    <br>
                                    <br>
                                    <span class="text-c-blue">{{$pen->kegiatan}}</span>
                                    <br>
                                    <br>
                                    <div>
                                        <span class="f-left m-t-10">
                                            <i class="text-c-blue f-16 icofont icofont-pin m-r-10"></i>
                                            {{$pen->status}}
                                        </span>
                                        <span class="f-left m-t-10">
                                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Hari, Tanggal : {{$pen->hari}} , {{$pen->tanggal}}
                                        </span>
                                        <span class="f-left m-t-10">
                                            <i class="text-c-blue f-16 icofont icofont-pin m-r-10"></i>
                                            <a href="/petani/showDetailPenyuluhan/{{$pen->id_penyuluhan}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- card1 end -->
                        @endsection