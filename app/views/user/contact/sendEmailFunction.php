<?php

function sendEmail($From, $FromName, $Subject, $mailtext, $To, $CC = '', $BCC = '', $Attachments = '')
{
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    //ggf Mailserver
    //$mail->Host = 'xxxxxxxxxxxxx';
    $mail->From = $From;
    $mail->FromName = utf8_decode($FromName);
    $mail->isHTML(true);
    $mail->Subject = utf8_decode($Subject);
    $mail->Body = utf8_decode($mailtext);
    $mail->AltBody = strip_tags(utf8_decode($mailtext));
    $mail->AddAddress($To);
    $mail->AddReplyTo($From);

    // $mail->AddCC($CC);
    // $mail->AddBCC($BCC);
    // $mail->AddAttachment($Attachments);

    if (!$mail->Send()) {
        $GLOBALS['ok'] = false;
        $GLOBALS['output'] .= 'Email cannot be sent! '.$mail->ErrorInfo;
    }
}
