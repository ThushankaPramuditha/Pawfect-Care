<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
		$userdataModel = new DaycareStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('daycarestaff/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $daycarestaffModel = new DaycareStaffModel();
        $daycarestaffModel->updateDaycareStaff($a, $_POST);

        redirect('daycarestaff/myprofile');
    }

}
