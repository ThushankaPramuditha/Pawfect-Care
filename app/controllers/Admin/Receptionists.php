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
        $receptionistsModel->updateReceptionist($a, $_POST);

        redirect('admin/receptionists');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $receptionistsModel = new ReceptionistsModel();
        $receptionistsModel->addReceptionist($_POST);

        redirect('admin/receptionists');
    }

    public function delete(string $id): void
    {
        $receptionistsModel = new ReceptionistsModel();
        $receptionistsModel->delete($id, 'id');

        redirect('admin/receptionists');
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

        if ($success) {
            echo "Receptionist deactivated successfully!";
            redirect('admin/receptionists'); //
        } else {
            echo "Failed to deactivate Receptionist!";
            // Implement appropriate error handling here
        }
        redirect('admin/receptionists');
    }

    public function activate(string $id): void
    {
        $receptionistsModel = new ReceptionistsModel();
        $success = $receptionistsModel->activateReceptionist($id);

        if ($success) {
            echo "Receptionist activated successfully!";
            redirect('admin/receptionists'); //
        } else {
            echo "Failed to activate Receptionist!";
            // Implement appropriate error handling here
        }
        redirect('admin/receptionists');
    }
    

        
}



    


?>