<?php 

/**
 * signup class
 */
// class Signup
// {
// 	use Controller;

// 	public function index()
// 	{
// 		$data = [];
		
// 		if($_SERVER['REQUEST_METHOD'] == "POST")
// 		{
// 			$user = new UserModel;
// 			if($user->validate($_POST))
// 			{
// 				$user->insert($_POST);
// 				redirect('login');
// 			}

// 			$data['errors'] = $user->errors;			
// 		}


// 		$this->view('signup',$data);
// 	}

// }

class Signup
{
    use Controller;

    public function index()
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Sanitize the input data
            $postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $user = new UserModel;
            if ($user->validate($postData)) {
                // Attempt to register the user
                $insertResult = $user->registerUser($postData);

                if ($insertResult) {
                    // If registration is successful, redirect to the login page
                    redirect('login');
                } else {
                    // Handle errors, e.g., unable to insert due to database issues
                    // $data['errors'] = ['general' => 'Failed to register. Please try again.'];
					$data['errors'] = $user->errors;

                }
            } else {
                // Validation failed, pass the errors to the view
                $data['errors'] = $user->errors;
            }
        }

        $this->view('signup', $data);
    }
}
