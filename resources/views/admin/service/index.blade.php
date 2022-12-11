@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Service List</h1>
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
                            <h3 class="card-title">Service List</h3>
                            @if (Auth::user()->role==1) <a href="{{ url("/service/create") }}"
                                class="btn btn-primary">Create Service </a>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Details</th>
                                    <th>Created Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($services->count())
                                @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>
                                        <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                            <img src="{{ asset($service->image) }}" class="img-fluid img-rounded"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->price }}</td>
                                    <td>{{ $service->description }}</td>
                                    <td>{{ $service->created_at->format('d M, Y') }}</td>
                                    <td class="d-flex">
                                        @if (auth::user()->role==1)
                                        <a href="{{ URL::to('service/' . $service->id . '/edit') }}"
                                            class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ url("service/destroy")}}" class="mr-1" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $service->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"> <i
                                                    class="fas fa-trash"></i> </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">
                                        <h5 class="text-center">No Services found.</h5>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection