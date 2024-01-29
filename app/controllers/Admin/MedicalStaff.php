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
        $medicalstaffModel->updateMedicalStaff($a, $_POST);

        redirect('admin/medicalstaff');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $medicalstaffModel = new MedicalStaffModel();
        $medicalstaffModel->addMedicalStaff($_POST);

        redirect('admin/medicalstaff');
    }

    public function delete(string $id): void
    {
        $medicalstaffModel = new MedicalStaffModel();
        $medicalstaffModel->delete($id, 'id');

        redirect('admin/medicalstaff');
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

        if ($success) {
            echo "Medical Staff deactivated successfully!";
            redirect('admin/medicalstaff'); //
        } else {
            echo "Failed to deactivate medical staff!";
            // Implement appropriate error handling here
        }
        redirect('admin/medicalstaff');
    }

        
}



    


?>