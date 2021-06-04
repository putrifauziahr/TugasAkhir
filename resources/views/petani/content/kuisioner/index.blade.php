@extends('petani/layouts/petani')

@section('title', 'Petani | Kuisioner')

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
                                    <h4>Kuisioner</h4>
                                    <span>Dashboard Petani</span>
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
                                    <li class="breadcrumb-item">
                                        Kuisioner
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
                        <h4 class="sub-title" style="font-weight: bold; font-size:20px; text-align:center">Kuisioner</h4>
                    </div>

                    <?php $no = 0; ?>
                    @foreach($kuiss as $k)
                    <?php $no++; ?>
                    <div class="form-group">
                        <div class="col-md-6">
                            <p style="font-weight: bold; font-size:16px">{{$no}}. {{$k->pertanyaan}}</>
                        </div>
                    </div>

                    @endforeach
                </div>
                @endsection