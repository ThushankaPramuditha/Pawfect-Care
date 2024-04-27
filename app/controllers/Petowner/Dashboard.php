<?php 

class Dashboard
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {  
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
        $data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
        $userId = $_SESSION['USER']->id;
        $petownerModel = new PetownersModel();
        $petsModel = new PetsModel();
        $data['user_id'] = $userId;
        $data['daycareBookings']= $petownerModel->getDaycareBookingsByUserId($userId);
        $data['pets'] = $petsModel->getAllPetsByUserId($userId);
        $data['petownerId'] = $petownerModel->getPetOwnerById($userId);
        $receiveId = $petownerModel->getPetOwnerIdByUserId( $_SESSION['USER']->id);
        
        //notifications
        $notificationModel = new NotificationModel();
        $data['vetappointmentnotifications'] = $notificationModel->getVetNotificationByUserId($userId);
        $data['daycarenotifications'] = $notificationModel->getDaycareNotificationsByReceiverId($receiveId);

   
        $this->view('petowner/dashboard', $data);
    }
    
    public function addPet(){
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $petDetailsModel = new PetsModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['petowner_id'] = $data['userdata']->id;
            $success = $petDetailsModel->addPet($_POST);
        }
    
        if($success){
            $_SESSION['flash'] = ['success' => 'Pet added successfully!'];
            header('Location: ' . ROOT . '/petowner/dashboard');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to add Pet'];
            header('Location: ' . ROOT . '/petowner/dashboard');
            exit();
        };
    }

    public function updatePet(string $id){
        
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $petDetailsModel = new PetsModel();
        $success = $petDetailsModel->updatePet($id, $_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Pet updated successfully!'];
            header('Location: ' . ROOT . '/petowner/dashboard');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update Pet'];
            header('Location: ' . ROOT . '/petowner/dashboard');
            exit();
        };
    }   
     
    public function viewPetDetails(string $a = '', string $b = '', string $c = ''):void {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
        
        $petDetailsModel = new PetsModel();
        //  $data['pet'] = $petDetailsModel->getPetDetailsById($a);

        $data['pet'] = $petDetailsModel->getPetById($a);
        


        $this->view('petowner/dashboard/update', $data);

    }

   

    //validation
    public function validatePetDetails(array $data): array
    {
        $errors = [];
        if (empty($data['name'])) {
            $errors['name'] = 'Pet Name is required';
        }
        if (empty($data['breed'])) {
            $errors['breed'] = 'Breed is required';
        }
        if (empty($data['age'])) {
            $errors['age'] = 'Age is required';
        }
        if (empty($data['species'])){
            $errors['species'] = 'Species is required';
        }
        
        return $errors;
    }


}