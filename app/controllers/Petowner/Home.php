<?php 

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
		$feedbacksModel = new FeedbacksModel();
		$data['feedbacks'] = $feedbacksModel->getAllFeedbacks();

		$this->view('petowner/home',$data);
	}

}


