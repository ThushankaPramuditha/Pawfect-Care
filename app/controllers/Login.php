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
				if($row->password === $_POST['password'])
				{
					$_SESSION['USER'] = $row;
					redirect('home');
				}
			}
          
            $data['errors'] = $user->errors;
        }

        $this->view('login',$data);
    }
}

