<?php 

class Daycarebooking
{
    use Controller;

    public function index()
    {
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        $userdataModel = new DaycareStaffModel();
		$data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);
        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
        $this->view('daycarestaff/daycarebooking',$data);
    }

}
