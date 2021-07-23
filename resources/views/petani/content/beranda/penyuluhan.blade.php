@extends('petani/layouts/petani2')

@section('title', 'Kegiatan Penyuluhan')

@section ('container')
<!-- Courses -->
<section id="courses" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h2>Kegiatan Penyuluhan
                        <small>Ayo, Ikuti Kegiatan Penyuluhan !</small>
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
                                        <a href="/beranda/showDetailPenyuluhan/{{$pen->id_penyuluhan}}"><span>Lihat Selengkapnya</span></a>
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

<section style="padding-top: 5px;" style="background-color: white;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title">
                    <h2 style="text-align: center;">Materi Penyuluhan
                        <small>Balai Penyuluhan Pertanian Kecammatan Gabuswetan</small>
                    </h2>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="feature-thumb">
                    <span>01</span>
                    <h3>Tanaman Pangan</h3>
                    <p>
                    <ul>
                        <li>
                            <p>Budidaya Padi Organik dengan Metode SRI</p>
                        </li>
                        <li>
                            <p>Cara Membuat Benih Padi Sendiri</p>
                        </li>
                        <li>
                            <p>Cara Memperbanyak Anakan Padi</p>
                        </li>
                        <li>
                            <p>Cara Mengembalikan Kesuburan Tanah</p>
                        </li>
                        <li>
                            <p>Cara Mengendalikan Hama Sundep</p>
                        </li>
                    </ul>
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="feature-thumb">
                    <span>02</span>
                    <h3>Tanaman Holtikultura</h3>
                    <p>
                    <ul>
                        <li>
                            Budidaya Buah Naga
                        </li>
                        <li>
                            Bibit Cabe Kuat dikala Kemarau
                        </li>
                    </ul>
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="feature-thumb">
                    <span>03</span>
                    <h3>Peternakan</h3>
                    <p>
                    <ul>
                        <li>
                            Fermentasi Jerami Kering Untuk Pakan Ternak
                        </li>
                        <li>
                            Mensiasati Kelangkaan HMT
                        </li>
                        <li>
                            Obat Herbal Untuk Unggas
                        </li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection