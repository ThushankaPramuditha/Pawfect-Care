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

    public function search(): void
    {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $searchTerm = $_POST['search'] ?? '';
        $ambulancedrivers = $ambulancedriversModel->search($searchTerm);
        if(empty($ambulancedrivers)){
            echo "<tr><td colspan='20'>No ambulance drivers found</td></tr>";
        }
        else{
            foreach ($ambulancedrivers as $ambulancedriver) {
                echo "<tr key='{$ambulancedriver->id}'>";
                echo "<td>{$ambulancedriver->id}</td>";
                echo "<td>{$ambulancedriver->name}</td>";
                echo "<td>{$ambulancedriver->address}</td>";
                echo "<td>{$ambulancedriver->contact}</td>";
                echo "<td>{$ambulancedriver->nic}</td>";
                echo "<td>{$ambulancedriver->email}</td>";
                echo "<td>{$ambulancedriver->license}</td>";
                echo "<td>{$ambulancedriver->status}</td>";
                echo "<td class='edit-action-buttons'>";
                echo "<button class='edit-icon'></button>";
                echo "</td>";
                echo "<td class='activate-action-buttons'>";
                echo "<button class='activate-button'>Activate</button>";
                echo "</td>";
                echo "<td class='deactivate-action-buttons'>";
                echo "<button class='deactivate-button'>Deactivate</button>";
                echo "</td>";
                echo "</tr>";
            }
        }
        exit; 

    }

        
}



    


?>
