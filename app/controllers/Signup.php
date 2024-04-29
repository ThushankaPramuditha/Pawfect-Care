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
            $petownersModel = new petownersModel();
            
            if ($petownersModel->validate($postData)) {
                $insertResult = $petownersModel->addPetowner($postData);

                if ($insertResult) {
                    // $success = $insertResult;
                     $petOwnerEmail = $postData['email'];
              //sample email
            //    $petOwnerEmail = 'thushankapramuditha17@gmail.com';
               if($petOwnerEmail) {
                   // Send email to the pet owner
                  
                   $subject = "User Signup Suceessful.";
                   $message = "
                   <html>
                   <head>
                   <title>User Signup Successful</title>
                   <style>
                       body {
                           font-family: Arial, sans-serif;
                           font-size: 16px;
                           line-height: 1.6;
                           color: #333;
                       }
                       .container {
                           max-width: 600px;
                           margin: 0 auto;
                           padding: 20px;
                           border: 1px solid #ccc;
                           border-radius: 5px;
                           background-color: #f9f9f9;
                       }
                       h2 {
                           color: #6a3879;
                       }
                       p {
                           margin-bottom: 20px;
                       }
                   </style>
                   </head>
                   <body>
                   <div class='container'>
                       <h2>Thank You for Joining with us.</h2>
                       <p>We are excited to welcome you to our community. Your sign-up was successful, and we are thrilled to have you on board.</p>
                       <p>Our Facilities</p>
                       <ul>
                           <li>24/7 Ambulance Service</li>
                           <li>24/7 Emergency Service</li>
                           <li>24/7 Vet Appointment</li>
                           <li>24/7 Pet Vaccinations</li>
                
                       </ul>
                       <p>If you have any questions or need further assistance, please feel free to contact us.</p>
                       <p>Contact No: 011-1234567</p>
                       <p>Thank you for choosing our Pet Care Center.</p>
                   </div>
                   </body>
                   </html>
                   ";
                   
                   $emailModel = new EmailModel();
                   $emailModel->sendEmail($petOwnerEmail, $subject, $message);
                    } else {
                        // $_SESSION['error'] = "Failed to fetch pet owner email!";
                    }

                    redirect('login');
                } else {
                    // Handle errors, e.g., unable to insert due to database issues
                    // $data['errors'] = ['general' => 'Failed to register. Please try again.'];
					$data['errors'] = $petownersModel->errors;

                }
            } else {
                // Validation failed, pass the errors to the view
                $data['errors'] = $petownersModel->errors;
            }
        }

        $this->view('signup', $data);
    }
}

   