<?php

class VeterinariansModel
{
    use Model;

    protected $table = 'veterinarians';
    protected $allowedColumns = ['id','name', 'address', 'contact', 'nic', 'email', 'qualifications', 'status'];

    public function getAllVeterinarians()
    {
        return $this->where(['status' => 'active']);
    }

    public function getVeterinarianById($id)
    {
        return $this->first(['id' => $id]);
    }

    public function addVeterinarian($data)
    {
        return $this->insert($data);
    }

    public function updateVeterinarian($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

    public function deleteVeterinarian($id)
    {
        return $this->delete($id);
    }

    public function deactivateVeterinarian($id)
    {
        return $this->update($id, ['status' => 'inactive']);
    }

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['name'])) {
            $this->errors['name'] = "Name is required";
        }
    
        if (empty($data['address'])) {
            $this->errors['address'] = "Address is required";
        }
    
        if (empty($data['contact'])) {
            $this->errors['contact'] = "Contact is required";
        }
    
        if (empty($data['nic'])) {
            $this->errors['nic'] = "NIC is required";
        }
    
        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        }
    
        if (empty($data['qualifications'])) {
            $this->errors['qualifications'] = "Qualifications are required";
        }

        return empty($this->errors);
    }
}


