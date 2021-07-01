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
                            <h3>Professional Trainers</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                        </figcaption>
                    </figure>

                    <figure>
                        <span><i class="fa fa-certificate"></i></span>
                        <figcaption>
                            <h3>International Certifications</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                        </figcaption>
                    </figure>

                    <figure>
                        <span><i class="fa fa-bar-chart-o"></i></span>
                        <figcaption>
                            <h3>Free for 3 months</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="col-md-offset-1 col-md-4 col-sm-12">
                <div class="entry-form">
                    <form action="#" method="post">
                        <h2>Signup today</h2>
                        <input type="text" name="full name" class="form-control" placeholder="Full name" required="">

                        <input type="email" name="email" class="form-control" placeholder="Your email address" required="">

                        <input type="password" name="password" class="form-control" placeholder="Your password" required="">

                        <button class="submit-btn form-control" id="form-submit">Get started</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection