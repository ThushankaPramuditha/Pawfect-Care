<?php 

/**
 * myprofile class
 */
class MyProfile
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Daycare Staff']);
		$userdataModel = new DaycareStaffModel();
		$data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);

		$this->view('daycarestaff/myprofile',$data);
	}

}
