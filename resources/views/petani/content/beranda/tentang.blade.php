@extends('petani/layouts/petani2')

@section('title', 'Tentang Kami')

@section ('container')
<section id="about">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="about-info">
                    <h2>Ayo Mulai Bergabung Bersama Kami, untuk Pertanian Unggul</h2>

                    <figure>
                        <span><i class="fa fa-users"></i></span>
                        <figcaption>
                            <h3>Penyuluhan Pertanian</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                        </figcaption>
                    </figure>

                    <figure>
                        <span><i class="fa fa-certificate"></i></span>
                        <figcaption>
                            <h3>Penyaluran Pupuk Subsidi</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                        </figcaption>
                    </figure>

                    <figure>
                        <span><i class="fa fa-certificate"></i></span>
                        <figcaption>
                            <h3>Kerja Sama dengan Industri Pupuk</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="col-md-offset-1 col-md-4 col-sm-12">
                <div class="entry-form">
                    <form action="#" method="post">
                        <h2>Materi Penyuluhan</h2>
                        <input type="text" name="full name" class="form-control" required="" placeholder="Tanaman Pangan" style="text-align: center; color:white;">

                        <input type="email" name="email" class="form-control" required="" placeholder="Tanaman Holtikultura" style="text-align: center; color:white">

                        <input type="password" name="password" class="form-control" required="" placeholder="Peternakan" style="text-align: center; color:white">

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection