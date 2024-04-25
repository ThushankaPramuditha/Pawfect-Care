<?php 

class DaycareStaff
{
	use Controller;

	public function index(string $a = '', string $b = '', string $c = ''): void
	{
        AuthorizationMiddleware::authorize(['Admin']);
		$daycarestaffModel = new DaycareStaffModel();
		// show($daycarestaffModel->findAll());
		$data['daycarestaff'] = $daycarestaffModel->getAllDaycareStaff();
        
		$this->view('admin/daycarestaff', $data);
	}


    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Admin']);
        $daycarestaffModel = new DaycareStaffModel();
        $success = $daycarestaffModel->updateDaycareStaff($a, $_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Daycare staff member updated successfully!'];
            header('Location: ' . ROOT . '/admin/daycarestaff');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update the daycare staff member'];
            header('Location: ' . ROOT . '/admin/daycaresstaff');
            exit();
        };
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Admin']);
        $daycarestaffModel = new DaycareStaffModel();
        $success = $daycarestaffModel->addDaycareStaff($_POST);
        if($success){
            $_SESSION['flash'] = ['success' => 'Daycare staff member added successfully!'];
            header('Location: ' . ROOT . '/admin/daycarestaff');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to add the daycare staff member'];
            header('Location: ' . ROOT . '/admin/daycaresstaff');
            exit();
        };
    }

    public function viewDaycareStaff(string $a = '', string $b = '', string $c = ''):void {
        AuthorizationMiddleware::authorize(['Admin']);
        $daycarestaffModel = new DaycareStaffModel();
        $data['daycarestaff'] = $daycarestaffModel->getDaycareStaffById($a);
        // show($a);
        // die();
        $this->view('admin/daycarestaff/update', $data);

    }
    public function deactivate(string $id): void
    {
        AuthorizationMiddleware::authorize(['Admin']);
        $daycarestaffModel = new DaycareStaffModel();
        $success = $daycarestaffModel->deactivateDaycareStaff($id);

        if($success){
            $_SESSION['flash'] = ['success' => 'Daycare staff member deactivated successfully!'];
            header('Location: ' . ROOT . '/admin/daycarestaff');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to deactivate the daycare staff member'];
            header('Location: ' . ROOT . '/admin/daycaresstaff');
            exit();
        };
    }

    public function activate(string $id): void
    {
        AuthorizationMiddleware::authorize(['Admin']);
        $daycarestaffModel = new DaycareStaffModel();
        $success = $daycarestaffModel->activateDaycareStaff($id);

        if($success){
            $_SESSION['flash'] = ['success' => 'Daycare staff member activated successfully!'];
            header('Location: ' . ROOT . '/admin/daycarestaff');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to activate the daycare staff member'];
            header('Location: ' . ROOT . '/admin/daycaresstaff');
            exit();
        };
    }
    public function search(): void
    {
        $daycarestaffModel = new DaycareStaffModel();
        $searchTerm = $_POST['search'] ?? '';
        $daycarestaff = $daycarestaffModel->search($searchTerm);
        if(empty($daycarestaff)){
            echo "<tr><td colspan='20'>No daycare staff found</td></tr>";
        }
        else{
            foreach ($daycarestaff as $daycarestaff) {
                echo "<tr key='{$daycarestaff->id}'>";
                echo "<td>{$daycarestaff->id}</td>";
                echo "<td>{$daycarestaff->name}</td>";
                echo "<td>{$daycarestaff->address}</td>";
                echo "<td>{$daycarestaff->contact}</td>";
                echo "<td>{$daycarestaff->nic}</td>";
                echo "<td>{$daycarestaff->email}</td>";
                echo "<td>{$daycarestaff->qualifications}</td>";
                echo "<td>{$daycarestaff->status}</td>";
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