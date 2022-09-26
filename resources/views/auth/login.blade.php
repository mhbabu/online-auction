@extends('frontend.layouts.app')
@section('title') Login @endsection
@section('content')
    <div class="inner-banner">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="login-section pt-120 pb-120">
        <img alt="imges" src="assets/frontend/images/bg/section-bg.png" class="img-fluid section-bg-top">
        <img alt="imges" src="assets/frontend/images/bg/section-bg.png" class="img-fluid section-bg-bottom">
        <div class="container">
            <div class="row d-flex justify-content-center g-4">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="form-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                        <div class="form-title">
                            <h3>Login <small>to your account.</small></h3>
                            <p>New Member? <a href="{{ url('/register') }}">register here</a></p>
                        </div>

                        {!! Form::open(['url'=>'login','method'=>'post','class'=>'w-100']) !!}
                        <div class="row">
                            <div class="col-12">
                                <p class="m-2">@include('backend.includes.messages')</p>
                                <div class="form-inner">
                                    {!! Form::label('email','Email',['class'=>'required-star']) !!}
                                    {!! Form::email('email','',['class'=>$errors->has('email')?'is-invalid':'','placeholder'=>'Email Address']) !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-inner">
                                    {!! Form::label('password','Password',['class'=>'required-star']) !!}
                                    {!! Form::password('password',['class'=>$errors->has('password')?'is-invalid':'','id'=>'password-field','placeholder'=>'******']) !!}
                                    <i toggle="#password-field" class="bi bi-eye-slash toggle-password pointer"></i>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-agreement form-inner">
                                    <div class="form-group">
{{--                                        <input type="checkbox" id="html">--}}
{{--                                        <label for="html">Remember Me</label>--}}
                                    </div>
{{--                                    <a href="{{ url('/forget-password') }}">Forgot Password?</a>--}}
                                </div>
                            </div>

                        </div>
                        {!! Form::submit('Login',['class'=>'account-btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer-script')
    <script type="text/javascript">
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
