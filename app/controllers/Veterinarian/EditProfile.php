<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
		$userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('veterinarian/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $veterinariansModel = new VeterinariansModel();
        $veterinariansModel->updateVeterinarian($a, $_POST);

        redirect('veterinarian/myprofile');
    }

}
