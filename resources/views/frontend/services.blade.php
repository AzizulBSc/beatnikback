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
    </div>
</div>
<!-- End About Page -->
@endsection