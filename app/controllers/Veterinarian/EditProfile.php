<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
        AuthorizationMiddleware::authorize(['Veterinarian']);
		$userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

		$this->view('veterinarian/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $veterinariansModel = new VeterinariansModel();
        $data['userdata'] = $veterinariansModel->getVetRoleDataById($_SESSION['USER']->id);
        $_POST['image'] = upload($_FILES['image'], 'veterinarians');

        // Delete previous image if it exists
        if (!empty($data['userdata']->image)) {
            $imagePath = "./uploads/veterinarians/" . $data['userdata']->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $success = $veterinariansModel->updateVeterinarian($a, $_POST);
		if($success){
            $_SESSION['flash'] = ['success' => 'Profile updated successfully!'];
            header('Location: ' . ROOT . '/veterinarian/myprofile');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update the profile'];
            header('Location: ' . ROOT . '/veterinarian/myprofile');
            exit();
        };
    }

}
