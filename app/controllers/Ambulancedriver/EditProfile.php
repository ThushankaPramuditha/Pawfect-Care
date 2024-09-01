<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{
        AuthorizationMiddleware::authorize(['Ambulance Driver']);
		$userdataModel = new AmbulanceDriversModel();
		$data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);

		$this->view('ambulancedriver/editprofile',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Ambulance Driver']);
        $ambulancedriversModel = new AmbulanceDriversModel();
        $data['userdata'] = $ambulancedriversModel->getDriverRoleDataById($_SESSION['USER']->id);
        $_POST['image'] = upload($_FILES['image'], 'ambulancedrivers');

        // Delete previous image if it exists
        if (!empty($data['userdata']->image)) {
            $imagePath = "./uploads/ambulancedrivers/" . $data['userdata']->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $success = $ambulancedriversModel->updateAmbulanceDriver($a, $_POST);
		if($success){
            $_SESSION['flash'] = ['success' => 'Profile updated successfully!'];
            header('Location: ' . ROOT . '/ambulancedriver/myprofile');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update the profile'];
            header('Location: ' . ROOT . '/ambulancedriver/myprofile');
            exit();
        };
    }

}
