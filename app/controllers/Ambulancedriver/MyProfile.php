<?php 

/**
 * myprofile class
 */
class MyProfile
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Ambulance Driver']);
		$userdataModel = new AmbulanceDriversModel();
		$data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);

		$this->view('ambulancedriver/myprofile',$data);
	}

}
