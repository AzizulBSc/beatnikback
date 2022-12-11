@extends('layouts.app')

@section('content')

<div class="card-body login-card-body">
    <p class="login-box-msg">OTP Verification</p>

    <form method="POST" action="{{ route('otp') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group mb-3">
            <input id="otp" type="text" class="form-control" name="otp" required autocomplete="current-otp">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="alert alert-dismissible {{$alert}}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> {{ $message }}</h5>
               
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-7">
                <button type="submit" class="btn btn-primary">Submit OTP</button>
            </div>
            <div class="col-2"></div>
        </div>
    </form>
</div>
@endsection