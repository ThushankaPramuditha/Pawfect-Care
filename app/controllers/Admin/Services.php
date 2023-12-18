<?php

class Services
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $servicesModel = new ServicesModel();
        // show($servicesModel->findAll());
        $data['services'] = $servicesModel->findAll();

        // You can include any additional logic or data fetching here

        $this->view('admin/services', $data);
    }

    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $servicesModel = new ServicesModel();
        $servicesModel->updateService($_POST);

        redirect('admin/services');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $servicesModel = new ServicesModel();
        $servicesModel->addService($_POST);

        redirect('admin/services');
    }

    public function delete(string $id): void
    {
        $servicesModel = new ServicesModel();
        $servicesModel->delete($id, 'id');

        redirect('admin/services');
    }
}
