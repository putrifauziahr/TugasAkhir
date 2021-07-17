@extends('petani/layouts/petani2')

@section('title', 'Beranda')

@section ('container')
<!-- Courses -->
<section id="courses" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h2>Kegiatan Penyuluhan
                        <small>Ikuti Kegiatan Penyuluhan</small>
                    </h2>
                </div>

                <div class="owl-carousel owl-theme owl-courses">
                    @foreach($penyuluhan as $pen)
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="courses-thumb">
                                <div class="courses-top">
                                    <div class="courses-image">
                                        <a href="{{ url('/berkasPenyuluhan/'. $pen->image) }}" data-fancybox="gal">
                                            <img class="card-img-top rounded-0" src="{{url('/berkasPenyuluhan/'. $pen->image)}}" alt="event thumb">
                                        </a>
                                    </div>
                                    <div class="courses-date">
                                        <span><i class="fa fa-calendar"></i>{{$pen->tanggal}}</span>
                                        <span><i class="fa fa-clock-o"></i>{{$pen->jam}}</span>
                                    </div>
                                </div>

                                <div class="courses-detail">
                                    <h3><a href="#">{{$pen->kegiatan}}</a></h3>
                                    <p>{{$pen->deskripsi}}</p>
                                </div>

                                <div class="courses-info">
                                    <div class="courses-price">
                                        <a href="#"><span>Lihat Selengkapnya</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>
@endsection