<?php 

/**
 * signup class
 */
class Staffsignup
{
	use Controller;

	public function index()
	{
		$data = [];
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = new UserModel;
			if($user->registerUser($_POST))
			{
				$user->insert($_POST);
				redirect('stafflogin');
			}

			$data['errors'] = $user->errors;			
		}


		$this->view('staffsignup',$data);
	}

}
