<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
        AuthorizationMiddleware::authorize(['Daycare Staff']);
		$userdataModel = new DaycareStaffModel();
		$data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);

		$this->view('daycarestaff/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        $daycarestaffModel = new DaycareStaffModel();
        $success = $daycarestaffModel->updateDaycareStaff($a, $_POST);
		if($success){
            $_SESSION['flash'] = ['success' => 'Profile updated successfully!'];
            header('Location: ' . ROOT . '/daycarestaff/myprofile');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update the profile'];
            header('Location: ' . ROOT . '/daycarestaff/myprofile');
            exit();
        };
    }

}
