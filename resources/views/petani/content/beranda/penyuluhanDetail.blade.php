@extends('petani/layouts/petani2')

@section('title', 'Detail Kegiatan Penyuluhan')

@section ('container')
<!-- Courses -->
<section id="courses" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h2>Detail Kegiatan Penyuluhan
                        <small>Ayo, Ikuti Kegiatan Penyuluhan !</small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body profile-card">
                        <center>
                            <a href="{{ url('/berkasPenyuluhan/'. $penyuluhan->image) }}" data-fancybox="gal">
                                @if($penyuluhan->image != null)
                                <img src="{{ url('/berkasPenyuluhan/'. $penyuluhan->image) }}" alt="Image" style="height: 300px; width:400px">
                                @else
                                <img src="{{ url('images/user-dummy.png') }}" alt="Image" class="img-circle" style="height: 180px; width:180px">
                                @endif
                                <br>
                                <br>
                            </a>
                        </center>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="about-info">

                            <figure>
                                <h3><i class="fa fa-users"></i> {{$penyuluhan->kegiatan}} <i class="fa fa-users"></i></h3>
                                <figcaption>
                                    <h4>Tempat</h4>
                                    <p>{{$penyuluhan->tempat}}</p>

                                    <h4>Waktu</h4>
                                    <p>{{$penyuluhan->jam}} - {{$penyuluhan->hari}}, {{$penyuluhan->tanggal}} </p>

                                    <h4>Pemateri</h4>
                                    <p>{{$penyuluhan->pemateri}}</p>

                                    <h4>Peserta</h4>
                                    <p>{{$penyuluhan->peserta}}</p>

                                    <h4>Komoditas</h4>
                                    <p>{{$penyuluhan->komoditas}}</p>

                                    <h4>Deskripsi </h4>
                                    <p>{{$penyuluhan->deskripsi}}</p>
                                </figcaption>
                            </figure>
                        </div>

                        <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('beranda/showPenyuluhan')}}">Kembali</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection