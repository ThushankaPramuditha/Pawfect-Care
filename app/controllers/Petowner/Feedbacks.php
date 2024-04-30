<?php

class Feedbacks 
{
    use Controller;


    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);

        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $postdata['petowner_id'] = $data['userdata']->id;
        $postdata['feedback']= $_POST['feedback'];

        $feedbacksModel = new FeedbacksModel();
        $success = $feedbacksModel->addFeedback($postdata);

        if($success) {
            $_SESSION['flash'] = ['success' => 'Feedback added successfully'];
        } else {
            $_SESSION['flash'] = ['error' => 'Failed to add feedback'];
        }

        $this->view('petowner/contactus', $data);
    }

}