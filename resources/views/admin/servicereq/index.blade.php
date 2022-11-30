@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Service Request List</h1>
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
                            <h3 class="card-title">Service Request List</h3>
                            <a href="{{ url("/servicereq/create") }}" class="btn btn-primary">Add New Service Request
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Name
                                        Model
                                        Brand<br />
                                        Category<br />
                                        Color<br />
                                    </th>
                                    <th>Owner<br />
                                        City<br />
                                        Addrs
                                    </th>
                                    <th>
                                        Eng.Num<br />
                                        Reg.Num<br />
                                        ChasisNum<br />

                                    </th>
                                    <th>Model Year</th>
                                    <th>Payable</th>
                                    <th>Req Date</th>
                                    <th>Dedline</th>
                                    <th>Status</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($servicereqs->count())
                                @foreach ($servicereqs as $servicereq)
                                <tr>
                                    <td>{{ $servicereq->id }}</td>
                                    <td>
                                        <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                            <img src="{{ asset($servicereq->vehicle->image) }}"
                                                class="img-fluid img-rounded" alt="">
                                        </div>
                                    </td>
                                    <td>{{ $servicereq->vehicle->name }}
                                        ({{ $servicereq->vehicle->model }})<br />
                                        {{$servicereq->vehicle->brand->name}}<br />
                                        {{$servicereq->vehicle->category->category}}<br />
                                        {{$servicereq->vehicle->color->name}}
                                    </td>
                                    <td>{{ $servicereq->owner->name }}<br />
                                        {{ $servicereq->owner->city }}<br />
                                        {{ $servicereq->owner->address }}<br />
                                    </td>
                                    <td>
                                        {{$servicereq->vehicle->engin_num}}<br />
                                        {{$servicereq->vehicle->num_plate}}<br />
                                        {{$servicereq->vehicle->chasis_num}}
                                    </td>
                                    <td>
                                        {{$servicereq->vehicle->model_year}}

                                    </td>
                                    <td>
                                        Payable:{{$servicereq->payment}}<br />
                                        Paid:{{ $servicereq->paid}}

                                    </td>
                                    <td>{{ $servicereq->created_at->format('d M, Y')}}</td>
                                    <td>{{ $servicereq->deadline}}</td>
                                    <td class="text-center">




                                        @php

                                        $statusclass = "float-right badge";
                                        $statcode = $servicereq->status;
                                        if($statcode==0) {
                                        $status = "Cancelled";
                                        $statusclass = $statusclass . " bg-danger";
                                        }
                                        if($statcode==1) {
                                        $status = "Requested";
                                        $statusclass = $statusclass . " bg-warning";
                                        }
                                        if($statcode==2) {
                                        $status = "Accepted";
                                        $statusclass = $statusclass . " bg-info";
                                        }
                                        if($statcode==3) {
                                        $status = "Inprogress";
                                        $statusclass = $statusclass . " bg-info";
                                        }
                                        if($statcode==4) {
                                        $status = "Completed";
                                        $statusclass = $statusclass . " bg-success";
                                        }
                                        if($statcode==5) {
                                        $status = "Paid";
                                        $statusclass = $statusclass . " bg-info";
                                        }
                                        if($statcode==6) {
                                        $status = "Delivered";
                                        $statusclass = $statusclass . " bg-success";
                                        }
                                        if($statcode==7) {
                                        $status = "Closed";
                                        $statusclass = $statusclass . " bg-danger";
                                        }
                                        @endphp





                                        <span class="{{ $statusclass }}">{{ $status }}</span>

                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ URL::to('servicereq/' . $servicereq->id . '/edit') }}"
                                            class="btn btn-sm btn-primary mr-1">
                                            <i class="fas fa-edit"></i> Update</a>
                                        <a href="{{ url('invoice/' . $servicereq->id) }}"
                                            class="btn btn-sm btn-info  mr-1"><i class="fas fa-print"></i>Invoice
                                        </a>
                                        @if (Auth::user()->role==1)

                                        <form action="{{ url("servicereq/destroy")}}" class="mr-1" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $servicereq->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"> <i
                                                    class="fas fa-trash"></i> </button>
                                        </form>

                                        @endif
                                        @if (Auth::user()->role==0 && $servicereq->payment!=$servicereq->paid )
                                        <a href="{{ url('checkout/' . $servicereq->id) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-edit"></i>Payment
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9">
                                        <h5 class="text-center">No Service Requests found.</h5>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                        {{ $servicereqs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection