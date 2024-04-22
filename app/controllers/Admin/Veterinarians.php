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
        $success = $veterinariansModel->updateVeterinarian($a, $_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Veterinarian updated successfully!'];
            header('Location: ' . ROOT . '/admin/veterinarians');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update veterinarian'];
            header('Location: ' . ROOT . '/admin/veterinarians');
            exit();
        };

    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $veterinariansModel = new VeterinariansModel();
        $success = $veterinariansModel->addVeterinarian($_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Veterinarian added successfully!'];
            header('Location: ' . ROOT . '/admin/veterinarians');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to add veterinarian'];
            header('Location: ' . ROOT . '/admin/veterinarians');
            exit();
        };
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

        
        if($success){
            $_SESSION['flash'] = ['success' => 'Veterinarian deactivated successfully!'];
            header('Location: ' . ROOT . '/admin/veterinarians');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to deactivate veterinarian'];
            header('Location: ' . ROOT . '/admin/veterinarians');
            exit();
        };
    }

    public function activate(string $id): void
    {
        $veterinariansModel = new VeterinariansModel();
        $success = $veterinariansModel->activateVeterinarian($id);

        
        if($success){
            $_SESSION['flash'] = ['success' => 'Veterinarian activated successfully!'];
            header('Location: ' . ROOT . '/admin/veterinarians');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to activate veterinarian'];
            header('Location: ' . ROOT . '/admin/veterinarians');
            exit();
        };
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