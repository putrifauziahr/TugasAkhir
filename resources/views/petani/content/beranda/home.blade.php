@extends('petani/layouts/petani2')

@section('title', 'Beranda')

@section ('container')

<section class="section">
    <div class="container">
        <div class="row">
            <!-- event -->
            @foreach($penyuluhan as $pen)
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="card border-0 rounded-0 hover-shadow">
                    <div class="card-img position-relative">
                        <a href="{{ url('/berkasPenyuluhan/'. $pen->image) }}" data-fancybox="gal">
                            <img class="card-img-top rounded-0" src="{{url('/berkasPenyuluhan/'. $pen->image)}}" alt="event thumb">
                        </a>
                        <div class="card-date">{{$pen->hari}} , {{$pen->tanggal}}</div>
                    </div>
                    <div class="card-body">
                        <!-- location -->
                        <p><i class="ti-location-pin text-primary mr-2"></i>{{$pen->tempat}}</p>
                        <a href="event-single.html">
                            <h4 class="card-title"><a href="" style="color: black;">{{$pen->kegiatan}}</a></h4>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- /courses -->


@endsection