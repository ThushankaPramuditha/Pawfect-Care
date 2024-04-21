<?php 

class Veterinarians
{
	use Controller;

	public function index(string $a = '', string $b = '', string $c = ''): void
	{
		$veterinariansModel = new VeterinariansModel();
		// show($veterinariansModel->findAll());
		$data['veterinarians'] = $veterinariansModel->getAllVeterinarians();
        
		$this->view('admin/veterinarians', $data);
	}


    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $veterinariansModel = new VeterinariansModel();
        $veterinariansModel->updateVeterinarian($a, $_POST);

        redirect('admin/veterinarians');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $veterinariansModel = new VeterinariansModel();
        $veterinariansModel->addVeterinarian($_POST);

        redirect('admin/veterinarians');
    }

    public function delete(string $id): void
    {
        $veterinariansModel = new VeterinariansModel();
        $veterinariansModel->delete($id, 'id');

        redirect('admin/veterinarians');
    }

    public function viewVeterinarian(string $a = '', string $b = '', string $c = ''):void {
        $veterinariansModel = new VeterinariansModel();
        $data['veterinarians'] = $veterinariansModel->getVeterinarianById($a);
        // show($a);
        // die();
        $this->view('admin/veterinarians/update', $data);

    }
    public function deactivate(string $id): void
    {
        $veterinariansModel = new VeterinariansModel();
        $success = $veterinariansModel->deactivateVeterinarian($id);

        if ($success) {
            echo "Veterinarian deactivated successfully!";
            redirect('admin/veterinarians'); //
        } else {
            echo "Failed to deactivate veterinarian!";
            // Implement appropriate error handling here
        }
        redirect('admin/veterinarians');
    }

    public function activate(string $id): void
    {
        $veterinariansModel = new VeterinariansModel();
        $success = $veterinariansModel->activateVeterinarian($id);

        if ($success) {
            echo "Veterinarian activated successfully!";
            redirect('admin/veterinarians'); //
        } else {
            echo "Failed to activate veterinarian!";
            // Implement appropriate error handling here
        }
        redirect('admin/veterinarians');
    }
    public function search(): void
    {
        $veterinariansModel = new VeterinariansModel();
        $searchTerm = $_POST['search'] ?? '';
        $veterinarians = $veterinariansModel->search($searchTerm);
        if(empty($veterinarians)){
            echo "<tr><td colspan='20'>No veterinarians found</td></tr>";
        }
        else{
            foreach ($veterinarians as $vet) {
                echo "<tr key='{$vet->id}'>";
                echo "<td>{$vet->id}</td>";
                echo "<td>{$vet->name}</td>";
                echo "<td>{$vet->address}</td>";
                echo "<td>{$vet->contact}</td>";
                echo "<td>{$vet->nic}</td>";
                echo "<td>{$vet->email}</td>";
                echo "<td>{$vet->qualifications}</td>";
                echo "<td>{$vet->status}</td>";
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