<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','Admin Login')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    {!! Html::style('assets/backend/plugins/fontawesome-free/css/all.min.css') !!}
    {!! Html::style('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}
    {!! Html::style('assets/backend/dist/css/adminlte.min.css') !!}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a><b>Password</b> Change</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            @include('backend.includes.messages')
            {!! Form::open(['route'=> 'password.request','method'=>'post']) !!}
            {!! Form::hidden('token',$token) !!}
            {!! Form::hidden('email',$email) !!}
            <div class="form-group">
                <label>Password</label>
                <div class="input-group mb-3">
                    {!! Form::password('password',['class'=>$errors->has('password')?'form-control is-invalid':'form-control','placeholder'=>'Password']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <div class="input-group mb-3">
                    {!! Form::password('password_confirmation',['class'=>$errors->has('password')?'form-control is-invalid':'form-control','placeholder'=>'Password']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {!! Form::submit('Reset Password',['class'=>'form-control btn btn-primary']) !!}
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
{!! Html::script('assets/backend/plugins/jquery/jquery.min.js') !!}
{!! Html::script('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}
{!! Html::script('assets/backend/dist/js/adminlte.min.js') !!}
</body>
</html>



