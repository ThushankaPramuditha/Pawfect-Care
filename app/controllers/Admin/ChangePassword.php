<?php 

/**
 * changepassword class
 */
class ChangePassword
{
	use Controller;

	public function index()
	{
        AuthorizationMiddleware::authorize(['Admin']);

		$this->view('admin/changepassword',$data);
	}
	public function update() {
        AuthorizationMiddleware::authorize(['Admin']);

		$prevPassword = $_POST['prev-password'];
        $newPassword = $_POST['new-password'];

        $userModel = new UserModel();
        $userData = $userModel->first(['id' => $_SESSION['USER']->id]);

		if (!$userModel->verifyPassword($prevPassword, $userData->password)) {
            $_SESSION['flash'] = ['error' => 'Previous password is incorrect.'];
            header('Location: ' . ROOT . '/admin/changepassword');
            exit;
        }

        if ($userModel->updateUserPassword($_SESSION['USER']->id, $newPassword)) {
            $_SESSION['flash'] = ['success' => 'Your password has been updated successfully.'];
            header('Location: ' . ROOT . '/admin/changepassword');
            exit;
        } 
		else {
            $_SESSION['flash'] = ['error' => 'Failed to update the password.'];
            header('Location: ' . ROOT . '/admin/changepassword');
            exit;
        }


    }

}
