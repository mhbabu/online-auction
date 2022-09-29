@extends('frontend.layouts.app')
@section('title') Contact Us @endsection
@section('content')
    <div class="inner-banner">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="contact-section pt-120 pb-120">
        <img alt="image" src="assets/frontend/images/bg/section-bg.png" class="img-fluid section-bg-top">
        <img alt="image" src="assets/frontend/images/bg/section-bg.png" class="img-fluid section-bg-bottom">
        <div class="container">
            <div class="row pb-120 mb-70 g-4 d-flex justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="contact-signle hover-border1 d-flex flex-row align-items-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                        <div class="icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="text">
                            <h4>Location</h4>
                            <p>{{ $contactInfo['address'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="contact-signle hover-border1 d-flex flex-row align-items-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
                        <div class="icon">
                            <i class='bx bx-phone-call'></i>
                        </div>
                        <div class="text">
                            <h4>Phone</h4>
                            <a href="tel:{{ $contactInfo['phone'] }}">{{ $contactInfo['phone'] }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="contact-signle hover-border1 d-flex flex-row align-items-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".6s">
                        <div class="icon">
                            <i class='bx bx-envelope'></i>
                        </div>
                        <div class="text">
                            <h4>Email</h4>
                            <a href="https://demo-egenslab.b-cdn.net/cdn-cgi/l/email-protection#52212722223d202612372a333f223e377c313d3f"><span class="__cf_email__" data-cfemail="5b282e2b2b34292f1b3e233a362b373e75383436">[email&#160;protected]</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-wrapper wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                        <div class="form-title2">
                            <h3>Get in Touch</h3>
                            <p class="para">Feel free to ask me any question or let's do to talk about our future collaboration.</p>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="form-inner">
                                        <input type="text" placeholder="Your Name :">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="form-inner">
                                        <input type="email" placeholder="Your Email :">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="form-inner">
                                        <input type="text" placeholder="Your Phone :">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="form-inner">
                                        <input type="text" placeholder="Subject :">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" placeholder="Write Message :" rows="12"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="eg-btn btn--primary btn--md form--btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map-area wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                        <iframe src="{{ $contactInfo['map'] }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



