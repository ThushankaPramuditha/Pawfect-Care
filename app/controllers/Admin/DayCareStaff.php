<?php 

class DaycareStaff
{
	use Controller;

	public function index(string $a = '', string $b = '', string $c = ''): void
	{
		$daycarestaffModel = new DaycareStaffModel();
		// show($daycarestaffModel->findAll());
		$data['daycarestaff'] = $daycarestaffModel->getAllDaycareStaff();
        
		$this->view('admin/daycarestaff', $data);
	}


    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $daycarestaffModel = new DaycareStaffModel();
        $daycarestaffModel->updateDaycareStaff($a, $_POST);

        redirect('admin/daycarestaff');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $daycarestaffModel = new DaycareStaffModel();
        $daycarestaffModel->addDaycareStaff($_POST);

        redirect('admin/daycarestaff');
    }

    public function delete(string $id): void
    {
        $daycarestaffModel = new DaycareStaffModel();
        $daycarestaffModel->delete($id, 'id');

        redirect('admin/daycarestaff');
    }

    public function viewDaycareStaff(string $a = '', string $b = '', string $c = ''):void {
        $daycarestaffModel = new DaycareStaffModel();
        $data['daycarestaff'] = $daycarestaffModel->getDaycareStaffById($a);
        // show($a);
        // die();
        $this->view('admin/daycarestaff/update', $data);

    }
    public function deactivate(string $id): void
    {
        $daycarestaffModel = new DaycareStaffModel();
        $success = $daycarestaffModel->deactivateDaycareStaff($id);

        if ($success) {
            echo "DaycareStaff deactivated successfully!";
            redirect('admin/daycarestaff'); //
        } else {
            echo "Failed to deactivate daycarestaff!";
            // Implement appropriate error handling here
        }
        redirect('admin/daycarestaff');
    }

    public function activate(string $id): void
    {
        $daycarestaffModel = new DaycareStaffModel();
        $success = $daycarestaffModel->activateDaycareStaff($id);

        if ($success) {
            echo "DaycareStaff activated successfully!";
            redirect('admin/daycarestaff'); //
        } else {
            echo "Failed to activate daycarestaff!";
            // Implement appropriate error handling here
        }
        redirect('admin/daycarestaff');
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