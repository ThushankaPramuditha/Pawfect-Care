<?php 

class Receptionists
{
	use Controller;

	public function index(string $a = '', string $b = '', string $c = ''): void
	{
		$receptionistsModel = new ReceptionistsModel();
		// show($receptionistsModel->findAll());
		$data['receptionists'] = $receptionistsModel->getAllReceptionists();
        
		$this->view('admin/receptionists', $data);
	}


    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $receptionistsModel = new ReceptionistsModel();
        $success = $receptionistsModel->updateReceptionist($a, $_POST);
        if($success){
            $_SESSION['flash'] = ['success' => 'Receptionist updated successfully!'];
            header('Location: ' . ROOT . '/admin/receptionists');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update receptionist'];
            header('Location: ' . ROOT . '/admin/receptionists');
            exit();
        };
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $receptionistsModel = new ReceptionistsModel();
        $success = $receptionistsModel->addReceptionist($_POST);
        if($success){
            $_SESSION['flash'] = ['success' => 'Receptionist added successfully!'];
            header('Location: ' . ROOT . '/admin/receptionists');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to add receptionist'];
            header('Location: ' . ROOT . '/admin/receptionists');
            exit();
        };
    }

    

    public function viewReceptionist(string $a = '', string $b = '', string $c = ''):void {
        $receptionistsModel = new ReceptionistsModel();
        $data['receptionists'] = $receptionistsModel->getReceptionistById($a);
        // show($a);
        // die();
        $this->view('admin/receptionists/update', $data);

    }
    public function deactivate(string $id): void
    {
        $receptionistsModel = new ReceptionistsModel();
        $success = $receptionistsModel->deactivateReceptionist($id);

        if($success){
            $_SESSION['flash'] = ['success' => 'Receptionist decativated successfully!'];
            header('Location: ' . ROOT . '/admin/receptionists');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to deactivate receptionist'];
            header('Location: ' . ROOT . '/admin/receptionists');
            exit();
        };
    }

    public function activate(string $id): void
    {
        $receptionistsModel = new ReceptionistsModel();
        $success = $receptionistsModel->activateReceptionist($id);

        if($success){
            $_SESSION['flash'] = ['success' => 'Receptionist activated successfully!'];
            header('Location: ' . ROOT . '/admin/receptionists');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to activate receptionist'];
            header('Location: ' . ROOT . '/admin/receptionists');
            exit();
        };
    }
    public function search(): void
    {
        $receptionistsModel = new ReceptionistsModel();
        $searchTerm = $_POST['search'] ?? '';
        $receptionists = $receptionistsModel->search($searchTerm);
        if(empty($receptionists)){
            echo "<tr><td colspan='20'>No receptionists found</td></tr>";
        }
        else{
            foreach ($receptionists as $receptionist) {
                echo "<tr key='{$receptionist->id}'>";
                echo "<td>{$receptionist->id}</td>";
                echo "<td>{$receptionist->name}</td>";
                echo "<td>{$receptionist->address}</td>";
                echo "<td>{$receptionist->contact}</td>";
                echo "<td>{$receptionist->nic}</td>";
                echo "<td>{$receptionist->email}</td>";
                echo "<td>{$receptionist->qualifications}</td>";
                echo "<td>{$receptionist->status}</td>";
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



    


