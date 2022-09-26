<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo-egenslab.b-cdn.net/html/bidout/preview/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Aug 2022 07:06:31 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidout - Auction and Bidding HTML Template</title>
    <link rel="icon" href="{{ url('assets/frontend/images/bg/sm-logo.png') }}" type="image/gif" sizes="20x20">
    {!! Html::style('assets/frontend/css/animate.css') !!}
    {!! Html::style('assets/frontend/css/all.css') !!}
    {!! Html::style('assets/frontend/css/bootstrap.min.css') !!}
    {!! Html::style('assets/frontend/css/boxicons.min.css') !!}
    {!! Html::style('assets/frontend/css/bootstrap-icons.css') !!}
    {!! Html::style('assets/frontend/css/jquery-ui.css') !!}
    {!! Html::style('assets/frontend/css/swiper-bundle.min.css') !!}
    {!! Html::style('assets/frontend/css/slick-theme.css') !!}
    {!! Html::style('assets/frontend/css/slick.css') !!}
    {!! Html::style('assets/frontend/css/nice-select.css') !!}
    {!! Html::style('assets/frontend/css/magnific-popup.css') !!}
    {!! Html::style('assets/frontend/css/odometer.css') !!}
    {!! Html::style('assets/frontend/css/style.css') !!}
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



<div class="mobile-search">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <label>What are you lookking for?</label>
                <input type="text" placeholder="Search Products, Category, Brand">
            </div>
            <div class="col-1 d-flex justify-content-end align-items-center">
                <div class="search-cross-btn">
                    <i class="bi bi-x"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="topbar">
    <div class="topbar-left d-flex flex-row align-items-center">
        <h6>Follow Us</h6>
        <ul class="topbar-social-list gap-2">
            <li><a href="https://www.facebook.com/"><i class='bx bxl-facebook'></i></a></li>
            <li><a href="https://www.twitter.com/"><i class='bx bxl-twitter'></i></a></li>
            <li><a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a></li>
            <li><a href="https://www.pinterest.com/"><i class='bx bxl-pinterest-alt'></i></a></li>
        </ul>
    </div>
    <div class="email-area">
        <h6>Email: <a href="https://demo-egenslab.b-cdn.net/cdn-cgi/l/email-protection#6c0f0302180d0f182c09140d011c0009420f0301"><span class="__cf_email__" data-cfemail="a6c5c9c8d2c7c5d2e6c3dec7cbd6cac388c5c9cb">[email&#160;protected]</span></a></h6>
    </div>
    <div class="topbar-right gap-2">
        <a href="join-merchant.html">Join Merchant</a>
        <select>
            <option>USD</option>
            <option>EURO</option>
            <option>TAKA</option>
            <option>RUPEE</option>
        </select>
    </div>
</div>

<header class="header-area style-1">
    <div class="header-logo">
        <a href="index.html"><img alt="image" src="assets/images/bg/header-logo.png"></a>
    </div>
    <div class="main-menu">
        <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
            <div class="mobile-logo-wrap ">
                <a href="index.html"><img alt="image" src="assets/images/bg/header-logo.png"></a>
            </div>
            <div class="menu-close-btn">
                <i class="bi bi-x-lg"></i>
            </div>
        </div>
        <ul class="menu-list">
            <li class="menu-item-has-children">
                <a href="#" class="drop-down">Home</a><i class='bx bx-plus dropdown-icon'></i>
                <ul class="submenu">
                    <li><a href="index.html">Home 1</a></li>
                    <li><a href="index2.html">Home 2</a></li>
                    <li><a href="index3.html">Home 3</a></li>
                </ul>
            </li>
            <li>
                <a href="about.html">About Us</a>
            </li>
            <li>
                <a href="how-works.html">How It Works</a>
            </li>
            <li>
                <a href="live-auction.html">Browse Product</a>
            </li>
            <li class="menu-item-has-children">
                <a href="#">News</a><i class='bx bx-plus dropdown-icon'></i>
                <ul class="submenu">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="#" class="drop-down">Pages</a><i class='bx bx-plus dropdown-icon'></i>
                <ul class="submenu">
                    <li><a href="auction-details.html">Auction Details</a></li>
                    <li><a href="faq.html">Faq</a></li>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="signup.html">Sign Up</a></li>
                    <li><a href="404.html">404</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
        </ul>

        <div class="d-lg-none d-block">
            <form class="mobile-menu-form">
                <div class="input-with-btn d-flex flex-column">
                    <input type="text" placeholder="Search here...">
                    <button type="submit" class="eg-btn btn--primary btn--sm">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="nav-right d-flex align-items-center">
        <div class="hotline d-xxl-flex d-none">
            <div class="hotline-icon">
                <img alt="image" src="assets/images/icons/header-phone.svg">
            </div>
            <div class="hotline-info">
                <span>Click To Call</span>
                <h6><a href="tel:347-274-8816">+347-274-8816</a></h6>
            </div>
        </div>
        <div class="search-btn">
            <i class="bi bi-search"></i>
        </div>
        <div class="eg-btn btn--primary header-btn">
            <a href="dashboard.html">My Account</a>
        </div>
        <div class="mobile-menu-btn d-lg-none d-block">
            <i class='bx bx-menu'></i>
        </div>
    </div>
</header>


<div class="inner-banner">
    <div class="container">
        <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">Contact Us</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
</div>

<div class="contact-section pt-120 pb-120">
    <img alt="image" src="assets/images/bg/section-bg.png" class="img-fluid section-bg-top">
    <img alt="image" src="assets/images/bg/section-bg.png" class="img-fluid section-bg-bottom">
    <div class="container">
        <div class="row pb-120 mb-70 g-4 d-flex justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="contact-signle hover-border1 d-flex flex-row align-items-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                    <div class="icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="text">
                        <h4>Location</h4>
                        <p>168/170, Ave 01,Old York Drive Rich Mirpur, Dhaka</p>
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
                        <a href="tel:+880171-770000">+02 135498 26649</a>
                        <a href="tel:+8801761111456">+8801761111456</a>
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
                        <a href="https://demo-egenslab.b-cdn.net/cdn-cgi/l/email-protection#31585f575e715449505c415d541f525e5c"><span class="__cf_email__" data-cfemail="6f060109002f0a170e021f030a410c0002">[email&#160;protected]</span></a>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6255252.31904332!2d-106.08810052683293!3d40.04590513383155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1650355365902!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about-us-counter pb-120">
    <div class="container">
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                <div class="counter-single text-center d-flex flex-row hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                    <div class="counter-icon"> <img alt="image" src="assets/images/icons/employee.svg"> </div>
                    <div class="coundown d-flex flex-column">
                        <h3 class="odometer" data-odometer-final="5400">&nbsp;</h3>
                        <p>Happy Customer</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                <div class="counter-single text-center d-flex flex-row hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
                    <div class="counter-icon"> <img alt="image" src="assets/images/icons/review.svg"> </div>
                    <div class="coundown d-flex flex-column">
                        <h3 class="odometer" data-odometer-final="1250">&nbsp;</h3>
                        <p>Good Reviews</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                <div class="counter-single text-center d-flex flex-row hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
                    <div class="counter-icon"> <img alt="image" src="assets/images/icons/smily.svg"> </div>
                    <div class="coundown d-flex flex-column">
                        <h3 class="odometer" data-odometer-final="4250">&nbsp;</h3>
                        <p>Winner Customer</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-10">
                <div class="counter-single text-center d-flex flex-row hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".8s">
                    <div class="counter-icon"> <img alt="image" src="assets/images/icons/comment.svg"> </div>
                    <div class="coundown d-flex flex-column">
                        <h3 class="odometer" data-odometer-final="500">&nbsp;</h3>
                        <p>New Comments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <a href="index.html"><img alt="image" src="assets/images/bg/footer-logo.png"></a>
                        <p>Lorem ipsum dolor sit amet consecte tur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore.</p>
                        <form>
                            <div class="input-with-btn d-flex jusify-content-start align-items-strech">
                                <input type="text" placeholder="Enter your email">
                                <button type="submit"><img alt="image" src="assets/images/icons/send-icon.svg"></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex justify-content-lg-center">
                    <div class="footer-item">
                        <h5>Navigation</h5>
                        <ul class="footer-list">
                            <li><a href="live-auction.html">All Product</a></li>
                            <li><a href="how-works.html">How It Works</a></li>
                            <li><a href="login.html">My Account</a></li>
                            <li><a href="about.html">About Company</a></li>
                            <li><a href="blog.html">Our News Feed</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex justify-content-lg-center">
                    <div class="footer-item">
                        <h5>Help & FAQs</h5>
                        <ul class="footer-list">
                            <li><a href="product.html">Help Center</a></li>
                            <li><a href="faq.html">Customer FAQs</a></li>
                            <li><a href="login.html">Terms and Conditions</a></li>
                            <li><a href="about.html">Security Information</a></li>
                            <li><a href="blog.html">Merchant Add Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h5>Latest Feed</h5>
                        <ul class="recent-feed-list">
                            <li class="single-feed">
                                <div class="feed-img">
                                    <a href="blog-details.html"><img alt="image" src="assets/images/blog/recent-feed1.png"></a>
                                </div>
                                <div class="feed-content">
                                    <span>January 31, 2022</span>
                                    <h6><a href="blog-details.html">Grant Distributions Conti nu to Incr Ease.</a>
                                    </h6>
                                </div>
                            </li>
                            <li class="single-feed">
                                <div class="feed-img">
                                    <a href="blog-details.html"><img alt="image" src="assets/images/blog/recent-feed2.png"></a>
                                </div>
                                <div class="feed-content">
                                    <span>February 21, 2022</span>
                                    <h6><a href="blog-details.html">Seminar for Children to Learn About.</a></h6>
                                </div>
                            </li>
                            <li class="single-feed">
                                <div class="feed-img">
                                    <a href="blog-details.html"><img alt="image" src="assets/images/blog/recent-feed3.png"></a>
                                </div>
                                <div class="feed-content">
                                    <span>March 22, 2022</span>
                                    <h6><a href="blog-details.html">Education and teacher for all African
                                            Children.</a></h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex align-items-center g-4">
                <div class="col-lg-6 d-flex justify-content-lg-start justify-content-center">
                    <p>Copyright 2022 <a href="#">Bid Out</a> | Design By <a href="https://www.egenslab.com/" class="egns-lab">Egens Lab</a></p>
                </div>
                <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center align-items-center flex-sm-nowrap flex-wrap">
                    <p class="d-sm-flex d-none">We Accepts:</p>
                    <ul class="footer-logo-list">
                        <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay1.png"></a></li>
                        <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay2.png"></a></li>
                        <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay3.png"></a></li>
                        <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay4.png"></a></li>
                        <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay5.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


{{--<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>--}}

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
</body>
</html>
