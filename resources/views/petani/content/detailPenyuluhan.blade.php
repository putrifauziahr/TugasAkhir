@extends('petani/layouts/petani')

@section('title', 'Detail Penyuluhan')

@section ('container')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-4">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">{{$penyuluhan->kegiatan}}</span>
                                    <br>
                                    <br>
                                    <div>
                                        <span class="f-left m-t-10">
                                            <i class="text-c-blue f-16 icofont icofont-pin m-r-10"></i>
                                            {{$penyuluhan->status}}
                                        </span>
                                        <span class="f-left m-t-10">
                                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Hari, Tanggal : {{$penyuluhan->hari}} , {{$penyuluhan->tanggal}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        @endsection