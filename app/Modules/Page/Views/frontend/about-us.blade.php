@extends('frontend.layouts.app')
@section('title') About Us @endsection
@section('content')
    <div class="inner-banner">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="about-section pt-80 pb-80">
        <img src="/assets/frontend/images/bg/section-bg.png" class="img-fluid section-bg-top" alt="section-bg">
        <div class="container">
            <div class="row d-flex justify-content-center g-4">
                <div class="col-lg-12 col-md-12">
                    @if($about)
                        {!! $about->body !!}
                    @else
                        <h3 class="text-cnter">No Data found</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="about-us-counter pt-80 pb-60">
        <div class="container">
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                    <div class="counter-single text-center d-flex flex-row hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.3s">
                        <div class="counter-icon"> <img src="/assets/frontend/images/icons/employee.svg" alt="employee"></div>
                        <div class="coundown d-flex flex-column">
                            <h3 class="odometer" data-odometer-final="400">&nbsp;</h3>
                            <p>Happy Customer</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                    <div class="counter-single text-center d-flex flex-row hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.6s">
                        <div class="counter-icon"> <img src="/assets/frontend/images/icons/review.svg" alt="review"> </div>
                        <div class="coundown d-flex flex-column">
                            <h3 class="odometer" data-odometer-final="250">&nbsp;</h3>
                            <p>Good Reviews</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                    <div class="counter-single text-center d-flex flex-row hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.9s">
                        <div class="counter-icon"> <img src="/assets/frontend/images/icons/smily.svg" alt="smily"> </div>
                        <div class="coundown d-flex flex-column">
                            <h3 class="odometer" data-odometer-final="350">&nbsp;</h3>
                            <p>Winner Customer</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                    <div class="counter-single text-center d-flex flex-row hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".8s">
                        <div class="counter-icon"> <img src="/assets/frontend/images/icons/comment.svg" alt="comment"> </div>
                        <div class="coundown d-flex flex-column">
                            <h3 class="odometer" data-odometer-final="500">&nbsp;</h3>
                            <p>New Comments</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
