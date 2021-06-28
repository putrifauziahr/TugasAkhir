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
                    <form action="">
                        @foreach($penyuluhan as $pen)
                        <div class="form-group">
                            <select name="id_penyuluhan" class="form-control">
                                <option value="{{$pen->id_penyuluhan}}">{{$pen->kegiatan}}</option>
                            </select>
                        </div>
                        @endforeach

                        <input type="text" name="id_petani" value="{{Session::get('id_petani')}}" hidden>

                        <?php $no = 0; ?>
                        @foreach($kuiss as $k)
                        <?php $no++; ?>

                        <div class="col-md-12">
                            <input name="{{$k->id_kuis}}" class="form-control" style="font-weight: bold; font-size:15px" value="{{$no}} . {{$k->pertanyaan}}"></input>
                        </div>
                        <div class="position-relative form-group ml-3">
                            <div class="form-row ml-3">
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio1{{$no}}" name="jawaban_har{{$no}}" value="1" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio1{{$no}}">Sangat Kurang</label>
                                </div>
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio2{{$no}}" name="jawaban_har{{$no}}" value="2" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio2{{$no}}">Kurang</label>
                                </div>
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio3{{$no}}" name="jawaban_har{{$no}}" value="3" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio3{{$no}}">Cukup Puas</label>
                                </div>
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio4{{$no}}" name="jawaban_har{{$no}}" value="4" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio4{{$no}}">Puas</label>
                                </div>
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio5{{$no}}" name="jawaban_har{{$no}}" value="5" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio5{{$no}}">Sangat Puas</label>
                                </div>
                            </div>
                        </div>

                        <label class="col-md-3" style="font-weight: bold; font-size:15px">Harapan</label>
                        <div class="position-relative form-group ml-3">
                            <div class="form-row ml-3">
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio1{{$no}}" name="jawaban_per{{$no}}" value="1" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio1{{$no}}">Sangat Kurang</label>
                                </div>
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio2{{$no}}" name="jawaban_per{{$no}}" value="2" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio2{{$no}}">Kurang</label>
                                </div>
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio3{{$no}}" name="jawaban_per{{$no}}" value="3" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio3{{$no}}">Cukup Puas</label>
                                </div>
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio4{{$no}}" name="jawaban_per{{$no}}" value="4" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio4{{$no}}">Puas</label>
                                </div>
                                <div class="custom-radio custom-control col-md-2">
                                    <input type="radio" id="exampleCustomRadio5{{$no}}" name="jawaban_per{{$no}}" value="5" class="form-check-input" required>
                                    <label class="custom-control-label" for="exampleCustomRadio5{{$no}}">Sangat Puas</label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        @endsection