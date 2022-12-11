@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Customer List</h1>
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
                            <h3 class="card-title">Customer List</h3>
                            <a href="{{ url("/customer/create") }}" class="btn btn-primary">Create Customer </a>
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
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($customers->count())
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>
                                        <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                            <img src="{{ asset($customer->image) }}" class="img-fluid img-rounded"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->country,$customer->city,$customer->state,$customer->address }}
                                    </td>
                                    <td>{{$customer->phone}}
                                    </td>
                                    <td>{{$customer->email}}
                                    </td>
                                    <td>{{ $customer->created_at->format('d M, Y')}}</td>
                                    <td class="d-flex">
                                        <a href="{{ URL::to('customer/' . $customer->id . '/edit') }}"
                                            class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ url("customer/destroy")}}" class="mr-1" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $customer->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"> <i
                                                    class="fas fa-trash"></i> </button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">
                                        <h5 class="text-center">No customers found.</h5>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection