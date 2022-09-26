@extends('frontend.layouts.app')
@section('title','Forget Password')
@section('content')
    <!-- bread crumb start -->
    <nav class="breadcrumb-section bg-white pt-5 pb-6rem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Forgot Password ?</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb end -->
    <!-- my-account start -->
    <div class="my-account pb-6rem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title"> You forgot your password? Here you can easily retrieve a new password.</h3>
                    @include('backend.includes.messages')
                    {!! Form::open(['url'=>'forget-password-request','method'=>'post','class'=>'log-in-form']) !!}
                    <div class="form-group row">
                        {!! Form::label('email','Email',['class'=>'col-md-3 col-form-label required-star']) !!}
                        <div class="col-md-6">
                            {!! Form::email('email','',['class'=>$errors->has('email')?'form-control is-invalid':'form-control','placeholder'=>'Email Address']) !!}
                        </div>
                    </div>
                    <div class="form-group row pb-3 text-center">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                                <div class="sign-btn">
                                    {!! Form::submit('Request New Password',['class'=>'btn btn-dark3']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- my-account end -->
@endsection
