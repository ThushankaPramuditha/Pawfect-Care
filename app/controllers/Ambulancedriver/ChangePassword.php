<?php 

/**
 * changepassword class
 */
class ChangePassword
{
	use Controller;

	public function index()
	{
		$userdataModel = new AmbulanceDriversModel();
		$data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('ambulancedriver/changepassword',$data);
	}

}
