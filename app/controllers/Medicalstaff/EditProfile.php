<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
		$userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('medicalstaff/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $medicalstaffModel = new MedicalStaffModel();
        $medicalstaffModel->updateMedicalStaff($a, $_POST);

        redirect('medicalstaff/myprofile');
    }

}
