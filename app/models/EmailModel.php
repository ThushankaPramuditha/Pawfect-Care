 <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../PHPmailer/src/Exception.php';
require_once '../PHPmailer/src/PHPMailer.php';
require_once '../PHPmailer/src/SMTP.php';
require '../PHPmailer/vendor/autoload.php'; 


class EmailModel {

    public function sendEmail($email, $subject, $message) {
        $mail = new PHPMailer(true);

        try {
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'pawfectcarelk@gmail.com'; // Replace with your email address
            $mail->Password = 'zdzf kfpa mfqb tktp'; // Replace with your email password
            $mail->SMTPSecure = 'ssl'; // Adjust encryption if necessary
            $mail->Port = 465; // Standard TLS port

            // Set sender and recipient details
            $mail->setFrom('pawfectcarelk@gmail.com'); // Replace with your sender information
            $mail->addAddress($email);

            // Set email content
            $mail->isHTML(true); // Set to false for plain text emails
            $mail->Subject = $subject;
            $mail->Body = $message;

            if ($mail->send()) {
                return true;
            } else {
                throw new Exception('Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
            }
        } catch (Exception $e) {
            // Handle errors gracefully, e.g., log the exception or display a user-friendly message
            error_log('Email sending failed: ' . $e->getMessage());
            return false;
         }

         //add windows reload
            
    }
}

?>