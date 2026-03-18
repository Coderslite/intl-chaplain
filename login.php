<?php
session_start();
include "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = 'cae3400763ab3df6a09d331df838dd314f6a57a9';
    window.smartsupp || (function (d) {
        var s, c, o = smartsupp = function () { o._.push(arguments) }; o._ = [];
        s = d.getElementsByTagName('script')[0]; c = d.createElement('script');
        c.type = 'text/javascript'; c.charset = 'utf-8'; c.async = true;
        c.src = 'https://www.smartsuppchat.com/loader.js?'; s.parentNode.insertBefore(c, s);
    })(document);
</script>
<noscript>Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>


<!-- Mirrored from corporx.themetags.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Mar 2026 00:14:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--favicon icon-->
    <link rel="icon" href="assets/img/client-logos/logo.png" type="image/png" sizes="16x16">

    <!--title-->
    <title>Login - Corporate and Business HTML Template</title>

    <!--build:css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- endbuild -->
</head>

<body>

    <!--preloader start-->
    <div id="preloader">
        <div class="loader1">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!--preloader end-->
    <div class="main">

        <!--sign up section start-->
        <section class="section section-lg py-0 min-vh-100 bg-soft">
            <div class="container-fluid p-0">
                <div class="row align-items-center min-vh-100 justify-content-center no-gutters">
                    <div class="col-12 col-md-7 col-lg-8 col-xl-8 d-none d-md-none d-xl-block"
                        style="background-image: url('assets/img/img1.jpeg'); background-size: bottom-center;">
                        <!-- Image -->
                        <div class="d-flex align-items-center min-vh-100 bg-gradient-primary text-white">
                            <div class="position-relative w-75 p-8">
                                <h1 class="display-2">Welcome Back</h1>
                                <p class="lead">Sign in to continue to your account</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-4 col-xl-4">
                        <div class="login-signup-wrap bg-soft p-5 p-md-4 px-lg-6">
                            <!-- Heading -->
                            <h3 class="text-center">Sign In</h3>

                            <!-- Subheading -->
                            <p class="text-muted text-center mb-5">
                                Sign in to your account to continue.
                            </p>
                            <?php
                            echo SuccessMessage();
                            echo ErrorMessage();

                            ?>

                            <!-- Form -->
                            <form class="login-signup-form" action="https://chap.intlchaplains.com/php/login.php"
                                method="POST">
                                <div class="form-group">
                                    <label class="font-weight-bold">Email Address</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <i class="ti-email"></i>
                                        </div>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="name@yourdomain.com" required>
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="font-weight-bold">Password</label>
                                        </div>
                                        <div class="col-auto">

                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <i class="ti-lock"></i>
                                        </div>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Enter your password">
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button class="btn btn-block btn-secondary mt-4 mb-3">Sign in</button>

                            </form>
                        </div>
                    </div>
                </div> <!-- / .row -->
            </div>
        </section>
        <!--sign up section end-->

    </div>

    <!--scroll bottom to top button start-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </button>
    <!--scroll bottom to top button end-->
    <!--build:js-->
    <script src="assets/js/vendors/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendors/popper.min.js"></script>
    <script src="assets/js/vendors/bootstrap.min.js"></script>
    <script src="assets/js/vendors/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/vendors/jquery.easing.min.js"></script>
    <script src="assets/js/vendors/mixitup.min.js"></script>
    <script src="assets/js/vendors/headroom.min.js"></script>
    <script src="assets/js/vendors/smooth-scroll.min.js"></script>
    <script src="assets/js/vendors/wow.min.js"></script>
    <script src="assets/js/vendors/owl.carousel.min.js"></script>
    <script src="assets/js/vendors/jquery.waypoints.min.js"></script>
    <!--<script src="assets/js/vendors/countUp.min.js"></script>-->
    <script src="assets/js/vendors/jquery.countdown.min.js"></script>
    <script src="assets/js/vendors/validator.min.js"></script>
    <script src="assets/js/app.js"></script>
    <!--endbuild-->
</body>


<!-- Mirrored from corporx.themetags.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Mar 2026 00:14:56 GMT -->

</html>