@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('product') }}">Product list</a></li>
                    <li class="breadcrumb-item active">Create Product</li>
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
                            <h3 class="card-title">Create Product</h3>
                            {{-- <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to Product List</a>
                            --}}
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ url('product') }}" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="card-body">
                                        {{-- @include('includes.errors') --}}
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" value="" class="form-control"
                                                placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Product Price</label>
                                            <input type="number" name="price" value="" class="form-control"
                                                placeholder="Enter price" required>

                                        </div>

                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image"
                                                    required>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" rows="4" class="form-control"
                                                placeholder="Enter description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
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