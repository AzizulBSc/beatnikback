@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chat </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="{{ url('') }}">Chat</a></li> --}}
                    <li class="breadcrumb-item active">Chatting</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

<div class="content app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Chat<small>With User</small></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">

                            <div class="col-sm-6 offset-sm-3 my-2">
                                <input type="text" class="form-control" name="username" id="username" value="{{$name}}"
                                    placeholder="Enter a user ..........">
                            </div>

                            <div class="col-sm-6 offset-sm-3">
                                <div class="box box-primary direct-chat direct-chat-primary">

                                    <div class="box-body">
                                        <div class="direct-chat-messages" id="messages"></div>
                                    </div>

                                    <div class="box-footer">
                                        <form action="#" method="post" id="message_form">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="input-group">
                                                <input type="text" name="message" id="message"
                                                    placeholder="Type Message ..." class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="submit" id="send_message"
                                                        class="btn btn-primary btn-flat">Send</button>
                                                </span>
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
    </div>
</div>

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
         });
</script>
@stop
@endsection