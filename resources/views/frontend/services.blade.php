@extends('frontend.layouts.master')
@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>OUR SERVICES</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">OUR SERVICES</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start About Page  -->
<div class="about-box-main">


    <div class="latest-blog">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>latest blog</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                @foreach ($services as $service)
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{ asset($service->image) }}" alt="">
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>{{ $service->name }}</h3>
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <div class="col-12">
        <h2 class="noo-sh-title">Our Services</h2>
    </div>
    @foreach ($services as $service)
    <div class="col-sm-6 col-lg-4">
        <div class="service-block-inner">
            <h3>{{ $service->name }}</h3>
            <p>{{ $service->description }} </p>
        </div>
    </div>
    @endforeach --}}
</div>
<!-- End About Page -->
@endsection