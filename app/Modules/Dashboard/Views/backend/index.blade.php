@extends('backend.layouts.app')
@section('content')
    <!-- Info boxes -->
    <div class="row">
        @if(auth()->user()->user_type != '1x101')
        <div class="col-12 col-sm-6 col-md-3">
            <p>Welcome to <strong class="text-success">{{ auth()->user()->name }}</strong> to our system.</p>
        </div>
        @endif
        @if(isset($totalUsers) && auth()->user()->user_type == '1x101')
        <div class="col-12 col-sm-6 col-md-3">

            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1">
                    <i class="fas fa-users"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number">{{ $totalUsers }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endif
        @if(isset($totalProduct) && auth()->user()->type == '1x101')
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1">
                    <i class="fab fa-product-hunt"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Products</span>
                    <span class="info-box-number">{{ $totalProduct }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endif
    </div>
@endsection
