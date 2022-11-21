@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create bank</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">bank list</a></li> --}}
                    <li class="breadcrumb-item active">Create bank</li>
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
                            <h3 class="card-title">Add bank</h3>
                            <a href="{{ url('/bank') }}" class="btn btn-primary">Go Back to Bank List</a>

                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ url('bank') }}" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="card-body">
                                        {{-- @include('includes.errors') --}}

                                        <div class="form-group">
                                            <label for="name">Bank Name</label>
                                            <input type="text" name="name" value="" class="form-control"
                                                placeholder="Enter Bank Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="code">Bank Short Code</label>
                                            <input type="text" name="code" value="" class="form-control"
                                                placeholder="Enter Bank Short Code" required>
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