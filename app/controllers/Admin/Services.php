<?php

class Services
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $servicesModel = new ServicesModel();
        // show($servicesModel->findAll());
        $data['services'] = $servicesModel->getAllServices();

        // You can include any additional logic or data fetching here

        $this->view('admin/services', $data);
    }

    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $servicesModel = new ServicesModel();
        $success = $servicesModel->updateService($a, $_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Service updated successfully!'];
            header('Location: ' . ROOT . '/admin/services');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to update service'];
            header('Location: ' . ROOT . '/admin/services');
            exit();
        }

        redirect('admin/services');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $servicesModel = new ServicesModel();
        $success = $servicesModel->addService($_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Service added successfully!'];
            header('Location: ' . ROOT . '/admin/services');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to add service'];
            header('Location: ' . ROOT . '/admin/services');
            exit();
        };
    }

    public function delete(string $id): void
    {
        $servicesModel = new ServicesModel();
        $success = $servicesModel->deleteService($id, 'id');

        if($success){
            $_SESSION['flash'] = ['success' => 'Service deleted successfully!'];
            header('Location: ' . ROOT . '/admin/services');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to delete service'];
            header('Location: ' . ROOT . '/admin/services');
            exit();
        }
  
    }

    public function viewService(string $a = '', string $b = '', string $c = ''):void {
        $servicesModel = new ServicesModel();
        $data['service'] = $servicesModel->getServiceById($a);
        $this->view('admin/services/update', $data);
    }

    public function search(): void
    {
        $servicesModel = new ServicesModel();
        $searchTerm = $_POST['search'] ?? '';
        $services = $servicesModel->search($searchTerm);
        if(empty($services)){
            echo "<tr><td colspan='20'>No services found</td></tr>";
        }
        else{
            foreach ($services as $service) {
                echo "<tr key='{$service->id}'>";
                echo "<td><b>{$service->service}</b></td>";
                echo "<td>{$service->description}</td>";
                echo "<td class='edit-action-buttons'>";
                echo "<button class='edit-icon'></button>";
                echo "</td>";
                echo "<td class='delete-action-buttons'>";
                echo "<button class='delete-icon'></button>";
                echo "</td>";
                echo "</tr>";
            }
        }
        exit; 

    }
    


}
