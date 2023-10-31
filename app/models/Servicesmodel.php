<?php

class Servicesmodel
{
    use Model;
    protected $table = 'services';
    protected $allowedColumns = ['service_tittle', 'description'];

    public function getAllServices()
    {
        
       return $this->findAll();
    }

    public function getServiceById($id)
    {
        return $this->first(['id' => $id]);
    }

    public function createService($data)
    {
        $this->insert($data);
    }

    public function updateService($id, $data)
    {
        $this->update($id, $data);
    }

    public function deleteService($id)
    {
        $this->delete($id);
    }
}

?>
