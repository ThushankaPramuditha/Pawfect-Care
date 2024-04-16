<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
		$userdataModel = new AmbulanceDriversModel();
		$data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('ambulancedriver/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $ambulancedriversModel->updateAmbulanceDriver($a, $_POST);

        redirect('ambulancedriver/myprofile');
    }

}
