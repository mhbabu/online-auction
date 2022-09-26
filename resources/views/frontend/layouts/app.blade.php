<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <title>{{ env('APP_NAME', 'Application') }} | @yield('title', 'Home')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/frontend/images/bg/sm-logo.png" sizes="20x20" />
    {!! Html::style('assets/frontend/css/animate.css') !!}
    {!! Html::style('assets/frontend/css/all.css') !!}
    {!! Html::style('assets/frontend/css/bootstrap.min.css') !!}
    {!! Html::style('assets/backend/dist/css/custom.css') !!}
    {!! Html::style('assets/frontend/css/boxicons.min.css') !!}
    {!! Html::style('/assets/frontend/css/bootstrap-icons.css') !!}
    {!! Html::style('/assets/frontend/css/jquery-ui.css') !!}
    {!! Html::style('/assets/frontend/css/swiper-bundle.min.css') !!}
    {!! Html::style('/assets/frontend/css/slick-theme.css') !!}
    {!! Html::style('/assets/frontend/css/slick.css') !!}
    {!! Html::style('/assets/frontend/css/nice-select.css') !!}
    {!! Html::style('/assets/frontend/css/magnific-popup.css') !!}
    {!! Html::style('/assets/frontend/css/odometer.css') !!}
    {!! Html::style('/assets/backend/plugins/toaster/css/toaster.min.css') !!}
    {!! Html::style('/assets/frontend/css/style.css') !!}

    @yield('header-css')
</head>

<body>

    <div class="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    @include('frontend.includes.header')
    @yield('content')
    @include('frontend.includes.footer')

    {!! Html::script('assets/frontend/js/email-decode.min.js') !!}
    {!! Html::script('assets/frontend/js/jquery-3.6.0.min.js') !!}
    {!! Html::script('assets/frontend/js/jquery-ui.js') !!}
    {!! Html::script('assets/frontend/js/bootstrap.bundle.min.js') !!}
    {!! Html::script('assets/frontend/js/wow.min.js') !!}
    {!! Html::script('assets/frontend/js/swiper-bundle.min.js') !!}
    {!! Html::script('assets/frontend/js/slick.js') !!}
    {!! Html::script('assets/frontend/js/jquery.nice-select.js') !!}
    {!! Html::script('assets/frontend/js/odometer.min.js') !!}
    {!! Html::script('assets/frontend/js/viewport.jquery.js') !!}
    {!! Html::script('assets/frontend/js/jquery.magnific-popup.min.js') !!}
    {!! Html::script('assets/frontend/js/main.js') !!}
    {!! Html::script('/assets/backend/plugins/toaster/js/toaster.min.js') !!}

    @if(session()->has('success'))
        {!! Toastr::success(session('success'), 'Success'); !!}
    @endif

    @if(session()->has('warning'))
        {!! Toastr::warning(session('warning'), 'Warning'); !!}
    @endif

    @if(session()->has('error'))
        {!! Toastr::error(session('error'), 'Error'); !!}
    @endif

    @if(session()->has('info'))
        {!! Toastr::info(session('info'), 'Info'); !!}
    @endif

    {!! Toastr::message() !!}

    @yield('footer-script')

</body>

</html>
