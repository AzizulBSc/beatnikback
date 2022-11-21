@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ 50 }}</h3>

                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen-square"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ 30 }}</h3>

                        <p>Bank</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ 20 }}</h3>

                        <p>Sliders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ 10 }}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Product List</h3>
                            <a href="" class="btn btn-primary">Product List</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Details</th>
                                    <th>Created Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ 1 }}</td>
                                    <td>
                                        <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                            <img src="" class="img-fluid img-rounded" alt="">
                                        </div>
                                    </td>
                                    <td>{{ "name" }}</td>
                                    <td>
                                        {{ "price" }}
                                    </td>
                                    <td>{{ "Details" }}</td>
                                    <td>{{ "date" }}</td>
                                    <td class="d-flex">
                                        action
                                        {{-- <a href="{{ route('Product.show', [1]) }}"
                                            class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                        <a href="{{ route('Product.edit', [1]) }}" class="btn btn-sm btn-primary mr-1">
                                            <i class="fas fa-edit"></i> </a>
                                        <form action="{{ route('Product.destroy', [1]) }}" class="mr-1"
                                            method="Product">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"> <i
                                                    class="fas fa-trash"></i> </button>
                                        </form> --}}
                                    </td>
                                </tr>

                                {{-- @if($Products->count())
                                @foreach ($Products as $Product)
                                <tr>
                                    <td>{{ $Product->id }}</td>
                                    <td>
                                        <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                            <img src="{{ asset($Product->image) }}" class="img-fluid img-rounded"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>{{ $Product->title }}</td>
                                    <td>{{ $Product->category->name }}</td>
                                    <td>
                                        @foreach($Product->tags as $tag)
                                        <span class="badge badge-primary">{{ $tag->name }} </span>
                                        @endforeach
                                    </td>
                                    <td>{{ $Product->user->name }}</td>
                                    <td>{{ $Product->created_at->format('d M, Y') }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('Product.show', [$Product->id]) }}"
                                            class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                        <a href="{{ route('Product.edit', [$Product->id]) }}"
                                            class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form action="{{ route('Product.destroy', [$Product->id]) }}" class="mr-1"
                                            method="Product">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"> <i
                                                    class="fas fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">
                                        <h5 class="text-center">No Products found.</h5>
                                    </td>
                                </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection