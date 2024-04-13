<?php

class SendEmail {

    use Controller;

    public function index() {
        $data = [];
        $this->view('sendemail', $data);
    }

    public function sendEmail() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            // $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
            // $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];

            // echo $email;
            // echo $subject;
            // echo $message;


            if (empty($email) || empty($subject) || empty($message)) {
                echo "Please fill out all the fields.";
            } else {
                $emailModel = new EmailModel();
                if ($emailModel->sendEmail($email, $subject, $message)) {
                    echo "Email sent successfully!";
                } else {
                    echo "Failed to send email. Please try again later.";
                }
            }
        }
    }
}




?>