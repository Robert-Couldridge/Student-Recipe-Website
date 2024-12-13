<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHandler {
    
    public function sendEmailAddressConfirmation($user_email){
        $mail = new PHPMailer(true);

        $confirm_code = rand(100000, 999999);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.34sp.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'scuderiaferrari@f499p.uosweb.co.uk';
            $mail->Password = '571D2B4B50EC7F9119878b3CD83D6760';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('scuderiaferrari@f499p.uosweb.co.uk');
            $mail->addAddress($user_email);

            $mail->Subject = 'Email Confirmation Code';
            $mail->Body = $confirm_code;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return $confirm_code;
    }
}