@extends('frontend.layouts.app')
@section('title') Register @endsection
@section('header-css')
    {!! Html::style('assets/backend/plugins/datetimepicker/css/bootstrap-timepicker.min.css') !!}
    {!! Html::style('assets/backend/plugins/datetimepicker/css/bootstrap-datetimepicker-standalone.css') !!}
    {!! Html::style('assets/backend/plugins/datetimepicker/css/bootstrap-datetimepicker2.min.css') !!}
@endsection
@section('content')
    <div class="inner-banner">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="signup-section pt-120 pb-120">
        <img alt="image" src="assets/frontend/images/bg/section-bg.png" class="section-bg-top">
        <img alt="image" src="assets/frontend/images/bg/section-bg.png" class="section-bg-bottom">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="form-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                        <div class="form-title">
                            <h3>Register</h3>
                            <p>Do you already have an account? <a href="{{ url('/login') }}">Login here</a></p>
                        </div>
                        {!! Form::open(['url'=>'/signup','method'=>'post','class'=>'w-100']) !!}
                            <div class="row">
                                @include('backend.includes.messages')
                                <div class="col-md-12">
                                    <div class="form-inner">
                                        {!! Form::label('name','Full Name',['class'=>'required-star']) !!}
                                        {!! Form::text('name','',['class'=>$errors->has('name')?'form-control is-invalid':'form-control','placeholder'=>'Enter your name']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner">
                                        {!! Form::label('email','Email',['class'=>'required-star']) !!}
                                        {!! Form::email('email','',['class'=>$errors->has('email')?'form-control is-invalid':'form-control','placeholder'=>'Email Address']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner">
                                        {!! Form::label('password','Password',['class'=>'required-star']) !!}
                                        {!! Form::password('password',['class'=>$errors->has('password')?'form-control is-invalid':'form-control','id'=>'password-field','placeholder'=>'******']) !!}
                                        <i toggle="#password-field" class="bi bi-eye-slash toggle-password pointer"></i>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-inner">
                                        {!! Form::label('confirm_password','Confirm Password',['class'=>'required-star']) !!}
                                        {!! Form::password('confirm_password',['class'=>$errors->has('confirm_password')?'form-control is-invalid':'form-control','id'=>'confirm-password','placeholder'=>'******']) !!}
                                        <i toggle="#confirm-password" class="bi bi-eye-slash toggle-password pointer"></i>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner">
                                        {!! Form::label('nid','NID Number',['class'=>'required-star']) !!}
                                        {!! Form::number('nid','',['class'=>'required form-control '.($errors->has('nid')?'is-invalid':''),'placeholder'=>'NID number']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner">
                                        {!! Form::label('date_of_birth','Birthday',['class'=>'required-star']) !!}
                                        {!! Form::text('date_of_birth','',['class'=>'required form-control date-picker '.($errors->has('date_of_birth')?'is-invalid':''),'placeholder'=>'YYYY-MM-DD']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner">
                                        {!! Form::label('passport','Passport Number',['class'=>'required-star']) !!}
                                        {!! Form::text('passport','',['class'=>'form-control','placeholder'=>'Passport number']) !!}
                                    </div>
                                </div>
                            </div>
                        {!! Form::submit('Register',['class'=>'account-btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer-script')
    {!! Html::script('assets/backend/plugins/datetimepicker/js/bootstrap-timepicker.min.js') !!}
    {!! Html::script('assets/backend/plugins/datetimepicker/js/bootstrap.min.js') !!}
    {!! Html::script('assets/backend/plugins/datetimepicker/js/moment.min.js') !!}
    {!! Html::script('assets/backend/plugins/datetimepicker/js/bootstrap-datetimepicker2.min.js') !!}
    <script type="text/javascript">
        /*********************************
         DATEPICKER SCRIPTING START HERE
         ********************************/
        $('.date-picker').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                date: "fa fa-calendar",
                previous:"fa fa-angle-left",
                next:"fa fa-angle-right"
            }
        });

        /*********************************
         PASSWORD VIEW TOGGLE START HERE
         ********************************/
        $(".toggle-password").click(function() {
            $(this).toggleClass("bi bi-eye bi-eye-slash");
            let input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection
