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
                   
                    
                    if($row->user_type == 'Admin'){
                        redirect('admin/dashboardservices/');
                    }
                    else if($row->user_type == 'Ambulance Driver'){
                        redirect('ambulancedriver/dashboard/');
                    }
                    else if($row->user_type == 'Receptionist'){
                        redirect('receptionist/dashboardreceptionist/');
                    }
                    else if($row->user_type == 'Medical Staff'){
                        redirect('medicalstaff/dashboardmedicalstaff/');
                    }
                    else if($row->user_type == 'Veterinarian'){
                        redirect('veterinarian/dashboardveterinarian/');
                    }
                    else if($row->user_type == 'Daycare Staff'){
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

