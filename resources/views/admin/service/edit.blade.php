@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Service</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/service') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/service.index') }}">Service list</a></li>
                    <li class="breadcrumb-item active">Edit Service</li>
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
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit service</h3>
                            <a href="{{ url('/service') }}" class="btn btn-primary">Go Back to service List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <div class="card-body">
                                    {{-- route {{ URL::to('service.update', [$service->id]) }} --}}
                                    <form action="{{ URL::to('service',[$service->id]) }}" method="post"
                                        enctype="multipart/form-data">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @method('PUT')
                                        {{-- @include('includes.errors') --}}
                                        <div class="form-group">
                                            <label for="title">Service Name</label>
                                            <input type="text" name="name" value="{{ $service->name }}"
                                                class="form-control" placeholder="Enter Service name">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" value="{{ $service->price }}"
                                                class="form-control" placeholder="Enter Service Price">
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Service Status</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="" style="display: none" selected>Select Satus</option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="image">Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input"
                                                            id="image">
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <div
                                                        style="max-width: 100px; max-height: 100px;overflow:hidden; margin-left: auto">
                                                        <img src="{{ asset($service->image) }}" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea name="description" id="description" rows="4" class="form-control"
                                                placeholder="Enter description">{{ $service->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Update service</button>
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
</div>
@endsection