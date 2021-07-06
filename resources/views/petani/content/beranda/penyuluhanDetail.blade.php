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

        <div class="card mb-3">
            <a href="{{ url('/berkasPenyuluhan/'. $penyuluhan->image) }}" data-fancybox="gal">
                <img style="width:470px; height:300px;" class="card-img-top" alt="Card image cap" src="{{url('/berkasPenyuluhan/'. $penyuluhan->image)}}">
            </a>
            <div class="card-body">
                <h5 class="card-title" style="text-align:center">{{$penyuluhan->kegiatan}}</h5>
                <p class="card-text">
                    {{$penyuluhan->deskripsi}}
                </p>
                <p class="card-text">
                    <small class="text-muted">
                    </small>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection