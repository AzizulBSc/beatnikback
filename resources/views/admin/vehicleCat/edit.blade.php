@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Vehicle Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Vehicle Category list</a></li> --}}
                    <li class="breadcrumb-item active">Create Vehicle Category</li>
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
                            <h3 class="card-title">Add VehicleCategory</h3>
                            <a href="{{ url('/vehicleCat') }}" class="btn btn-primary">Go Back to VehicleCategory
                                List</a>

                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ URL::to('vehicleCat/' . $VehicleCategory->id)}}" method="post">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @method('PUT')
                                    <div class="card-body">
                                        {{-- @include('includes.errors') --}}
                                        <div class="form-group">
                                            <label for="category">Vehicle Categroy</label>
                                            <input type="string" name="category"
                                                value="{{ $VehicleCategory->category }}" class="form-control"
                                                placeholder="Enter New category like (3 Whillers,8 Whillers)" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="duration">Status</label>

                                            <select name="status" id="status" class="form-control" required>
                                                <option value="" style="display: none" selected>Select Satus</option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
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