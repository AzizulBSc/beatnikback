@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Vehicle Update</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('vehicle') }}">Vehicle list</a></li>
                    <li class="breadcrumb-item active">Update Vehicle</li>
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
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Vehicle <small>Update</small></h3>
                    </div>

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ URL::to('vehicle',[$vehicle->id]) }}" method="post"
                                    enctype="multipart/form-data">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row form-group">

                                            <div class="col-6">
                                                <label for="model">Vehicle Model</label>
                                                <input type="text" name="model" value="{{$vehicle->model}}"
                                                    class="form-control" placeholder="Enter Vehicle Model" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="name">Vehicle Name</label>
                                                <input type="text" name="name" value="{{$vehicle->name}}"
                                                    class="form-control" placeholder="Enter Vehicle name" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <label for="vehicle_brand_id">Vehicle Brand</label>
                                                <select name="vehicle_brand_id" id="vehicle_brand_id"
                                                    class="form-control" required>
                                                    <option value="" style="display: none" selected>Select Brand
                                                    </option>
                                                    @foreach ($brands as $brand )

                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="vehicle_category_id">Vehicle Category</label>
                                                <select name="vehicle_category_id" id="vehicle_category_id"
                                                    class="form-control" required>
                                                    <option value="" style="display: none" selected>Select Category
                                                    </option>
                                                    @foreach ($category as $cat )

                                                    <option value={{ $cat->id }}>{{ $cat->category }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6"><label for="vehicle_color_id">Vehicle Color</label>
                                                <select name="vehicle_color_id" id="status" class="form-control"
                                                    required>
                                                    <option value="" style="display: none" selected>Select Color
                                                    </option>
                                                    @foreach ($colors as $color )

                                                    <option value={{ $color->id }}>{{ $color->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="model_year">Model Year</label>
                                                <input type="number" name="model_year" class="form-control"
                                                    placeholder="Enter Your Vehicle Model Year"
                                                    value="{{$vehicle->model_year}}" required>
                                            </div>

                                        </div>
                                        <div class="row form-group">
                                            <div class="col-4"><label for="engin_num">Engine Number</label>
                                                <input name="engin_num" type="text" class="form-control"
                                                    placeholder="Enter Engine Number" value="{{$vehicle->engin_num}}">
                                            </div>
                                            <div class="col-4">
                                                <label for="num_plate">Reg. Number</label>
                                                <input name="num_plate" type="text" class="form-control"
                                                    placeholder="state" value="{{$vehicle->num_plate}}">
                                            </div>
                                            <div class="col-4">
                                                <label for="chasis_num">Chasis Number</label>
                                                <input name="chasis_num" type="text" class="form-control"
                                                    placeholder="Enter Chasis Number" value="{{$vehicle->chasis_num}}">
                                            </div>

                                        </div>

                                        <div class="form-group col-lg-8">
                                            <label for="customer_id">Owner Name</label>
                                            <!-- Dropdown -->
                                            <select name="customer_id" id="owner" class="form-control" type="number"
                                                required>
                                                <option value="">Select Owner</option>
                                                @foreach ($customers as $customer)
                                                <option value={{ $customer->id }}>{{$customer->name }}({{
                                                    $customer->id }})</option>

                                                @endforeach
                                            </select>


                                        </div>

                                        <div class="form-group col-lg-8">
                                            <label for="image">Upload Picture</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image"
                                                    required>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <button type="submit" name="Vehicles_submit"
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

@section('script')
<script>

</script>
@stop

@endsection