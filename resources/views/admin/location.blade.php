@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Our Location</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="{{ url('vehiclebrand') }}">vehiclebrand list</a></li> --}}
                    <li class="breadcrumb-item active"> Our Location</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Our Location <small>Location</small></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.202160129719!2d91.71888971401677!3d22.496597085221886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad2777a615585d%3A0xdcf908f6e4f3a713!2z4KaG4Kao4KeN4Kak4Kaw4KeN4Kac4Ka-4Kak4Ka_4KaVIOCmh-CmuOCmsuCmvuCmruCngCDgpqzgpr_gprbgp43gpqzgpqzgpr_gpqbgp43gpq_gpr7gprLgp58g4Kaa4Kaf4KeN4Kaf4KaX4KeN4Kaw4Ka-4Kau!5e0!3m2!1sbn!2sbd!4v1618759550621!5m2!1sbn!2sbd"
                                class="col-lg-12 col-sm-12 col-md-12" height="500" style="border:0;"
                                allowfullscreen="true" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection