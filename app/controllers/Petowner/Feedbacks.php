<?php

class Feedbacks 
{
    use Controller;


    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $postdata['petowner_id'] = $data['userdata']->id;
        $postdata['feedback']= $_POST['feedback'];

        $feedbacksModel = new FeedbacksModel();
        $feedbacksModel->addFeedback($postdata);

        $this->view('petowner/contactus', $data);
    }

}