@extends('frontend.layouts.app')
@section('title') {{ $category->name }} @endsection
@section('content')
    <div class="inner-banner">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    @if($category->id == 1)
        <div class="live-auction pb-60" style="margin-top: 50px">
            <img alt="image" src="{{ url('assets/frontend/images/bg/section-bg.png') }}" class="img-fluid section-bg">
            <div class="container position-relative">
                <img alt="image" src="{{ url('assets/frontend/images/bg/dotted1.png') }}" class="dotted1">
                <img alt="image" src="{{ url('assets/frontend/images/bg/dotted1.png') }}" class="dotted2">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                        <div class="section-title1">
                            <h2>Live Auction</h2>
                            <p class="mb-0">Explore on the world's best & largest Bidding marketplace with our beautiful
                                Bidding
                                products. We want to be a part of your smile, success and future growth.</p>
                        </div>
                    </div>
                </div>
                <div class="row gy-4 mb-60 d-flex justify-content-center">
                    @if($products->count() > 0)
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-10 ">
                                <div data-wow-duration="1.5s" data-wow-delay="0.2s"
                                     class="eg-card auction-card1 wow animate fadeInDown">
                                    <div class="auction-img">
                                        <img alt="image" src="{{ url($product->photo_path) }}" height="234" width="100%">
                                        @if($product->user_name)
                                            <div class="author-area">
                                                <div class="author-emo">
                                                    <img alt="image" src="{{ !$product->user_photo ? url('assets/backend/img/image.webp') : url('uploads/profile/'.$product->user_photo) }}" title="{{ $product->email }}" height="30" width="30" style="border-radius: 50%;">
                                                </div>
                                                <div class="author-name" style="overflow: hidden">
                                                    <span>by @ {{ $product->user_name }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="auction-content">
                                        <h4><a href="{{ route('product-details',$product->slug) }}">{{ $product->title  }}</a></h4>
                                        <p>Bidding Price : <span><span>BDT {{ $product->price }}</span></span></p>
                                        <div class="auction-card-bttm">
                                            <a href="{{ route('product-details',$product->slug) }}" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @elseif($category->id == 3)
        <div class="upcoming-seciton pb-80" style="margin-top: 50px">
            <img alt="image" src="{{ url('assets/frontend/images/bg/section-bg.png') }}" class="img-fluid section-bg" />
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                        <div class="section-title1">
                            <h2>Pre-Biding Auction</h2>
                            <p class="mb-0">
                                Explore on the world's best & largest Bidding marketplace with
                                our beautiful Bidding products. We want to be a part of your
                                smile, success and future growth.
                            </p>
                        </div>
                    </div>
                </div>
                @if($products->count() > 0)
                    <div class="row gy-4 mb-60 d-flex justify-content-center">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-10">
                                <div data-wow-duration="1.5s" data-wow-delay=".4s" class="eg-card auction-card1 wow animate fadeInDown">
                                    <div class="auction-img">
                                        <img alt="image" src="{{ url($product->photo_path) }}" height="234" width="100%">
                                        <div class="auction-timer">
                                            <div class="countdown" id="timer5">
                                                <h4><span id="hours5">05</span>H : <span id="minutes5">52</span>M : <span id="seconds5">32</span>S</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="auction-content">
                                        <h4><a href="{{ route('product-details',$product->slug) }}">{{ $product->title  }}</a></h4>
                                        <p>Bidding Price : <span><span>BDT {{ $product->price }}</span></span></p>
                                        <div class="auction-card-bttm">
                                            <a href="{{ route('product-details',$product->slug) }}" class="eg-btn btn--primary btn--sm">Place a Bid</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="upcoming-seciton pb-80" style="margin-top: 50px">
            <img alt="image" src="{{ url('assets/frontend/images/bg/section-bg.png') }}" class="img-fluid section-bg" />
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                        <div class="section-title1">
                            <h2>Upcoming Auction</h2>
                            <p class="mb-0">
                                Explore on the world's best & largest Bidding marketplace with
                                our beautiful Bidding products. We want to be a part of your
                                smile, success and future growth.
                            </p>
                        </div>
                    </div>
                </div>
                @if($products->count() > 0)
                    <div class="row gy-4 mb-60 d-flex justify-content-center">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-10">
                                <div data-wow-duration="1.5s" data-wow-delay=".4s" class="eg-card auction-card1 wow animate fadeInDown">
                                    <div class="auction-img">
                                        <img alt="image" src="{{ url($product->photo_path) }}" height="234" width="100%">
                                        <div class="auction-timer">
                                            <div class="countdown">
                                                <h4><small>{{ \Carbon\Carbon::parse($product->end_time)->format('d M, Y') }}</small></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="auction-content">
                                        <h4><a href="{{ route('product-details',$product->slug) }}">{{ $product->title  }}</a></h4>
                                        <p>Bidding Price : <span><span>BDT {{ $product->price }}</span></span></p>
                                        <div class="auction-card-bttm">
                                            <a href="{{ route('product-details',$product->slug) }}" class="eg-btn btn--primary btn--sm">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection



