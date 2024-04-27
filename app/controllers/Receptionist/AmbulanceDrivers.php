<?php 

class AmbulanceDrivers
{
	use Controller;

        public function index(string $a = '', string $b = '', string $c = ''): void
        {
            AuthorizationMiddleware::authorize(['Receptionist']);
            $driversModel = new AmbulanceDriversModel();
            // show($servicesModel->findAll());
            $data['ambulancedrivers'] = $driversModel->getAllAmbulanceDrivers();

            $userdataModel = new ReceptionistsModel();
		    $data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);
            

            // You can include any additional logic or data fetching here

            $this->view('receptionist/ambulancedrivers', $data);
        }

        public function changeAvailability($id)
        {
        
            AuthorizationMiddleware::authorize(['Receptionist']);
            $driversModel = new AmbulanceDriversModel();
            
            $currentAvailability = $driversModel->getAmbulanceDriverById($id);
            $newAvailability = ($currentAvailability->availability) === 'available' ? 'unavailable' : 'available';
            
            $success = $driversModel->updateAvailability($id, $newAvailability);
    
            if ($success) {
                $_SESSION['flash'] = ['success' => 'Availability updated successfully!'];
            } else {
                $_SESSION['flash'] = ['error' => 'Failed to update availability.'];
            }
    
            header('Location: ' . ROOT . '/receptionist/ambulancedrivers');
            exit;
        }
}