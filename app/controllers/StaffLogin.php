<?php 

/**
 * login class
 */
class StaffLogin
{
	use Controller;

	public function index()
	{
		$data = [];
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = new UserModel;
			$arr['email'] = $_POST['email'];

			$row = $user->first($arr);
			
			if($row)
			{
				if($row->password === $_POST['password'])
				{
					$_SESSION['USER'] = $row;
					redirect('home');
				}
			}

			$user->errors['email'] = "Wrong email or password";

			$data['errors'] = $user->errors;
		}

		$this->view('stafflogin',$data);
	}

}