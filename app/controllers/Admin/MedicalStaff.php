<?php 

class MedicalStaff
{
	use Controller;

	public function index(string $a = '', string $b = '', string $c = ''): void
	{
		$medicalstaffModel = new MedicalStaffModel();
		// show($medicalstaffModel->findAll());
		$data['medstaff'] = $medicalstaffModel->getAllMedicalStaff();
        
		$this->view('admin/medicalstaff', $data);
	}


    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $medicalstaffModel = new MedicalStaffModel();
        $success = $medicalstaffModel->updateMedicalStaff($a, $_POST);
        if($success){
            $_SESSION['flash'] = ['success' => 'Medical staff member updated successfully!'];
            header('Location: ' . ROOT . '/admin/medicalstaff');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update the medical staff member'];
            header('Location: ' . ROOT . '/admin/medicalstaff');
            exit();
        };
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $medicalstaffModel = new MedicalStaffModel();
        $success = $medicalstaffModel->addMedicalStaff($_POST);
        if($success){
            $_SESSION['flash'] = ['success' => 'Medical staff member added successfully!'];
            header('Location: ' . ROOT . '/admin/medicalstaff');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to add the medical staff member'];
            header('Location: ' . ROOT . '/admin/medicalstaff');
            exit();
        };
    }

    public function viewMedicalStaff(string $a = '', string $b = '', string $c = ''):void {
        $medicalstaffModel = new MedicalStaffModel();
        $data['medstaff'] = $medicalstaffModel->getMedicalStaffById($a);
        // show($a);
        // die();
        $this->view('admin/medicalstaff/update', $data);

    }
    public function deactivate(string $id): void
    {
        $medicalstaffModel = new MedicalStaffModel();
        $success = $medicalstaffModel->deactivateMedicalStaff($id);
        if($success){
            $_SESSION['flash'] = ['success' => 'Medical staff member deactivated successfully!'];
            header('Location: ' . ROOT . '/admin/medicalstaff');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to deactivate the medical staff member'];
            header('Location: ' . ROOT . '/admin/medicalstaff');
            exit();
        };
    }

    public function activate(string $id): void
    {
        $medicalstaffModel = new MedicalStaffModel();
        $success = $medicalstaffModel->activateMedicalStaff($id);

        if($success){
            $_SESSION['flash'] = ['success' => 'Medical staff member activated successfully!'];
            header('Location: ' . ROOT . '/admin/medicalstaff');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to activate the medical staff member'];
            header('Location: ' . ROOT . '/admin/medicalstaff');
            exit();
        };
    }
    public function search(): void
    {
        $medicalstaffModel = new MedicalStaffModel();
        $searchTerm = $_POST['search'] ?? '';
        $medicalstaff = $medicalstaffModel->search($searchTerm);
        if(empty($medicalstaff)){
            echo "<tr><td colspan='20'>No medical staff found</td></tr>";
        }
        else{
            foreach ($medicalstaff as $medstaff) {
                echo "<tr key='{$medstaff->id}'>";
                echo "<td>{$medstaff->id}</td>";
                echo "<td>{$medstaff->name}</td>";
                echo "<td>{$medstaff->address}</td>";
                echo "<td>{$medstaff->contact}</td>";
                echo "<td>{$medstaff->nic}</td>";
                echo "<td>{$medstaff->email}</td>";
                echo "<td>{$medstaff->qualifications}</td>";
                echo "<td>{$medstaff->status}</td>";
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