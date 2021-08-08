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
                                        Dashboard
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
                        <h5>Petunjuk Pengisian !</h5>
                    </div>
                    <div class="col-md-12">
                        <p style="font-size:14px; text-align:justify">
                            1. Bacalah setiap pertanyaan dengan teliti dan berikan jawaban sesuai dengan
                            kenyataan yang diterima saat kegiatan penyuluhan berlangsung
                        </p>
                        <p style="font-size:14px; text-align:justify">
                            2. Harapan merupakan harapan petani terhadap pelayanan penyuluhan
                            yang diberikan oleh BPP Kecamatan Gabuswetan, sebelum berlangsungnya kegiatan penyuluhan.
                        </p>
                        <p style="font-size:14px; text-align:justify">
                            3. Pengisian kuisioner hanya dapat dilakukan Satu kali pada satu kegiatan,
                            jika melakukan percobaan pengisian kedua dan seterusnya, maka
                            jawaban tidak tersimpan dan muncul status bahwa "Kuisioner Sudah Pernah Diisi"
                        </p>
                    </div>
                </div>
                @foreach($pen as $penn)
                @if($penn->status == "Sedang Dilaksanakan")
                <div class="card">
                    <div class="card-header">
                        <h4 class="sub-title" style="font-weight: bold; font-size:16px; text-align:center">Kuisioner Kegiatan "{{$penn->kegiatan}}, {{$penn->tanggal}}" </h4>
                    </div>
                    <form action="/petani/postTambahKuisioner" method="POST">
                        {{csrf_field()}}

                        <input type="text" name="id_petani" value="{{Session::get('id_petani')}}" hidden>

                        @foreach($penyuluhan as $pen)
                        <div class="col-md-12">
                            <select name="id_penyuluhan" class="form-control" hidden>
                                <option value="{{$pen->id_penyuluhan}}">{{$pen->kegiatan}}</option>
                            </select>
                        </div>
                        @endforeach

                        <?php $i = 1;
                        foreach ($kuiss as $k) { ?>
                            <div class="col-md-12">
                                <input name="id_kuis[<?= $i ?>]" class="form-control" style="font-weight: bold; font-size:15px" value="{{$k->id_kuis}}" hidden>
                                {{$i}} . {{$k->pertanyaan}}
                            </div>
                            <div class="position-relative form-group ml-3">
                                <div class="form-row ml-3">
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanper[<?= $i ?>]" value="{{$k->pilihanA}}" class="form-check-input" required>
                                        <label class="custom-control-label">Tidak Puas</label>
                                    </div>
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanper[<?= $i ?>]" value="{{$k->pilihanB}}" class="form-check-input" required>
                                        <label class="custom-control-label">Kurang</label>
                                    </div>
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanper[<?= $i ?>]" value="{{$k->pilihanC}}" class="form-check-input" required>
                                        <label class="custom-control-label">Cukup Puas</label>
                                    </div>
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanper[<?= $i ?>]" value="{{$k->pilihanD}}" class="form-check-input" required>
                                        <label class="custom-control-label">Puas</label>
                                    </div>
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanper[<?= $i ?>]" value="{{$k->pilihanE}}" class="form-check-input" required>
                                        <label class="custom-control-label">Sangat Puas</label>
                                    </div>
                                </div>
                            </div>

                            <label class="col-md-3" style=" font-size:15px">Harapan</label>
                            <div class="position-relative form-group ml-3">
                                <div class="form-row ml-3">
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanhar[<?= $i ?>]" value="{{$k->pilihanA}}" class="form-check-input" required>
                                        <label class="custom-control-label">Tidak Puas</label>
                                    </div>
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanhar[<?= $i ?>]" value="{{$k->pilihanB}}" class="form-check-input" required>
                                        <label class="custom-control-label">Kurang</label>
                                    </div>
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanhar[<?= $i ?>]" value="{{$k->pilihanC}}" class="form-check-input" required>
                                        <label class="custom-control-label">Cukup Puas</label>
                                    </div>
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanhar[<?= $i ?>]" value="{{$k->pilihanD}}" class="form-check-input" required>
                                        <label class="custom-control-label">Puas</label>
                                    </div>
                                    <div class="custom-radio custom-control col-md-2">
                                        <input type="radio" name="jawabanhar[<?= $i ?>]" value="{{$k->pilihanE}}" class="form-check-input" required>
                                        <label class="custom-control-label">Sangat Puas</label>
                                    </div>
                                </div>
                            </div>
                            <input name="created_at[<?= $i ?>]" hidden>
                            <input name="updated_at[<?= $i ?>]" hidden>
                        <?php $i++;
                        } ?>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                @else
                @endif
                @endforeach
            </div>
        </div>


        @endsection