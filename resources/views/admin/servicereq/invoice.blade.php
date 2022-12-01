@extends('layouts.admin')

@section('content')
{{-- <div class="content-wrapper" style="min-height: 1604.44px;"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to
                        print invoice.
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3" id="print_area">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> XYZ Vehicle Service Center.
                                    <small class="float-right">{{date("Y-m-d H:i:s"); }}
                                    </small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Admin, Inc.</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (804) 123-5432<br>
                                    Email: info@almasaeedstudio.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">

                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{ $servicereq->owner->name}}</strong><br>
                                    {{ $servicereq->owner->address}}<br>
                                    {{ $servicereq->owner->city}},{{ $servicereq->owner->state}},{{
                                    $servicereq->owner->country}}<br>
                                    Phone: {{ $servicereq->owner->phone}}<br>
                                    Email: {{ $servicereq->owner->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Service Name</th>
                                            <th>Description</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($servicereq->req_service_list as $service)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $service->service->name }}</td>
                                            <td>{{ $service->service->description }}</td>
                                            <td>{{ $service->service->price }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <br />
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi consectetur ad
                                    veritatis eum inventore, nulla
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>{{$servicereq->payment }}</td>
                                            </tr>
                                            <tr>
                                                <th>Paid</th>
                                                <td>{{ $servicereq->paid}}</td>
                                            </tr>
                                            <tr> @php

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


                                                <th>Status:</th>
                                                <td> <span class=" text-center ,{{ $statusclass }}">{{ $status }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                {{-- <button type="button" onclick="PrintMe('print_area')"
                                    class="btn btn-primary float-right" style="margin-left: 5px;">
                                    <i class="fas fa-print"></i> Print
                                </button> --}}
                                <button type="button" id="print" class="btn btn-primary"><i class="fas fa-print"></i>
                                    Print</button>

                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    {{--
</div> --}}


@section('script')
<script type="text/javascript">
    $(document).ready(function () {
    $('#print').click(function(){
        var printContents = document.getElementById("print_area").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });
    });
</script>
@stop

@endsection