<?php 

class Login
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
				// Check if the user's account is active
                if($row->status == 'inactive') {
                    $user->errors['account'] = "Your account has been deactivated.";
                }
                // Use verifyPassword method to check the password
                else if($user->verifyPassword($_POST['password'], $row->password))
                {
                    $_SESSION['USER'] = $row;
                   
                    
                    if($row->user_type == 'admin'){
                        redirect('admin/dashboardservices/');
                    }
                    else if($row->user_type == 'pet-ambulance-driver'){
                        redirect('ambulanceDriver/dashboard/');
                    }
                    else if($row->user_type == 'receptionist'){
                        redirect('receptionist/dashboardreceptionist/');
                    }
                    else if($row->user_type == 'medical-staff'){
                        redirect('medicalstaff/dashboardmedicalstaff/');
                    }
                    else if($row->user_type == 'veterinarian'){
                        redirect('veterinarian/dashboardveterinarian/');
                    }
                    else if($row->user_type == 'daycare-staff'){
                        redirect('daycarestaff/dashboarddaycarestaff/');
                    }
                    else {
                        redirect('home');
                    }
                }
                else
                {
                    $user->errors['email'] = "Wrong email or password";
                }
            }
            else
            {
                $user->errors['email'] = "Wrong email or password";
            }
            $data['errors'] = $user->errors;
        }

        $this->view('login',$data);

    }
}

