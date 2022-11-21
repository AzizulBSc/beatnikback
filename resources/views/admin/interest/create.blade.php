@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create interest</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">interest list</a></li> --}}
                    <li class="breadcrumb-item active">Create interest</li>
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
                            <h3 class="card-title">Add interest</h3>
                            <a href="{{ url('/interest') }}" class="btn btn-primary">Go Back to interest List</a>

                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ url('interest') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        {{-- @include('includes.errors') --}}
                                        <div class="form-group">
                                            <label for="bankid">Bank</label>

                                            <select name="bankid" id="bankid" class="form-control">
                                                <option value="" style="display: none" selected>Select Bank</option>
                                                @foreach($banks as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="duration">Duration</label>

                                            <select name="duration" id="duration" class="form-control">
                                                <option value="" style="display: none" selected>Select Duration In
                                                    Months</option>
                                                <option value=3>3 Months</option>
                                                <option value=4>4 Months</option>
                                                <option value=6>6 Moths</option>
                                                <option value=8>8 Months</option>
                                                <option value=10>10 Months</option>
                                                <option value=12>12 Months</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Interest Rate (%)</label>
                                            <input type="number" step="any" name="rate" value="" class="form-control"
                                                placeholder="Enter interest Rate" required>
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