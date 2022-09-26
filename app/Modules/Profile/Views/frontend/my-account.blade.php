<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!-- Title -->
    <title>Login</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/frontend/favicon/favicon.png">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/frontend/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/frontend/css/font-electro.css">
    <link rel="stylesheet" href="/assets/frontend/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="/assets/frontend/vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet" href="/assets/frontend/vendor/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="/assets/frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/assets/frontend/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="/assets/frontend/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/assets/frontend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

    <!-- CSS Electro Template -->
    <link rel="stylesheet" href="/assets/frontend/css/theme.css">
</head>

<body>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Title -->
                <div class="border-bottom border-color-1 mb-6">
                    <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Login</h3>
                </div>
                <p class="text-gray-90 mb-4">Welcome back! Sign in to your account.</p>
                <!-- End Title -->
                <form class="js-validate" novalidate="novalidate">
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="form-label" for="signinSrEmailExample3">Username or Email address
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" id="signinSrEmailExample3" placeholder="Username or Email address" aria-label="Username or Email address" required
                               data-msg="Please enter a valid email address."
                               data-error-class="u-has-error"
                               data-success-class="u-has-success">
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="form-label" for="signinSrPasswordExample2">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="signinSrPasswordExample2" placeholder="Password" aria-label="Password" required
                               data-msg="Your password is invalid. Please try again."
                               data-error-class="u-has-error"
                               data-success-class="u-has-success">
                    </div>
                    <!-- End Form Group -->

                    <!-- Checkbox -->
                    <div class="js-form-message mb-3">
                        <div class="custom-control custom-checkbox d-flex align-items-center">
                            <input type="checkbox" class="custom-control-input" id="rememberCheckbox" name="rememberCheckbox" required
                                   data-error-class="u-has-error"
                                   data-success-class="u-has-success">
                            <label class="custom-control-label form-label" for="rememberCheckbox">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <!-- End Checkbox -->

                    <!-- Button -->
                    <div class="mb-1">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary-dark-w px-5">Login</button>
                        </div>
                        <div class="mb-2">
                            <a class="text-blue" href="#">Lost your password?</a>
                        </div>
                    </div>
                    <!-- End Button -->
                </form>
            </div>
        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- JS Global Compulsory -->
<script src="/assets/frontend/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/frontend/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets/frontend/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="/assets/frontend/vendor/bootstrap/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets/frontend/vendor/appear.js"></script>
<script src="/assets/frontend/vendor/jquery.countdown.min.js"></script>
<script src="/assets/frontend/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="/assets/frontend/vendor/svg-injector/dist/svg-injector.min.js"></script>
<script src="/assets/frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/assets/frontend/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/assets/frontend/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="/assets/frontend/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="/assets/frontend/vendor/typed.js/lib/typed.min.js"></script>
<script src="/assets/frontend/vendor/slick-carousel/slick/slick.js"></script>
<script src="/assets/frontend/vendor/appear.js"></script>
<script src="/assets/frontend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- JS Electro -->
<script src="/assets/frontend/js/hs.core.js"></script>
<script src="/assets/frontend/js/components/hs.countdown.js"></script>
<script src="/assets/frontend/js/components/hs.header.js"></script>
<script src="/assets/frontend/js/components/hs.hamburgers.js"></script>
<script src="/assets/frontend/js/components/hs.unfold.js"></script>
<script src="/assets/frontend/js/components/hs.focus-state.js"></script>
<script src="/assets/frontend/js/components/hs.malihu-scrollbar.js"></script>
<script src="/assets/frontend/js/components/hs.validation.js"></script>
<script src="/assets/frontend/js/components/hs.fancybox.js"></script>
<script src="/assets/frontend/js/components/hs.onscroll-animation.js"></script>
<script src="/assets/frontend/js/components/hs.slick-carousel.js"></script>
<script src="/assets/frontend/js/components/hs.quantity-counter.js"></script>
<script src="/assets/frontend/js/components/hs.range-slider.js"></script>
<script src="/assets/frontend/js/components/hs.show-animation.js"></script>
<script src="/assets/frontend/js/components/hs.svg-injector.js"></script>
<script src="/assets/frontend/js/components/hs.scroll-nav.js"></script>
<script src="/assets/frontend/js/components/hs.go-to.js"></script>
<script src="/assets/frontend/js/components/hs.selectpicker.js"></script>
</body>
</html>
