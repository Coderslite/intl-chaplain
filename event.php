<?php
session_start();
include "php/session.php";
include "includes/header.php";
?>

<!--hero section start-->
<section class="section pt-9 pb-9 section-header text-white gradient-overly-right-color"
    style="background: url('assets/img/women-image.avif')no-repeat center center / cover">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-6">
                <div class="hero-slider-content">
                    <span class="text-uppercase">Register Now</span>
                    <h1 class="display-2">Women's Conference 2026</h1>
                    <p class="lead">
                        Join us for an inspiring and empowering Women's Conference designed to uplift, equip, and connect
                        women from all walks of life.
                        Secure your spot by completing the registration form below.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--hero section end-->

<!--registration form section start-->
<section class="section section-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="section-heading text-center mb-5">
                    <h2>Women's Conference Registration Form</h2>
                    <p class="lead">
                        Kindly fill out the form below to register for the Women's Conference.
                        Our team will confirm your registration and send event details to your email within 1–3 business
                        days.
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">
                <div class="card shadow-lg rounded-custom p-5 bg-white">

                    <?php
                    echo SuccessMessage();
                    echo ErrorMessage();
                    ?>

                    <form action="php/women_apply.php" method="POST" enctype="multipart/form-data" id="womenForm">

                        <!-- Attendee Information -->
                        <div class="mb-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="ti-user mr-2"></i> Attendee Information
                            </h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name" class="font-weight-bold">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="Enter your first name"
                                        value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name" class="font-weight-bold">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Enter your last name"
                                        value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="font-weight-bold">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="yourname@email.com"
                                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="font-weight-bold">Phone Number <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="+1 (555) 000-0000"
                                        value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Terms -->
                        <div class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="terms" name="terms" value="1"
                                    <?php echo (isset($_POST['terms']) && $_POST['terms'] == '1') ? 'checked' : ''; ?>
                                    required>
                                <label class="custom-control-label" for="terms">
                                    I agree to the <a href="#" class="text-primary">Terms and Conditions</a> and confirm
                                    that all information provided is correct.
                                    I also consent to receive updates about the Women's Conference.
                                    <span class="text-danger">*</span>
                                </label>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5" id="submitBtn">
                                <span id="btnDefault">
                                    <i class="ti-check mr-2"></i> Complete Registration
                                </span>
                                <span id="btnLoading" style="display:none;">
                                    <span class="women-spinner mr-2"></span>
                                    Registering, please wait...
                                </span>
                            </button>
                            <p class="text-muted small mt-3">
                                By registering, you will receive updates, reminders, and important information about the
                                Women's Conference.
                            </p>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--registration form section end-->


<!-- ── FULL-SCREEN LOADING OVERLAY ───────────────────────────────── -->
<div id="loadingOverlay">
    <div class="loading-card">
        <div class="icon-pulse">✦</div>
        <div class="loading-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <h5 class="loading-title">Completing Your Registration</h5>
        <p class="loading-sub" id="loadingMessage">Saving your details...</p>
        <div class="loading-steps">
            <div class="step" id="step1">
                <span class="step-icon">📋</span>
                <span class="step-label">Saving your details</span>
                <span class="step-status" id="status1">⏳</span>
            </div>
            <div class="step" id="step2">
                <span class="step-icon">📧</span>
                <span class="step-label">Sending confirmation email</span>
                <span class="step-status" id="status2">⏳</span>
            </div>
        </div>
        <p class="loading-note">Please do not close or refresh this page.</p>
    </div>
</div>


<style>
    /* ── BUTTON SPINNER ──────────────────────────────────────────── */
    .women-spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.75s linear infinite;
        vertical-align: middle;
    }

    /* ── OVERLAY ─────────────────────────────────────────────────── */
    #loadingOverlay {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 99999;
        background: rgba(80, 20, 60, 0.82);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        align-items: center;
        justify-content: center;
    }

    #loadingOverlay.active {
        display: flex;
    }

    .loading-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 48px 40px 40px;
        max-width: 400px;
        width: 90%;
        text-align: center;
        box-shadow: 0 32px 80px rgba(0, 0, 0, 0.3);
        animation: cardIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    @keyframes cardIn {
        from {
            transform: translateY(30px) scale(0.95);
            opacity: 0;
        }

        to {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    }

    .icon-pulse {
        font-size: 38px;
        color: #9c3272;
        margin-bottom: 14px;
        display: block;
        animation: iconPulse 1.6s ease-in-out infinite;
    }

    @keyframes iconPulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.2);
            opacity: 0.65;
        }
    }

    /* Ring spinner */
    .loading-ring {
        display: inline-block;
        position: relative;
        width: 56px;
        height: 56px;
        margin-bottom: 18px;
    }

    .loading-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 44px;
        height: 44px;
        margin: 6px;
        border: 4px solid transparent;
        border-radius: 50%;
        animation: spin 1s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    }

    .loading-ring div:nth-child(1) {
        border-top-color: #9c3272;
        animation-delay: -0.3s;
    }

    .loading-ring div:nth-child(2) {
        border-top-color: #c2185b;
        animation-delay: -0.2s;
    }

    .loading-ring div:nth-child(3) {
        border-top-color: #e91e8c;
        animation-delay: -0.1s;
    }

    .loading-ring div:nth-child(4) {
        border-top-color: #9c3272;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .loading-title {
        color: #6a1045;
        font-weight: 700;
        font-size: 1.15rem;
        margin-bottom: 6px;
    }

    .loading-sub {
        color: #888;
        font-size: 0.875rem;
        margin-bottom: 22px;
        min-height: 20px;
    }

    /* Steps */
    .loading-steps {
        text-align: left;
        background: #fdf0f7;
        border-radius: 12px;
        padding: 14px 18px;
        margin-bottom: 18px;
    }

    .step {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 0;
        border-bottom: 1px solid #f5d9ec;
        font-size: 0.875rem;
        color: #555;
        transition: color 0.3s;
    }

    .step:last-child {
        border-bottom: none;
    }

    .step.done {
        color: #2e7d32;
    }

    .step.active {
        color: #6a1045;
        font-weight: 600;
    }

    .step-icon {
        font-size: 16px;
        flex-shrink: 0;
    }

    .step-label {
        flex: 1;
    }

    .step-status {
        font-size: 14px;
        flex-shrink: 0;
    }

    .loading-note {
        color: #bbb;
        font-size: 0.76rem;
        margin: 0;
    }

    #submitBtn:disabled {
        opacity: 0.75;
        cursor: not-allowed;
    }
</style>

<script>
    (function () {
        const form = document.getElementById('womenForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnDefault = document.getElementById('btnDefault');
        const btnLoading = document.getElementById('btnLoading');
        const overlay = document.getElementById('loadingOverlay');

        const steps = [
            { el: document.getElementById('step1'), status: document.getElementById('status1') },
            { el: document.getElementById('step2'), status: document.getElementById('status2') },
        ];
        const loadingMsg = document.getElementById('loadingMessage');
        const messages = ['Saving your details...', 'Sending confirmation email...'];

        let submitted = false; // double-submit guard

        function activateStep(index) {
            steps.forEach((s, i) => {
                s.el.classList.remove('active', 'done');
                if (i < index) { s.el.classList.add('done'); s.status.textContent = '✅'; }
                if (i === index) { s.el.classList.add('active'); s.status.textContent = '⏳'; }
                if (i > index) { s.status.textContent = '⏳'; }
            });
            if (messages[index]) loadingMsg.textContent = messages[index];
        }

        form.addEventListener('submit', function (e) {
            if (!form.checkValidity()) return; // let HTML5 validation show errors

            if (submitted) { e.preventDefault(); return; } // block double-submit
            submitted = true;

            // Swap button
            btnDefault.style.display = 'none';
            btnLoading.style.display = 'inline-flex';
            btnLoading.style.alignItems = 'center';
            submitBtn.disabled = true;

            // Show overlay & animate steps
            overlay.classList.add('active');
            activateStep(0);
            setTimeout(function () { activateStep(1); }, 2000);
        });
    })();
</script>


<!--cta section start-->
<section class="section section-sm py-5">
    <div class="container">
        <div class="row justify-content-around align-items-center">
            <div class="col-md-7">
                <div class="subscribe-content">
                    <h3>Need More Information?</h3>
                    <p class="mb-lg-0 mb-md-0">
                        Have questions about the Women's Conference schedule, speakers, or venue?
                        Our team is here to assist you.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="action-btn text-lg-right text-sm-left">
                    <a href="contact.php" class="btn btn-primary">Contact With Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--cta section end-->

<?php include "includes/footer.php"; ?>