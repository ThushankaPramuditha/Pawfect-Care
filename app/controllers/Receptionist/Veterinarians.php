<?php 

class Veterinarians
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Receptionist']);
		$userdataModel = new ReceptionistsModel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

		$vetsModel = new VeterinariansModel();
            // show($servicesModel->findAll());
            $data['vets'] = $vetsModel->getAllVeterinarians();

		$this->view('receptionist/veterinarians',$data);
	}


        public function changeAvailability($id)
        {
        
			AuthorizationMiddleware::authorize(['Receptionist']);
            $vetsModel = new VeterinariansModel();
            $currentAvailability = $vetsModel->getVeterinarianById($id);
            $newAvailability = ($currentAvailability->availability) === 'available' ? 'unavailable' : 'available';
            
            $success = $vetsModel->updateAvailability($id, $newAvailability);
    
            if ($success) {
                $_SESSION['flash'] = ['success' => 'Availability updated successfully!'];
            } else {
                $_SESSION['flash'] = ['error' => 'Failed to update availability.'];
            }
    
            header('Location: ' . ROOT . '/receptionist/veterinarians');
            exit;
        }
}

?>
