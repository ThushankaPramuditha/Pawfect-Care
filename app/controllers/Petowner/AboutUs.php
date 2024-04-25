<?php 

/**
 * home class
 */
class Aboutus
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Pet Owner']);
		$userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

		$this->view('petowner/aboutus',$data);
	}

}
