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

        
}



    


?>