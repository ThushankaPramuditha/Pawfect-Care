<?php

class Contactus
{
    use Controller;

    public function index()
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
        $data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            // Sanitize input data
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

            // Check if all required fields are filled
            if ($name && $email && $message) {
                // Compose email subject and message
                $subject = "Message from $name";

                // Send email
                $emailModel = new EmailModel();
                $to = 'pawfectcarelk@gmail.com';
                $emailModel->sendEmail($to, $email, $subject, $message);

                // Redirect to the contactus page after sending the email
                redirect('petowner/contactus');
            } else {
                echo 'Please fill all required fields';
            }
        }

        $this->view('petowner/contactus', $data);
    }
}

?>
