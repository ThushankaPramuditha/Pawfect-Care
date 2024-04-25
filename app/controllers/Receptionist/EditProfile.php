<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
        AuthorizationMiddleware::authorize(['Receptionist']);
		$userdataModel = new ReceptionistsModel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

		$this->view('receptionist/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Receptionist']);
        $receptionistsModel = new ReceptionistsModel();
        $success = $receptionistsModel->updateReceptionist($a, $_POST);
		if($success){
            $_SESSION['flash'] = ['success' => 'Profile updated successfully!'];
            header('Location: ' . ROOT . '/receptionist/myprofile');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update the profile'];
            header('Location: ' . ROOT . '/receptionist/myprofile');
            exit();
        };
    }

}
