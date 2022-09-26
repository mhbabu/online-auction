@extends('login.layouts.app')
@section('title','Reset Password')
@section('header')
    <div class="login-logo">
        <a><b>Reset</b> Password</a>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            @include('backend.includes.messages')
            <p class="login-box-msg">Please enter your new password</p>
            {!! Form::open(['url'=>'reset-password-request/'.\App\Libraries\Encryption::encodeId($user->id),'method'=>'post']) !!}
            <div class="form-group">
                <strong><label>New Password</label></strong>
                <div class="input-group mb-3">
                    {!! Form::password('new_password',['class'=>$errors->has('new_password')?'form-control is-invalid':'form-control','placeholder'=>'Password']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <strong><label>Confirm Password</label></strong>
                <div class="input-group mb-3">
                    {!! Form::password('confirm_password',['class'=>$errors->has('confirm_password')?'form-control is-invalid':'form-control','placeholder'=>'Password']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {!! Form::submit('Reset Password',['class'=>'form-control btn btn-warning']) !!}
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
