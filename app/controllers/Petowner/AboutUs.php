<?php 

/**
 * home class
 */
class Aboutus
{
	use Controller;

	public function index()
	{
		// Retrieve medical staff role data based on the currently logged-in user's ID
		AuthorizationMiddleware::authorize(['Pet Owner']);
		$userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

		//load the view
		$this->view('petowner/aboutus',$data);
	}

}
