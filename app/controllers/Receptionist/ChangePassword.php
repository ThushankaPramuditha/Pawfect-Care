<?php 

/**
 * changepassword class
 */
class ChangePassword
{
	use Controller;

	public function index()
	{
		$userdataModel = new ReceptionistsModel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('receptionist/changepassword',$data);
	}

}
