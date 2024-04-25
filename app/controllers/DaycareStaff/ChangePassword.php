<?php 

class ChangePassword
{
	use Controller;

	public function index()
	{
        AuthorizationMiddleware::authorize(['Daycare Staff']);
		$userdataModel = new DaycareStaffModel();
		$data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);

		$this->view('daycarestaff/changepassword',$data);
	}

    

    public function update() {
        AuthorizationMiddleware::authorize(['Daycare Staff']);
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

