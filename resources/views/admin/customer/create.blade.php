@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Customer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('customer') }}">Customer list</a></li>
                    <li class="breadcrumb-item active">Create Customer</li>
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
                        <h3 class="card-title">Customer <small>Registration</small></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ url('customer') }}" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Customer Name</label>
                                            <input type="text" name="name" value="" class="form-control"
                                                placeholder="Enter Name" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"><label for="gender">Gender</label>
                                                <select name="gender" id="status" class="form-control" required>
                                                    <option value="" style="display: none" selected>Select Gender
                                                    </option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="dob">Birth Date</label>
                                                <input type="date" name="dob" class="form-control" placeholder=""
                                                    required>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="" class="form-control"
                                                placeholder="Enter Email" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="phone">phone</label>
                                            <input type="text" name="phone" value="" class="form-control"
                                                placeholder="Enter Phone" required>

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
                                                    placeholder="coutnry">
                                            </div>
                                            <div class="col-4">
                                                <label for="state">State</label>
                                                <input name="state" type="text" class="form-control"
                                                    placeholder="state">
                                            </div>
                                            <div class="col-4">
                                                <label for="city">City</label>
                                                <input name="city" type="text" class="form-control" placeholder="city">
                                            </div>

                                        </div>

                                        <div class="form-group col-6">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" rows="3"
                                                placeholder="Enter ..." style="height: 55px;"></textarea>
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