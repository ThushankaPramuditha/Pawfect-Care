<!-- <?php
/**
 * services class
 */
class Services
{
    use Controller;

    public function index()
    {
        $servicesModel = new ServicesModel;
        $services = $servicesModel->getAllServices();
        
        // Echo the services retrieved
        echo "Services retrieved: ";
        // var_dump($services);

        // $this->view('admin/services/index', ['services' => $services]);
		$data = ['services' => $services];
		$this->view('admin/services/index', $data);
    }

    public function create()
    {
        $data = [];
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $servicesModel = new ServicesModel;
            if ($servicesModel->validate($_POST)) {
                $servicesModel->createService($_POST);
                echo "Service created!";
                redirect('admin/services');
            } else {
                echo "Validation errors: ";
                var_dump($servicesModel->errors);
            }

            $data['errors'] = $servicesModel->errors;            
        }

        $this->view('admin/services/create', $data);
    }

    public function edit($id)
    {
        $data = [];
        $servicesModel = new ServicesModel;
        $service = $servicesModel->getServiceById($id);
        
        // Echo the service retrieved for editing
        echo "Service retrieved for editing: ";
        var_dump($service);
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($servicesModel->validate($_POST)) {
                $servicesModel->updateService($id, $_POST);
                echo "Service updated!";
                redirect('admin/services/index');
            } else {
                echo "Validation errors: ";
                var_dump($servicesModel->errors);
            }

            $data['errors'] = $servicesModel->errors;            
        }

        $data['service'] = $service;
        $this->view('admin/services/edit', $data);
    }

    public function destroy($id)
    {
        $servicesModel = new ServicesModel;
        $servicesModel->deleteService($id);
        echo "Service deleted!";
        redirect('admin/services');
    }
}
