<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHandler {
    
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function sendEmailAddressConfirmation($user_email){
        $confirm_code = rand(100000, 999999);

        try {
            $this->mail->SMTPDebug = 0;
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.34sp.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'scuderiaferrari@f499p.uosweb.co.uk';
            $this->mail->Password = '571D2B4B50EC7F9119878b3CD83D6760';
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = 587;

            $this->mail->setFrom('scuderiaferrari@f499p.uosweb.co.uk');
            $this->mail->addAddress($user_email);

            $this->mail->Subject = 'Email Confirmation Code';
            $this->mail->Body = $confirm_code;
            $this->mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
        return $confirm_code;
    }

    public function sendOrderConfirmationEmail($user_email, $order){
        try {
            $this->mail->SMTPDebug = 0;
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.34sp.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'scuderiaferrari@f499p.uosweb.co.uk';
            $this->mail->Password = '571D2B4B50EC7F9119878b3CD83D6760';
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = 587;

            $this->mail->setFrom('scuderiaferrari@f499p.uosweb.co.uk');
            $this->mail->addAddress($user_email);

            $this->mail->Subject = 'Order Confirmation Email';
            $this->mail->Body = "Order Complete\n_________________\n";
            foreach($order as $part_name => $part_entry){
                foreach($part_entry as $destination => $quantity){
                    if ($destination != 'total_part_quantity'){
                        $this->mail->Body .= "$quantity $part_name's ordered to $destination\n";
                    }
                    else{
                        $this->mail->Body .= "------------\nTotal $quantity\n_________________\n";
                    }
                }
            }
            $this->mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}