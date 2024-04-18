<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
		$userdataModel = new ReceptionistsModel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('receptionist/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $receptionistsModel = new ReceptionistsModel();
        $receptionistsModel->updateReceptionist($a, $_POST);

        redirect('receptionist/myprofile');
    }

}
