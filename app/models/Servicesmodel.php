<?php

class ServicesModel
{
    use Model;

    protected $table = 'services';
    protected $allowedColumns = ['id','service', 'description'];

    public function getAllServices()
    {
        //order the date by ascending order
        $query = "SELECT *
         FROM services 
         ORDER BY id ASC";
        
        return $this->query($query);
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

    public function search($term)
    {
        $term = "%{$term}%";
        $query = "SELECT * FROM {$this->table} 
                WHERE service LIKE :term";
        
        return $this->query($query, [':term' => $term]);
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


