<?php include "includes/header.php"; ?>

<!--hero section start-->
<section class="section pt-9 pb-9 section-header text-white gradient-overly-right-color"
    style="background: url('assets/img/img1.jpeg')no-repeat center center / cover">
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
                    $success = false;
                    $errors = [];

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $required_fields = ['first_name','last_name','email','phone','dob','gender','address','city','state','zip','country','denomination','ministry_area','motivation','terms'];
                        foreach ($required_fields as $field) {
                            if (empty($_POST[$field])) {
                                $errors[] = ucwords(str_replace('_', ' ', $field)) . ' is required.';
                            }
                        }
                        if (empty($errors)) {
                            $success = true;
                        }
                    }
                    ?>

                    <?php if ($success): ?>
                        <div class="alert alert-success text-center p-5" role="alert">
                            <span class="icon icon-lg text-success mb-3 d-block"><i class="ti-check-box"></i></span>
                            <h4 class="alert-heading">Application Received!</h4>
                            <p class="mb-0">Thank you for applying. Our team will review your application and reach out
                                within 3–5 business days. God bless you on this journey!</p>
                        </div>
                    <?php else: ?>

                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="apply.php" method="POST" enctype="multipart/form-data" novalidate>

                            <!-- Personal Information -->
                            <div class="mb-4">
                                <h5 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="ti-user mr-2"></i> Personal Information
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="first_name" class="font-weight-bold">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            placeholder="Enter your first name"
                                            value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name" class="font-weight-bold">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Enter your last name"
                                            value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="font-weight-bold">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="yourname@email.com"
                                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="font-weight-bold">Phone Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            placeholder="+1 (555) 000-0000"
                                            value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dob" class="font-weight-bold">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="dob" name="dob"
                                            value="<?php echo isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="gender" class="font-weight-bold">Gender <span class="text-danger">*</span></label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="">-- Select Gender --</option>
                                            <option value="male" <?php echo (isset($_POST['gender']) && $_POST['gender']==='male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="female" <?php echo (isset($_POST['gender']) && $_POST['gender']==='female') ? 'selected' : ''; ?>>Female</option>
                                            <option value="prefer_not" <?php echo (isset($_POST['gender']) && $_POST['gender']==='prefer_not') ? 'selected' : ''; ?>>Prefer Not to Say</option>
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
                                        <label for="address" class="font-weight-bold">Street Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="123 Main Street"
                                            value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="font-weight-bold">City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                            value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="state" class="font-weight-bold">State / Province <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="State"
                                            value="<?php echo isset($_POST['state']) ? htmlspecialchars($_POST['state']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="zip" class="font-weight-bold">ZIP / Postal Code <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="00000"
                                            value="<?php echo isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="country" class="font-weight-bold">Country <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="country" name="country" placeholder="Country"
                                            value="<?php echo isset($_POST['country']) ? htmlspecialchars($_POST['country']) : ''; ?>" required>
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
                                        <label for="denomination" class="font-weight-bold">Church / Denomination <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="denomination" name="denomination"
                                            placeholder="Your church or denomination"
                                            value="<?php echo isset($_POST['denomination']) ? htmlspecialchars($_POST['denomination']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ministry_area" class="font-weight-bold">Preferred Ministry Area <span class="text-danger">*</span></label>
                                        <select class="form-control" id="ministry_area" name="ministry_area" required>
                                            <option value="">-- Select Area --</option>
                                            <option value="hospital" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area']==='hospital') ? 'selected' : ''; ?>>Hospital / Healthcare</option>
                                            <option value="correctional" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area']==='correctional') ? 'selected' : ''; ?>>Correctional Facilities</option>
                                            <option value="shelter" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area']==='shelter') ? 'selected' : ''; ?>>Shelters &amp; Homeless Ministry</option>
                                            <option value="disaster" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area']==='disaster') ? 'selected' : ''; ?>>Disaster &amp; Crisis Response</option>
                                            <option value="community" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area']==='community') ? 'selected' : ''; ?>>Community Outreach</option>
                                            <option value="military" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area']==='military') ? 'selected' : ''; ?>>Military</option>
                                            <option value="schools" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area']==='schools') ? 'selected' : ''; ?>>Schools &amp; Youth Programs</option>
                                            <option value="other" <?php echo (isset($_POST['ministry_area']) && $_POST['ministry_area']==='other') ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="experience" class="font-weight-bold">Years of Ministry Experience</label>
                                        <select class="form-control" id="experience" name="experience">
                                            <option value="">-- Select --</option>
                                            <option value="none" <?php echo (isset($_POST['experience']) && $_POST['experience']==='none') ? 'selected' : ''; ?>>No prior experience</option>
                                            <option value="1-2" <?php echo (isset($_POST['experience']) && $_POST['experience']==='1-2') ? 'selected' : ''; ?>>1 – 2 years</option>
                                            <option value="3-5" <?php echo (isset($_POST['experience']) && $_POST['experience']==='3-5') ? 'selected' : ''; ?>>3 – 5 years</option>
                                            <option value="6-10" <?php echo (isset($_POST['experience']) && $_POST['experience']==='6-10') ? 'selected' : ''; ?>>6 – 10 years</option>
                                            <option value="10+" <?php echo (isset($_POST['experience']) && $_POST['experience']==='10+') ? 'selected' : ''; ?>>10+ years</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="education" class="font-weight-bold">Highest Education Level</label>
                                        <select class="form-control" id="education" name="education">
                                            <option value="">-- Select --</option>
                                            <option value="high_school" <?php echo (isset($_POST['education']) && $_POST['education']==='high_school') ? 'selected' : ''; ?>>High School / GED</option>
                                            <option value="associate" <?php echo (isset($_POST['education']) && $_POST['education']==='associate') ? 'selected' : ''; ?>>Associate Degree</option>
                                            <option value="bachelor" <?php echo (isset($_POST['education']) && $_POST['education']==='bachelor') ? 'selected' : ''; ?>>Bachelor's Degree</option>
                                            <option value="master" <?php echo (isset($_POST['education']) && $_POST['education']==='master') ? 'selected' : ''; ?>>Master's Degree</option>
                                            <option value="doctorate" <?php echo (isset($_POST['education']) && $_POST['education']==='doctorate') ? 'selected' : ''; ?>>Doctorate / PhD</option>
                                            <option value="seminary" <?php echo (isset($_POST['education']) && $_POST['education']==='seminary') ? 'selected' : ''; ?>>Seminary / Theological Degree</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="motivation" class="font-weight-bold">Why do you want to become a Chaplain? <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="motivation" name="motivation" rows="5"
                                            placeholder="Share your calling, passion, and reason for applying..." required><?php echo isset($_POST['motivation']) ? htmlspecialchars($_POST['motivation']) : ''; ?></textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="references" class="font-weight-bold">References (Pastor, Leader, or Mentor)</label>
                                        <textarea class="form-control" id="references" name="references" rows="3"
                                            placeholder="Name, relationship, phone or email for each reference"><?php echo isset($_POST['references']) ? htmlspecialchars($_POST['references']) : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload -->
                            <!-- <div class="mb-4">
                                <h5 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="ti-clip mr-2"></i> Supporting Documents
                                    <span class="text-muted font-weight-normal" style="font-size:0.85rem;">(Optional)</span>
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="resume" class="font-weight-bold">Upload Resume / CV</label>
                                        <input type="file" class="form-control-file" id="resume" name="resume" accept=".pdf,.doc,.docx">
                                        <small class="form-text text-muted">PDF, DOC, DOCX — Max 5MB.</small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="photo" class="font-weight-bold">Upload Profile Photo</label>
                                        <input type="file" class="form-control-file" id="photo" name="photo" accept=".jpg,.jpeg,.png">
                                        <small class="form-text text-muted">JPG, PNG — Max 2MB.</small>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Terms -->
                            <div class="mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terms" name="terms" value="1"
                                        <?php echo (isset($_POST['terms']) && $_POST['terms']=='1') ? 'checked' : ''; ?> required>
                                    <label class="custom-control-label" for="terms">
                                        I agree to the <a href="#" class="text-primary">Terms and Conditions</a> and confirm
                                        that all information provided is accurate. <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="ti-check mr-2"></i> Submit Application
                                </button>
                                <p class="text-muted small mt-3">By submitting, you agree to be contacted by our ministry
                                    team regarding your application.</p>
                            </div>

                        </form>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!--registration form section end-->

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