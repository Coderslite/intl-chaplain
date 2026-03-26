<?php
session_start();
include "php/session.php";
include "includes/header.php";
?>

<!--hero section start-->
<section class="section pt-9 pb-9 section-header text-white gradient-overly-right-color"
    style="background: url('assets/img/img3.png')no-repeat center center / cover">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-6">
                <div class="hero-slider-content">
                    <span class="text-uppercase">Join Our Ministry</span>
                    <h1 class="display-2">Become a Chaplain</h1>
                    <p class="lead">Take the first step toward a meaningful calling. Fill out the form below to apply
                        for chaplain training and ordination with Chaplain Ministries International Corp.</p>
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
                    <h2>Chaplain Registration Form</h2>
                    <p class="lead">Please complete all required fields. Our team will review your application and
                        contact you within 3–5 business days.</p>
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

                    <form action="php/apply.php" method="POST" enctype="multipart/form-data" id="chaplainForm">

                        <!-- Personal Information -->
                        <div class="mb-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="ti-user mr-2"></i> Personal Information
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
                                <div class="col-md-6 mb-3">
                                    <label for="dob" class="font-weight-bold">Date of Birth <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                        value="<?php echo isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gender" class="font-weight-bold">Gender <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="">-- Select Gender --</option>
                                        <option value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'male') ? 'selected' : ''; ?>>Male</option>
                                        <option value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'female') ? 'selected' : ''; ?>>Female</option>
                                        <option value="prefer_not" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'prefer_not') ? 'selected' : ''; ?>>Prefer Not to Say
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Address Information -->
                        <div class="mb-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="ti-location-pin mr-2"></i> Address Information
                            </h5>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="address" class="font-weight-bold">Street Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="123 Main Street"
                                        value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="font-weight-bold">City <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                        value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state" class="font-weight-bold">State / Province <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="State"
                                        value="<?php echo isset($_POST['state']) ? htmlspecialchars($_POST['state']) : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip" class="font-weight-bold">ZIP / Postal Code <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="00000"
                                        value="<?php echo isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country" class="font-weight-bold">Country <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="Country"
                                        value="<?php echo isset($_POST['country']) ? htmlspecialchars($_POST['country']) : ''; ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Ministry Information -->
                        <div class="mb-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="ti-heart mr-2"></i> Ministry Information
                            </h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="denomination" class="font-weight-bold">Church / Denomination <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="denomination" name="denomination"
                                        placeholder="Your church or denomination"
                                        value="<?php echo isset($_POST['denomination']) ? htmlspecialchars($_POST['denomination']) : ''; ?>"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ministry_area" class="font-weight-bold">Preferred Ministry Area <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="ministry_area" name="ministry_area" required>
                                        <option value="">-- Select Area --</option>
                                        <option value="hospital" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area'] === 'hospital') ? 'selected' : ''; ?>>Hospital /
                                            Healthcare</option>
                                        <option value="correctional" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area'] === 'correctional') ? 'selected' : ''; ?>>Correctional
                                            Facilities</option>
                                        <option value="shelter" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area'] === 'shelter') ? 'selected' : ''; ?>>Shelters &amp;
                                            Homeless Ministry</option>
                                        <option value="disaster" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area'] === 'disaster') ? 'selected' : ''; ?>>Disaster &amp;
                                            Crisis Response</option>
                                        <option value="community" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area'] === 'community') ? 'selected' : ''; ?>>Community
                                            Outreach</option>
                                        <option value="military" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area'] === 'military') ? 'selected' : ''; ?>>Military
                                        </option>
                                        <option value="schools" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area'] === 'schools') ? 'selected' : ''; ?>>Schools &amp;
                                            Youth Programs</option>
                                        <option value="other" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area'] === 'other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="experience" class="font-weight-bold">Years of Ministry
                                        Experience</label>
                                    <select class="form-control" id="experience" name="experience">
                                        <option value="">-- Select --</option>
                                        <option value="none" <?php echo (isset($_POST['experience']) && $_POST['experience'] === 'none') ? 'selected' : ''; ?>>No prior experience
                                        </option>
                                        <option value="1-2" <?php echo (isset($_POST['experience']) && $_POST['experience'] === '1-2') ? 'selected' : ''; ?>>1 – 2 years</option>
                                        <option value="3-5" <?php echo (isset($_POST['experience']) && $_POST['experience'] === '3-5') ? 'selected' : ''; ?>>3 – 5 years</option>
                                        <option value="6-10" <?php echo (isset($_POST['experience']) && $_POST['experience'] === '6-10') ? 'selected' : ''; ?>>6 – 10 years</option>
                                        <option value="10+" <?php echo (isset($_POST['experience']) && $_POST['experience'] === '10+') ? 'selected' : ''; ?>>10+ years</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="education" class="font-weight-bold">Highest Education Level</label>
                                    <select class="form-control" id="education" name="education">
                                        <option value="">-- Select --</option>
                                        <option value="high_school" <?php echo (isset($_POST['education']) && $_POST['education'] === 'high_school') ? 'selected' : ''; ?>>High School / GED
                                        </option>
                                        <option value="associate" <?php echo (isset($_POST['education']) && $_POST['education'] === 'associate') ? 'selected' : ''; ?>>Associate Degree
                                        </option>
                                        <option value="bachelor" <?php echo (isset($_POST['education']) && $_POST['education'] === 'bachelor') ? 'selected' : ''; ?>>Bachelor's Degree
                                        </option>
                                        <option value="master" <?php echo (isset($_POST['education']) && $_POST['education'] === 'master') ? 'selected' : ''; ?>>Master's Degree
                                        </option>
                                        <option value="doctorate" <?php echo (isset($_POST['education']) && $_POST['education'] === 'doctorate') ? 'selected' : ''; ?>>Doctorate / PhD
                                        </option>
                                        <option value="seminary" <?php echo (isset($_POST['education']) && $_POST['education'] === 'seminary') ? 'selected' : ''; ?>>Seminary /
                                            Theological Degree</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="motivation" class="font-weight-bold">Why do you want to become a
                                        Chaplain? <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="motivation" name="motivation" rows="5"
                                        placeholder="Share your calling, passion, and reason for applying..."
                                        required><?php echo isset($_POST['motivation']) ? htmlspecialchars($_POST['motivation']) : ''; ?></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="references" class="font-weight-bold">References (Pastor, Leader, or
                                        Mentor)</label>
                                    <textarea class="form-control" id="references" name="references" rows="3"
                                        placeholder="Name, relationship, phone or email for each reference"><?php echo isset($_POST['references']) ? htmlspecialchars($_POST['references']) : ''; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Upload -->
                        <div class="mb-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="ti-clip mr-2"></i> Supporting Documents
                                <span class="text-muted font-weight-normal" style="font-size:0.85rem;">(Optional)</span>
                            </h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="resume" class="font-weight-bold">Upload Resume / CV</label>
                                    <input type="file" class="form-control-file" id="resume" name="resume"
                                        accept=".pdf,.doc,.docx">
                                    <small class="form-text text-muted">PDF, DOC, DOCX — Max 5MB.</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="drivers_license" class="font-weight-bold">Upload Driver's
                                        License</label>
                                    <input type="file" class="form-control-file" id="drivers_license"
                                        name="drivers_license" accept=".jpg,.jpeg,.png,.pdf">
                                    <small class="form-text text-muted">JPG, PNG, PDF — Max 3MB.</small>
                                </div>
                            </div>

                            <!-- Terms -->
                            <div class="mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terms" name="terms"
                                        value="1" <?php echo (isset($_POST['terms']) && $_POST['terms'] == '1') ? 'checked' : ''; ?> required>
                                    <label class="custom-control-label" for="terms">
                                        I agree to the <a href="#" class="text-primary">Terms and Conditions</a> and
                                        confirm that all information provided is accurate. <span
                                            class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5" id="submitBtn">
                                    <span id="btnDefault">
                                        <i class="ti-check mr-2"></i> Submit Application
                                    </span>
                                    <span id="btnLoading" style="display:none;">
                                        <span class="chaplain-spinner mr-2"></span>
                                        Submitting, please wait...
                                    </span>
                                </button>
                                <p class="text-muted small mt-3">By submitting, you agree to be contacted by our
                                    ministry team regarding your application.</p>
                            </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--registration form section end-->

<!-- FULL-SCREEN LOADING OVERLAY -->
<div id="loadingOverlay">
    <div class="loading-card">
        <div class="cross-pulse">✝</div>
        <div class="loading-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <h5 class="loading-title">Submitting Your Application</h5>
        <p class="loading-sub" id="loadingMessage">Saving your information...</p>
        <div class="loading-steps">
            <div class="step" id="step1">
                <span class="step-icon">📋</span>
                <span class="step-label">Saving your information</span>
                <span class="step-status" id="status1">⏳</span>
            </div>
            <div class="step" id="step2">
                <span class="step-icon">📎</span>
                <span class="step-label">Processing documents</span>
                <span class="step-status" id="status2">⏳</span>
            </div>
            <div class="step" id="step3">
                <span class="step-icon">📧</span>
                <span class="step-label">Sending confirmation email</span>
                <span class="step-status" id="status3">⏳</span>
            </div>
        </div>
        <p class="loading-note">Please do not close or refresh this page.</p>
    </div>
</div>

<style>
    /* ── SPINNER ON BUTTON ──────────────────────────────────────── */
    .chaplain-spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.75s linear infinite;
        vertical-align: middle;
    }

    /* ── FULL-SCREEN OVERLAY ────────────────────────────────────── */
    #loadingOverlay {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 99999;
        background: rgba(10, 25, 55, 0.82);
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
        max-width: 420px;
        width: 90%;
        text-align: center;
        box-shadow: 0 32px 80px rgba(0, 0, 0, 0.35);
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

    /* Pulsing cross */
    .cross-pulse {
        font-size: 36px;
        margin-bottom: 16px;
        animation: crossPulse 1.6s ease-in-out infinite;
        display: block;
        color: #1a3c6e;
    }

    @keyframes crossPulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.18);
            opacity: 0.7;
        }
    }

    /* Ring spinner */
    .loading-ring {
        display: inline-block;
        position: relative;
        width: 56px;
        height: 56px;
        margin-bottom: 20px;
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
        border-top-color: #1a3c6e;
        animation-delay: -0.3s;
    }

    .loading-ring div:nth-child(2) {
        border-top-color: #2d6a9f;
        animation-delay: -0.2s;
    }

    .loading-ring div:nth-child(3) {
        border-top-color: #4caf50;
        animation-delay: -0.1s;
    }

    .loading-ring div:nth-child(4) {
        border-top-color: #1a3c6e;
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
        color: #1a3c6e;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 6px;
    }

    .loading-sub {
        color: #777;
        font-size: 0.9rem;
        margin-bottom: 24px;
        min-height: 20px;
        transition: opacity 0.3s;
    }

    /* Step indicators */
    .loading-steps {
        text-align: left;
        background: #f4f7fb;
        border-radius: 12px;
        padding: 16px 20px;
        margin-bottom: 20px;
    }

    .step {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 0;
        border-bottom: 1px solid #e8edf5;
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
        color: #1a3c6e;
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
        font-size: 0.78rem;
        margin: 0;
    }

    /* Disabled submit button */
    #submitBtn:disabled {
        opacity: 0.75;
        cursor: not-allowed;
    }
</style>

<script>
    (function () {
        const form = document.getElementById('chaplainForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnDefault = document.getElementById('btnDefault');
        const btnLoading = document.getElementById('btnLoading');
        const overlay = document.getElementById('loadingOverlay');

        // Step elements
        const steps = [
            { el: document.getElementById('step1'), status: document.getElementById('status1') },
            { el: document.getElementById('step2'), status: document.getElementById('status2') },
            { el: document.getElementById('step3'), status: document.getElementById('status3') },
        ];
        const loadingMsg = document.getElementById('loadingMessage');

        const messages = [
            'Saving your information...',
            'Processing your documents...',
            'Sending confirmation email...',
        ];

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
            // Native HTML5 validation fires first — if invalid, don't intercept
            if (!form.checkValidity()) return;

            // Double-submit guard
            if (submitted) {
                e.preventDefault();
                return;
            }
            submitted = true;

            // Update button state
            btnDefault.style.display = 'none';
            btnLoading.style.display = 'inline-flex';
            btnLoading.style.alignItems = 'center';
            submitBtn.disabled = true;

            // Show overlay
            overlay.classList.add('active');

            // Animate steps to simulate progress while the real POST happens
            activateStep(0);

            setTimeout(function () { activateStep(1); }, 1800);
            setTimeout(function () { activateStep(2); }, 3600);

            // Let the form submit naturally — page redirects on server response
        });
    })();
</script>

<!--cta section start-->
<section class="section section-sm py-5">
    <div class="container">
        <div class="row justify-content-around align-items-center">
            <div class="col-md-7">
                <div class="subscribe-content">
                    <h3>Have Questions Before Applying?</h3>
                    <p class="mb-lg-0 mb-md-0">Our team is happy to answer any questions about the chaplaincy program,
                        training, or ordination process.</p>
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