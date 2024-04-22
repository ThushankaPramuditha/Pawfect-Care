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
        $success = $ambulancedriversModel->updateAmbulanceDriver($a, $_POST);
        if($success){
            $_SESSION['flash'] = ['success' => 'Ambulance Driver updated successfully!'];
            header('Location: ' . ROOT . '/admin/ambulancedrivers');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update the ambulance driver'];
            header('Location: ' . ROOT . '/admin/ambulancedrivers');
            exit();
        };
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $success = $ambulancedriversModel->addAmbulanceDriver($_POST);
        if($success){
            $_SESSION['flash'] = ['success' => 'Ambulance Driver added successfully!'];
            header('Location: ' . ROOT . '/admin/ambulancedrivers');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to add the ambulance driver'];
            header('Location: ' . ROOT . '/admin/ambulancedrivers');
            exit();
        };
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

        if($success){
            $_SESSION['flash'] = ['success' => 'Ambulance Driver deactivated successfully!'];
            header('Location: ' . ROOT . '/admin/ambulancedrivers');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to deactivate the ambulance driver'];
            header('Location: ' . ROOT . '/admin/ambulancedrivers');
            exit();
        };
    }

    public function activate(string $id): void
    {
        $ambulancedriversModel = new AmbulanceDriversModel();
        $success = $ambulancedriversModel->activateAmbulanceDriver($id);

        if($success){
            $_SESSION['flash'] = ['success' => 'Ambulance Driver activated successfully!'];
            header('Location: ' . ROOT . '/admin/ambulancedrivers');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to activate the ambulance driver'];
            header('Location: ' . ROOT . '/admin/ambulancedrivers');
            exit();
        };
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
