<?php
############ Check Contact Form START ###################
require_once VIEWS_PATH . '/user/contact/sendEmail.php';
############ Check Contact Form END #####################


require_once VIEWS_PATH . '/user/includes/header.php';
?>

<!-- MAIN Content START -->
<div class="container">
    <div class="row h-100" id="success">

        <div class="col-md-12 col-lg-11 mx-auto" id="cardForm">
            <?php
            // getContent('contact', 'contact', 1);
            ?>

            <!-- Database section START -->
            <div class="d-flex bd-highlight mt-4">
                <h2 class="font-weight-bold">ADDRESS</h2>
            </div>
            <hr class="mt-0">
            <p class="lead">
                <span><i class="fas fa-map-marker-alt"></i></span><br />
                <span>INTER-TRANS Medi dooel </span><br />
                <span>rruga 101 bb,</span> <br />
                <span>1227 Chelopek Brvenica</span> <br />
                <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJmYAnPYD5UxMROYp1z8eo790&key=AIzaSyCLyjpFsQaQqlXrWYm7DL_0cBPznxnY0LU" allowfullscreen></iframe><br />

                <i class="fas fa-phone-square-alt"></i><strong class="pl-1">Tel: </strong><a href="tel:+38970256213">+38970256213</a><br />
                <i class="fas fa-phone-square-alt"></i><strong class="pl-1">Tel: </strong><a href="tel:+38970290642">+38970290642</a><br />
                <i class="fas fa-envelope"></i><small class="pl-1"><strong>E-Mail:</strong> <a href="mailto:office@inter-trans.mk">office@inter-trans.mk</a></small>
            </p>
            <div class="d-flex bd-highlight mt-4">
                <h2 class="font-weight-bold">CONTACT US</h2>
            </div>
            <!-- Database section END -->

            <hr class="mt-0">

            <!-- Errors Output -->
            <div id="contact_result"></div>

            <div class="card card-body bg-light mt-3">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="text-muted">
                        <i class="fas fa-envelope"></i>
                        <small class="pl-1"><strong>E-Mail:</strong> <a href="mailto:office@renova-sarl.ch">office@renova-sarl.ch</a></small>
                    </div>
                    <div class="text-muted">
                        <i class="fas fa-map-marker-alt"></i>
                        <small class="pl-1"><strong>Address:</strong> Chelopek, 1227 Tetovo, N.Macedonia</small>
                    </div>
                </div>
                <hr />
                <small class="text-muted mb-2 mx-auto">Please complete all required (*) fields.</small>
                <form method="POST" id="contactForm">
                    <div class="form-group">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg" />
                    </div>
                    <div class="form-group">
                        <label for="firma">Company: <sup>*</sup></label>
                        <input type="text" name="firma" class="form-control form-control-lg" />
                    </div>
                    <div class="form-group">
                        <label for="telefon">Phone: </label>
                        <input type="tel" name="telefon" class="form-control form-control-lg" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required />
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email: <sup>*</sup></label>
                        <input type="email" name="userEmail" class="form-control form-control-lg" />
                    </div>
                    <div class="form-group">
                        <label for="betreff">Subject: <sup>*</sup></label>
                        <textarea name="betreff" class="form-control form-control-lg" rows="3"></textarea>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="agb" value="ok" <?php echo $agb == 'ok' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="agb">
                            You agree that your data will be used to process your request. Further information and cancellation notices can be found in the
                            <a href="https://en.wikipedia.org/wiki/Privacy_policy" target="_blank" class="text-info">Privacy Policy. </a><sup>*</sup>
                        </label>
                    </div>
                    <div class="form-group mt-4">
                        <div class="g-recaptcha" data-sitekey="6Lcgx-gUAAAAAAkxnWlIah-paKU_k7Ic7DEBM_Ux">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <input type="hidden" id="submited" name="submited" value="submited">
                            <button type="button" name="senden" class="btn btn-success btn-block" onclick="contactFormAction()">SUBMIT <i class="fas fa-paper-plane ml-1"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MAIN Content END -->

<!-- Google reCAPTCHA API -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php require_once VIEWS_PATH . '/user/includes/footer.php'; ?>