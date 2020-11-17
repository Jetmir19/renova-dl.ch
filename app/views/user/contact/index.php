<?php
//############ Check Contact Form START ################
$name = '';
$firma = '';
$telefon = '';
$userEmail = '';
$betreff = '';
$agb = '';

// $section = (isset($_SESSION['current_section'])) ? $_SESSION['current_section'] : 'Contact';

$ok = true;
$output = '';

if (isset($_POST['submited'])) {
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $firma = htmlspecialchars(strip_tags($_POST['firma']));
    $telefon = htmlspecialchars(strip_tags($_POST['telefon']));
    $userEmail = $_POST['userEmail'];
    $betreff = htmlspecialchars(strip_tags($_POST['betreff']));

    ####### Google reCAPTCHA request START ###############################################
    $secret = '6Lcgx-gUAAAAALhoePui_6EqPdNjVEkP_6CED448';
    $response = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6Lcgx-gUAAAAALhoePui_6EqPdNjVEkP_6CED448',
        'response' => $_POST['g-recaptcha-response'],
    );
    $options = array(
        'http' => array(
            'header' => "Content-Type: application/x-www-form-urlencoded",
            'method' => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    if ($captcha_success->success == false) {
        $ok = false;
        $output .= 'Please show that you are not a robot or refresh the Page and Try again!<br>';
    } // else if ($captcha_success->success == true) { This user is verified by recaptcha }
    ####### Google reCAPTCHA request END ##################################################

    // Validation START
    if (strlen($name) < 1) {
        $ok = false;
        $failed = 'bg-danger';
        $output .= 'Name can not be empty!<br>';
    }
    if (strlen($firma) < 1) {
        $ok = false;
        $output .= 'Company cannot be empty!<br>';
    }
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false) {
        $ok = false;
        $output .= 'Email address is not valid!<br>';
    }
    if (strlen($betreff) < 1) {
        $ok = false;
        $output .= 'Subject cannot be empty!<br>';
    }
    if (isset($_POST['agb']) && $_POST['agb'] == 'ok') {
        $agb = $_POST['agb'];
    } else {
        $ok = false;
        $output .= 'Please accept our Privacy Policy.<br>';
    }
    // Validation END

    if ($ok === true) {
        //############ Email Send START #######################################
        require_once VIEWS_PATH . '/contact/PHPMailer.php';
        require_once VIEWS_PATH . '/contact/sendEmailFunction.php';

        $betreff = "<h3>www.renova-sarl.ch</h3>
                    <hr><br>
                    <strong>Name:</strong> $name <br><br>
                    <strong>Company:</strong> $firma <br><br>
                    <strong>Phone:</strong> $telefon <br><br>
                    <strong>Subject:</strong> $betreff";

        sendEmail($userEmail, $name, $section, $betreff, CONTACT_FORM_EMAIL);
        //############ Email Send END #########################################

        $output .= 'success';
    }
    // Return results
    echo $output;
    exit;
}
//############ Check Contact Form END #####################
?>

<?php require_once VIEWS_PATH . '/user/includes/header.php'; ?>

<!-- MAIN Content START -->
<div class="container">
    <div class="row h-100" id="success">

        <div class="col-md-12 col-lg-11 mx-auto" id="cardForm">
            <?php
            getContent('contact', 'contact', 1);
            ?>

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