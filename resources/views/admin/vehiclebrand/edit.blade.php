@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update brand -> ({{$brand->name}})</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('brand') }}">brand list</a></li>
                    <li class="breadcrumb-item active">Update brand</li>
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
                        <h3 class="card-title">Vhicle brand Details<small>Update</small></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ URL::to('vehiclebrand',[$vehiclebrand->id]) }}" method="post"
                                    enctype="multipart/form-data">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Brand Name</label>
                                            <input type="text" name="name" value="{{$vehiclebrand->name}}"
                                                class="form-control" placeholder="Enter Name" required>
                                        </div>


                                        <div class="col-4 text-right">
                                            <div
                                                style="max-width: 100px; max-height: 100px;overflow:hidden; margin-left: auto">
                                                <img src="{{ asset($vehiclebrand->image) }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Upload Brand Logo</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <button type="submit" name="brands_submit"
                                                class="btn btn-lg btn-success">Submit</button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection