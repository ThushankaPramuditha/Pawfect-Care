<?php 

class ChangePassword
{
	use Controller;

	public function index()
	{
		$userdataModel = new DaycareStaffModel();
		$data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('daycarestaff/changepassword',$data);
	}

    

    public function update() {
		$prevPassword = $_POST['prev-password'];
        $newPassword = $_POST['new-password'];

        $userModel = new UserModel();
        $userData = $userModel->first(['id' => $_SESSION['USER']->id]);

		if (!$userModel->verifyPassword($prevPassword, $userData->password)) {
            $_SESSION['flash'] = ['error' => 'Previous password is incorrect.'];
            header('Location: ' . ROOT . '/daycarestaff/changepassword');
            exit;
        }

        if ($userModel->updateUserPassword($_SESSION['USER']->id, $newPassword)) {
            $_SESSION['flash'] = ['success' => 'Your password has been updated successfully.'];
            header('Location: ' . ROOT . '/daycarestaff/changepassword');
            exit;
        } 
		else {
            $_SESSION['flash'] = ['error' => 'Failed to update the password.'];
            header('Location: ' . ROOT . '/daycarestaff/changepassword');
            exit;
        }


    }
}

