@extends('frontend.layouts.master')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>ABOUT US</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">ABOUT US</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start About Page  -->
<div class="about-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="noo-sh-title">We are <span>Vehicle Services>
                        <p>"At 24/7 servicing First Choice Services we strive to provide the best levels of service to
                            all our customers ensuring they enjoy a safe and pleasant driving experience.
                            We offer an extensive range of car repair services for cars of all makes and models all
                            under one roof. We specialise in car services including wheel alignment service ,
                            car body repair , engine repair , denting and painting , brake repair , car grooming , road
                            side assistance and much more."</p>
            </div>
            <div class="col-lg-6">
                <div class="banner-frame">
                    <video class="img-thumbnail img-fluid" style=" border: 4px solid red; border-radius: 50px 20px;"
                        controls autoplay>
                        <source src="{{ asset('frontend') }}/images/videoplayback.mp4" type="video/mp4"
                            style="border-radius: 3px" width="200" height="30">
                    </video>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>We are Trusted</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>We are Professional</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>We are Expert</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. </p>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12">
                <h2 class="noo-sh-title">Meet Our Team</h2>

            </div> @foreach ($mechanics as $mechanic )
            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{ asset($mechanic->image) }}" alt="" />
                        <div class="team-content">
                            <h3 class="title">{{ $mechanic->name }}</h3> <span class="post">Mechanic</span>
                        </div>
                        <ul class="social">
                            <li>
                                <a href="#" class="fab fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-google-plus"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-youtube"></a>
                            </li>
                        </ul>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p>Praesent urna diam, maximus ut
                            ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique
                            purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End About Page -->
@endsection