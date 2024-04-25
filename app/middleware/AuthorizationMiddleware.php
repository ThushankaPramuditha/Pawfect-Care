<?php

class AuthorizationMiddleware {

    public static function authorize(array $allowedRoles):void {
        $user = $_SESSION['USER'];

        if (!$user || !(isset($user->user_type))) {
           redirect('login');
        }

        if (!in_array($user->user_type, $allowedRoles)) {

            //if admin is trying to access any other's role , then redirect him to admin dashboard
            if($user->user_type == 'Admin'){
                redirect('admin/dashboardservices');
            }
            else if($user->user_type == 'Ambulance Driver'){
                redirect('ambulancedriver/dashboard');
            }
            else if($user->user_type == 'Receptionist'){
                redirect('receptionist/dashboardreceptionist');
            }
            else if($user->user_type == 'Medical Staff'){
                redirect('medicalstaff/dashboardmedicalstaff');
            }
            else if($user->user_type == 'Veterinarian'){
                redirect('veterinarian/dashboardveterinarian');
            }
            else if($user->user_type == 'Daycare Staff'){
                redirect('daycarestaff/dashboarddaycarestaff');
            }
            else {
                redirect('petowner/home');
            }
        }


    }
}
