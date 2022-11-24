@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Customer -> ({{$customer->name}})</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('customer') }}">Customer list</a></li>
                    <li class="breadcrumb-item active">Update Customer</li>
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
                        <h3 class="card-title">Customer Details<small>Update</small></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ URL::to('customer',[$customer->id]) }}" method="post"
                                    enctype="multipart/form-data">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Customer Name</label>
                                            <input type="text" name="name" value="{{$customer->name}}"
                                                class="form-control" placeholder="Enter Name" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"><label for="gender">Gender</label>
                                                <select name="gender" id="gender" class="form-control" required>
                                                    <option value="" style="display: none" selected>
                                                        Select Gender
                                                    </option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="dob">Birth Date</label>
                                                <input type="date" name="dob" class="form-control"
                                                    value="{{ $customer->dob }}" placeholder="">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" type="text" name="phone"
                                                value="{{ $customer->phone }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="email" name="email"
                                                value="{{ $customer->email }}">

                                        </div>

                                        <div class="col-4 text-right">
                                            <div
                                                style="max-width: 100px; max-height: 100px;overflow:hidden; margin-left: auto">
                                                <img src="{{ asset($customer->image) }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Upload Picture</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image"
                                                    required>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-4"><label for="country">Country</label>
                                                <input name="country" type="text" class="form-control"
                                                    value="{{ $customer->country }}" placeholder="coutnry">
                                            </div>
                                            <div class="col-4">
                                                <label for="state">State</label>
                                                <input value="{{ $customer->state }}" name="state" type="text"
                                                    class="form-control" placeholder="state">
                                            </div>
                                            <div class="col-4">
                                                <label for="city">City</label>
                                                <input value="{{ $customer->city }}" name="city" type="text"
                                                    class="form-control" placeholder="city">
                                            </div>

                                        </div>

                                        <div class="form-group col-6">
                                            <label>Address</label>
                                            <textarea name="address" value="" class="form-control" rows="3"
                                                placeholder="Enter ..."
                                                style="height: 55px;">{{ $customer->address }}</textarea>
                                        </div>
                                        <div class="form-group col-12">
                                            <button type="submit" name="customers_submit"
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