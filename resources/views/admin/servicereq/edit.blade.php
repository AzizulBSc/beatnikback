@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Service Request Update</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('servicereq') }}">Service Request list</a></li>
                    <li class="breadcrumb-item active">Update Service Request</li>
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
                        <h3 class="card-title">Service Request <small>Update</small></h3>
                    </div>

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ URL::to('servicereq',[$servicereq->id]) }}" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row form-group">
                                            <div class="col-lg-6 col-sm-12">
                                                <label for="customer_id">Vehicle Owner</label>
                                                <div class="text-danger"> Owner:{{ $servicereq->owner->name }}({{
                                                    $servicereq->owner->id }})
                                                </div>
                                                <select name="customer_id" id="customer_id"
                                                    class="form-control select2 select2-success"
                                                    data-dropdown-css-class="select2-success" required>
                                                    <option value="" style=" display: none" selected>Select Vehicle
                                                        Owner
                                                    </option>
                                                    @foreach ($customers as $customer )
                                                    <option value={{ $customer->id }}>{{ $customer->name }}({{
                                                        $customer->id }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <label for="vehicle_id">Vehicle </label>
                                                <div class="text-danger"> Vehicle:{{$servicereq->vehicle->name
                                                    }}({{$servicereq->vehicle->model }})</div>
                                                <select name="vehicle_id" id="vehicle" class="form-control" required>
                                                    <option value="">Select Updated Vehicle
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- /.col -->
                                        <div class="row form-group">
                                            <div class="col-lg-6 col-sm-12">

                                                <label>Service </label>
                                                <div class="select2-success">
                                                    <div class="text-danger">
                                                        @foreach($servicereq->req_service_list as $service)
                                                        {{ $service->service->name }}({{$service->service->id}} ),
                                                        @endforeach</div>
                                                    <select name="" class="select2" multiple="multiple"
                                                        data-placeholder="Select Service"
                                                        data-dropdown-css-class="select2-purple" style="width: 100%;"
                                                        type="number" id="selectservice" required>
                                                        <option value="">Select Service
                                                        </option>
                                                        @foreach ($services as $service )
                                                        <option value=" {{$service->id }},{{$service->price }}">{{
                                                            $service->name }}({{
                                                            $service->id }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="service_id" value="" id="service_id_list">
                                            <!-- /.form-group -->
                                            <div class="col-lg-6 col-sm-12">
                                                <label for="payment">Total Payment</label>
                                                <div class="text-danger">Payment: {{ $servicereq->payment }}</div>
                                                <input name="paymentshow" type="number" id="payment1"
                                                    class="form-control" value="" disabled>
                                                <input name="payment" type="hidden" id="payment" class="form-control"
                                                    value="">
                                            </div>

                                        </div>
                                        <!-- /.col -->



                                        <div class="row form-group">


                                            <div class="col-sm-12 col-lg-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Description</label>

                                                    <div class="text-danger">Old Des: {{ $servicereq->description }}
                                                    </div>

                                                    <textarea name="description" class="form-control" rows="3"
                                                        placeholder="Describe this..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <label>Priliminiry deadline</label>
                                                <div class="text-danger">Old date: {{ $servicereq->deadline }}</div>

                                                <input type="date" name="deadline" class="form-control">

                                            </div>

                                        </div>

                                        @if (Auth::user()->role==1)
                                        <div class="row form-group">
                                            <div class="col-lg-6 col-sm-12">
                                                <label for="mechanic_id">Assign Mechanic</label>
                                                <div class="text-danger">Assigned: {{ $servicereq->mechanic->name }}
                                                </div>
                                                <select name="mechanic_id" id="mechanic_id" class="form-control"
                                                    required>
                                                    <option value="0" style="display: none" selected>Select Mechanic
                                                    </option>
                                                    @foreach ($mechanics as $mechanic )
                                                    <option value={{ $mechanic->id }}>{{ $mechanic->name }}({{
                                                        $mechanic->id }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                @php

                                                $statcode = $servicereq->status;
                                                if($statcode==0) {
                                                $status = "Cancelled";
                                                }
                                                if($statcode==1) {
                                                $status = "Requested";
                                                }
                                                if($statcode==2) {
                                                $status = "Accepted";
                                                }
                                                if($statcode==3) {
                                                $status = "Inprogress";
                                                }
                                                if($statcode==4) {
                                                $status = "Completed";
                                                }
                                                if($statcode==5) {
                                                $status = "Paid";
                                                }
                                                if($statcode==6) {
                                                $status = "Delivered";
                                                }
                                                if($statcode==7) {
                                                $status = "Closed";
                                                }
                                                @endphp



                                                <label for="status">Status </label>
                                                <div class="text-danger">Status: {{ $status }}</div>

                                                <select name="status" id="status" class="form-control" required>
                                                    <option value=1>Requested</option>
                                                    <option value=2>Confirmed</option>
                                                    <option value=3>Inprogress</option>
                                                    <option value=4>Completed</option>
                                                    <option value=5>Paid</option>
                                                    <option value=6>Delivered</option>
                                                    <option value=7>Closed</option>
                                                    <option value=0>Cancelled</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">


                                            <div class="col-lg-6 col-sm-12">
                                                <label for="paid">Cash Paid</label>
                                                <div class="text-danger">Paid :{{ $servicereq->paid }}</div>
                                                <input name="paid" type="number" class="form-control" value="">
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group col-12">
                                        <button type="submit" name="servicereq_submit"
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
<script type="text/javascript">
    $(document).ready(function () {
        
           $('#customer_id').change(function () {
             var id = $(this).val();

           
             $('#vehicle').find('option').not(':first').remove();

             $.ajax({
                url:"{{ url('vehicledata')}}"+'/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].name;
                             var model = response.data[i].model;
                             var option = "<option value="+id+">"+name+"("+model+")</option>"; 
                             $("#vehicle").append(option);
                        }
                    }
                    else{
                        var option = "<option value=>No Vehicle</option>";
                        $("#vehicle").append(option); 
                    }
                }
             })
           });

           var values = [];
           var total;
           var idPricearr;
           var id = [];
        $('#selectservice').change(function () {
           
            values = $('#selectservice option:selected').toArray().map(item=>item.value);
            
            total = 0;
            id = [];
            for(var i = 0;i<values.length;i++){
                idPricearr = values[i].split(",");
                id[i] = parseInt(idPricearr[0]);
                total += parseInt(idPricearr[1]);
                id[i] = parseInt(idPricearr[0]);
            }
            $('#payment').val(total);
            $('#payment1').val(total);
            $('#service_id_list').val(id)
           });





 //Initialize Select2 Elements
 $('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });




        });
</script>
@stop

@endsection