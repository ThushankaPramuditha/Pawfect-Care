<?php 

class AmbulanceDrivers
{
	use Controller;

	public function index(string $a = '', string $b = '', string $c = ''): void
	{
		$ambulancedriversModel = new AmbulanceDriversModel();
		$data['ambulancedrivers'] = $ambulancedriversModel->getAllAmbulanceDrivers();
        
		$this->view('admin/ambulancedrivers', $data);
	}


    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $ambulancedriversModel->updateAmbulanceDriver($a, $_POST);

        redirect('admin/ambulancedrivers');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $ambulancedriversModel->addAmbulanceDriver($_POST);

        redirect('admin/ambulancedrivers');
    }

    public function delete(string $id): void
    {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $ambulancedriversModel->delete($id, 'id');

        redirect('admin/ambulancedrivers');
    }

    public function viewAmbulanceDriver(string $a = '', string $b = '', string $c = ''):void {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $data['ambulancedrivers'] = $ambulancedriversModel->getAmbulanceDriverById($a);
        // show($a);
        // die();
        $this->view('admin/ambulancedrivers/update', $data);

    }
    public function deactivate(string $id): void
    {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $success = $ambulancedriversModel->deactivateAmbulanceDriver($id);

        if ($success) {
            echo "Ambulance driver deactivated successfully!";
            redirect('admin/ambulancedrivers'); //
        } else {
            echo "Failed to deactivate ambulance driver!";
            // Implement appropriate error handling here
        }
        redirect('admin/ambulancedrivers');
    }

    public function activate(string $id): void
    {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $success = $ambulancedriversModel->activateAmbulanceDriver($id);

        if ($success) {
            echo "Ambulance driver activated successfully!";
            redirect('admin/ambulancedrivers'); //
        } else {
            echo "Failed to activate ambulance driver!";
            // Implement appropriate error handling here
        }
        redirect('admin/ambulancedrivers');
    }

        
}



    


?>
