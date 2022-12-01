@extends('frontend.layouts.master')
@section('content')

<!-- Start Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">


        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('frontend') }}/images/banner-01.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('frontend') }}/images/banner-02.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('frontend') }}/images/banner-03.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- End Slider -->


<!-- Start Services  -->
<div class="services-box-main">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h2 class="noo-sh-title">Our Services</h2>
            </div>
            @foreach ($services as $service)
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>{{ $service->name }}</h3>
                    <p>{{ $service->description }} </p>
                </div>
            </div>
            @endforeach

        </div>

        <div class="row my-4">
            <div class="col-12">
                <h2 class="noo-sh-title">Meet Our Exparts</h2>
            </div>
            @foreach ($mechanics as $mechanic )
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
                        <p>{{ $mechanic->address }},{{ $mechanic->city }},{{ $mechanic->state }},{{ $mechanic->country
                            }}</p>
                    </div>
                    <hr class="my-0">
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>
<!-- End Services -->


@endsection