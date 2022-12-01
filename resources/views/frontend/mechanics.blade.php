@extends('frontend.layouts.master')
@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>OUR MECHANICS</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">OUR EXPERT</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Services  -->
<div class="services-box-main">
    <div class="container">

        <div class="row my-4">
            <div class="col-12">
                <h2 class="noo-sh-title">Meet Our Expert</h2>
            </div>
            @foreach ($mechanics as $mechanic )
            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{ asset($mechanic->image) }}" alt="" />
                        <div class="team-content">
                            <h3 class="title">{{ $mechanic->name }}</h3> <span class="post">Car Specialised</span>
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
                        <p>He Has Five years exprienced in Car Services</p>
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