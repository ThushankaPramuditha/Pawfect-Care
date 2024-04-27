<?php 

/**
 * home class
 */
class UserProfile
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
		
		$this->view('petowner/userprofile',$data);
	}

    public function fetchProfile() {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $this->view('petowner/myprofile', $data);
    }
    
    public function fetchEditProfile() {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
        $this->view('petowner/editprofile', $data);
    }
    
    public function fetchChangePassword() {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $this->view('petowner/changepassword');
    }

    public function updatePassword() {
        AuthorizationMiddleware::authorize(['Pet Owner']);
		$prevPassword = $_POST['prev-password'];
        $newPassword = $_POST['new-password'];

        $userModel = new UserModel();
        $userData = $userModel->first(['id' => $_SESSION['USER']->id]);

		if (!$userModel->verifyPassword($prevPassword, $userData->password)) {
            $_SESSION['flash'] = ['error' => 'Previous password is incorrect.'];
            header('Location: ' . ROOT . '/petowner/userprofile');
            exit;
        }

        if ($userModel->updateUserPassword($_SESSION['USER']->id, $newPassword)) {
            $_SESSION['flash'] = ['success' => 'Your password has been updated successfully.'];
            header('Location: ' . ROOT . '/petowner/userprofile');
            exit;
        } 
		else {
            $_SESSION['flash'] = ['error' => 'Failed to update the password.'];
            header('Location: ' . ROOT . '/petowner/userprofile');
            exit;
        }


    }

    public function editProfile(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $petownerModel = new PetownersModel();
        $success = $petownerModel->updatePetowner($a, $_POST);
		if($success){
            $_SESSION['flash'] = ['success' => 'Profile updated successfully!'];
            header('Location: ' . ROOT . '/petowner/userprofile');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update the profile'];
            header('Location: ' . ROOT . '/petowner/userprofile');
            exit();
        };
    }
    

}
