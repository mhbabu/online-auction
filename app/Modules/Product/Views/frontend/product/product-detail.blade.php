@extends('frontend.layouts.app')
@section('title') Product Details @endsection
@section('content')
<div class="inner-banner">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="auction-details-section pt-120">
    <img alt="image" src="{{ url('/assets/frontend/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
    <img alt="image" src="{{ url('/assets/frontend/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
    <div class="container">
        <div class="row g-4 mb-50">
            <div class="col-xl-6 col-lg-7 d-flex flex-row align-items-start justify-content-lg-start justify-content-center flex-md-nowrap flex-wrap gap-4">
                <ul class="nav small-image-list d-flex flex-md-column flex-row justify-content-center gap-4  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
                    @if($productPhotos->count())
                        @foreach($productPhotos as $key => $photo)
                            <li class="nav-item">
                                <div id="details-img-{{ $key }}" data-bs-toggle="pill" data-bs-target="#gallery-img-{{ $key }}" aria-controls="gallery-img-{{ $key }}">
                                    <img alt="image" src="{{ url($photo->path) }}" class="img-fluid" height="335" width="100%">
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="tab-content mb-4 d-flex justify-content-lg-start justify-content-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                    @if($productPhotos->count())
                        @foreach($productPhotos as $index => $photo)
                            <div class="tab-pane big-image fade show @if(!$index) active @endif" id="gallery-img-{{ $index }}">
                                @if($product->category_id == 1)
                                <div class="auction-gallery-timer d-flex align-items-center justify-content-center flex-wrap">
                                    <h3 id="countdown-timer-{{ $index }}" style="font-size: 25px; font-weight: 700; color: red">Live @if($maxBidingPrice->price)<strong style="color: white; margin-left: 3px" value="0" max="10" id="clock"></strong>@endif</h3>
                                </div>
                                @endif
                                <img alt="image" src="{{ url($photo->path) }}" class="img-fluid" height="120" width="94">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-xl-6 col-lg-5">
                <div class="product-details-right  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                    <h2><small>Biding Type : </small> <strong>{{ $product->product_category_name }}</strong></h2>
                    <h3>{{ $product->title }} - ({{ $product->product_code }})</h3>
                    <p class="para">{{ $product->description }}</p>
                    <h4>Bidding Price: <span>BDT {{ $product->price }} Tk</span></h4>
                    @if($maxBidingPrice->price)
                        <h5>Bided By: <span>{{ $maxBidingPrice->user_name }} ({{ $maxBidingPrice->price }} Tk)</span></h5>
                    @endif
                    <div class="bid-form">
                        <div class="form-title">
                            <h5>Bid Now</h5>
                            <p>Bid Amount : More than {{ $maxBidingPrice->price > 0 ? $maxBidingPrice->price : $product->price }} Tk</p>
                        </div>
                        {!! Form::open(['route'=>['place-bid', $product->id],'method'=>'post']) !!}
                            <div class="form-inner gap-2">
                                <input class="biding-price inputBox" type="number" name="biding_price" placeholder="Enter your price more than {{ $maxBidingPrice->price > 0 ? $maxBidingPrice->price : $product->price  }} Tk" required>
                                @if(in_array($product->category_id,[1,3]) && auth()->user())
                                 <button class="eg-btn btn--primary btn--sm submit-btn submitBtn" type="submit">Place Bid</button>
                                @elseif(!auth()->user())
                                 <a class="eg-btn btn--primary btn--sm guard" data-href="{{ url('/login') }}" style="cursor: pointer;padding: 12px 32px;">Place Bid</a>
                               @endif
                            </div>
                        <label style="margin-top: 10px; font-weight: bold"><input type="checkbox" name="is_confirm" required style="margin-left: 5px"> You have to buy this product if you win this bidding.</label>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-script')
    <script type="text/javascript">
    $(document).on('click','.guard',function () {
        let redirectUrl = $(this).attr("data-href");
        location.href = redirectUrl;
    });

    /***************************************
     START COUNTDOWN SCRIPTING START HERE
     *************************************/
    const maxBidingPrice = "{{ $maxBidingPrice->price }}";
    const productId = "{{ $product->id }}";
   if(maxBidingPrice){
       let timeleft = 10;

       let downloadTimer = setInterval(function(){
           if(timeleft <= 0){
               clearInterval(downloadTimer);
               document.getElementById("clock").innerHTML = "(Finished)";
               window.location = "/send-mail/" + productId;
           } else {
               document.getElementById("clock").innerHTML = `(${timeleft} seconds)`
           }
           timeleft -= 1;
       }, 1000);
   }



    </script>
@endsection
