@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">interest List</h1>
            </div><!-- /.col -->
            <!-- /.col -->
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
                            <h3 class="card-title">Interest List</h3>
                            <a href="{{ url("/interest/create") }}" class="btn btn-primary">Add Interest</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Bank Id</th>
                                    <th>Bank Name</th>
                                    <th>Duration</th>
                                    <th>Interest</th>
                                    <th>Created At</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($interests->count())
                                @foreach ($interests as $interest)
                                <tr>
                                    <td>{{ $interest->id }}</td>
                                    <td>{{ $interest->bank->id }}</td>
                                    <td>{{ $interest->bank->name }}({{ $interest->bank->code }})</td>
                                    <td>{{ $interest->duration }}</td>
                                    <td>{{ $interest->rate }}</td>
                                    <td>{{ $interest->created_at->format('d M, Y') }}</td>
                                    <td class="d-flex">
                                        <a href="{{ URL::to('interest/' . $interest->id . '/edit') }}"
                                            class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ url("interest/destroy")}}" class="mr-1" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $interest->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"> <i
                                                    class="fas fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">
                                        <h5 class="text-center">No Interest Found.</h5>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                        {{ $interests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection