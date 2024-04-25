<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
        AuthorizationMiddleware::authorize(['Medical Staff']);
		$userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

		$this->view('medicalstaff/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $medicalstaffModel = new MedicalStaffModel();
		$success = $medicalstaffModel->updateMedicalStaff($a, $_POST);
        if($success){
            $_SESSION['flash'] = ['success' => 'Profile updated successfully!'];
            header('Location: ' . ROOT . '/medicalstaff/myprofile');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update the profile'];
            header('Location: ' . ROOT . '/medicalstaff/myprofile');
            exit();
        };
    }

}
