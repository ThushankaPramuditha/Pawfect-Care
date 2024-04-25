<?php 

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{

		AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);		
		$feedbacksModel = new FeedbacksModel();
		$data['feedbacks'] = $feedbacksModel->getPostedFeedbacks();

		$this->view('petowner/home',$data);
	}

}


