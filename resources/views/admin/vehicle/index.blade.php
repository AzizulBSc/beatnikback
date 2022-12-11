@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Vehicle List</h1>
            </div><!-- /.col -->
            {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin/dash') }}">Front End</a></li>
                    <li class="breadcrumb-item active">Post list</li>
                </ol>
            </div><!-- /.col --> --}}
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
                            <h3 class="card-title">Vehicle List</h3>
                            <a href="{{ url("/vehicle/create") }}" class="btn btn-primary">Add New Vehicle </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Model</th>
                                    <th>Owner</th>
                                    <th>
                                        Brand<br />
                                        Category<br />
                                        Color<br />

                                    </th>
                                    <th>
                                        Engine Number<br />
                                        Reg. Number<br />
                                        Chasis Number<br />

                                    </th>
                                    <th>Model Year</th>
                                    <th>Created Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($vehicles->count())
                                @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->id }}</td>
                                    <td>
                                        <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                            <img src="{{ asset($vehicle->image) }}" class="img-fluid img-rounded"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ $vehicle->owner->name }}</td>
                                    <td>
                                        {{$vehicle->brand->name}}<br />
                                        {{$vehicle->category->category}}<br />
                                        {{$vehicle->color->name}}
                                    </td>
                                    <td>
                                        {{$vehicle->engin_num}}<br />
                                        {{$vehicle->num_plate}}<br />
                                        {{$vehicle->chasis_num}}
                                    </td>
                                    <td>
                                        {{$vehicle->model_year}}

                                    </td>
                                    <td>{{ $vehicle->created_at->format('d M, Y')}}</td>
                                    <td class="d-flex">
                                        <a href="{{ URL::to('vehicle/' . $vehicle->id . '/edit') }}"
                                            class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        @if (Auth::user()->role==1)

                                        <form action="{{ url("vehicle/destroy")}}" class="mr-1" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $vehicle->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"> <i
                                                    class="fas fa-trash"></i> </button>
                                        </form>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9">
                                        <h5 class="text-center">No Vehicles found.</h5>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                        {{ $vehicles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection