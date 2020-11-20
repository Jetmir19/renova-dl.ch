<?php

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
        require_once LIBRARY_PATH . "/PHPMailer.php";

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
