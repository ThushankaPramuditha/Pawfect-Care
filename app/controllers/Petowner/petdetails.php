<?php

class Petdetails
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
        $petDetailsModel = new PetDetailsModel();
        $data['petDetails'] = $petDetailsModel->getAllPetDetails();

        // You can include any additional logic or data fetching here

        $this->view('petowner/petdetails', $data);
    }

    public function update(string $id = ''): void
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
        $petDetailsModel = new PetDetailsModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $petDetailsModel->updatePetDetails($id, $_POST);
        }

        redirect('petowner/petdetails');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $petDetailsModel = new PetDetailsModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $petDetailsModel->addPetDetails($_POST);
        }

        redirect('petowner/petdetails');
    }

    public function delete(string $id): void
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $petDetailsModel = new PetDetailsModel();
        $petDetailsModel->deletePetDetails($id);

        redirect('petowner/petdetails');
    }

    public function viewPetDetails(string $id): void
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
        
        $petDetailsModel = new PetDetailsModel();
        $data['petdetails'] = $petDetailsModel->getPetDetailsById($id);

        $this->view('petowner/petdetails/update', $data);
    }
}
