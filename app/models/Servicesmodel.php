<?php

class ServicesModel
{
    use Model;

    protected $table = 'services';
    protected $allowedColumns = ['service', 'description'];

    public function getAllServices()
    {
        return $this->findAll();
    }

    public function getServiceById($id)
    {
        return $this->first(['id' => $id]);
    }

    public function addService($data)
    {
        return $this->insert($data);
    }

    public function updateService($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }
    
    public function deleteService($id)
    {
        return $this->delete($id);
    }

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['service'])) {
            $this->errors['service'] = "Service name is required";
        }

        if (empty($data['description'])) {
            $this->errors['description'] = "Description is required";
        }

        return empty($this->errors);
    }
}


