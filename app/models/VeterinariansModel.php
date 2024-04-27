<?php

class VeterinariansModel
{
    use Model;

    protected $table = 'veterinarians';
    protected $allowedColumns = ['name', 'address', 'contact', 'nic', 'qualifications', 'user_id', 'status', 'availability'];


    public function getAllVeterinarians() {
        $query = "SELECT v.*, u.email ,u.status
                  FROM veterinarians AS v
                  JOIN users AS u ON v.user_id = u.id";

        return $this->query($query);
        
    }

    public function getAllAvailableVeterinarians() {
        $query = "SELECT v.*, u.email ,u.status
                  FROM veterinarians AS v
                  JOIN users AS u ON v.user_id = u.id
                WHERE v.availability = 'available'";

        return $this->query($query);
        
    }

    public function search($term)
    {
        $term = "%{$term}%";
        $query = "SELECT v.*, u.email ,u.status
                FROM {$this->table} AS v
                JOIN users AS u ON v.user_id = u.id 
                WHERE name LIKE :term";
        
        return $this->query($query, [':term' => $term]);
    }


    public function getVeterinarianById($id) {
        $query = "SELECT v.*, u.email, u.status
                  FROM veterinarians AS v
                  JOIN users AS u ON v.user_id = u.id
                  WHERE v.id = :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);


    }

    public function getVetRoleDataById($id) {
        $query = "SELECT v.*, u.email, u.status ,u.user_type
                  FROM veterinarians AS v
                  JOIN users AS u ON v.user_id = u.id
                  WHERE u.id = :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);


    }

    
    /*public function getVetIdByName($vetName)
    {
        $conditions = ['name' => $vetName];
    
        $result = $this->first($conditions);
    
        // Check if a veterinarian with the given name exists
        if ($result && property_exists($result, 'id')) {
            return $result->id;
        } else {
            return false; 
        }
    }*/
    
    public function getVetIdByName($vetName)
    {
        $query = "SELECT id FROM $this->table WHERE name = :vet_name";
        
        $bindings = [
            'vet_name' => $vetName,
        ];

        $result = $this->query($query, $bindings);

        if ($result && count($result) > 0) {
            return $result[0]->id;
        } else {
            return false; 
        }

    }

    public function getVeterinarianIdByUserId($userId)
    {
        $query = "SELECT id FROM $this->table WHERE user_id = :user_id";
        
        $bindings = [
            'user_id' => $userId,
        ];

        $result = $this->query($query, $bindings);

        if ($result && count($result) > 0) {
            return $result[0]->id;
        } else {
            return false; 
        }
    }

    

    public function addVeterinarian($data)
    {
        $userModel = new UserModel;
        

        // Register the veterinarian as a user and directly assign the user_id to $data array
        $data['user_id'] = $userModel->addUser([
            'email' => $data['email'],
            'password' => $data['password'],
            'user_type' => 'Veterinarian', 
        ]);

        if ($data['user_id']) {
            // Prepare veterinarian-specific data
            $staffData = [
                'user_id' => $data['user_id'],
                'name' => $data['name'],
                'address' => $data['address'],
                'contact' => $data['contact'],
                'nic' => $data['nic'],
                'qualifications' => $data['qualifications'],
            ];

            return $this->insert($staffData);
            

            // Attempt to insert veterinarian-specific data into the veterinarians table
            if (!($this->insert($staffData))) {
                $this->errors[] = 'Failed to insert veterinarian data';
                return false;
            }
        } else {
            $this->errors[] = 'User registration failed';
            return false; 
        }
    }

    public function updateVeterinarian($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

    public function updateAvailability($id, $newAvailability)
    {
        
        $query = "UPDATE veterinarians SET availability = :newAvailability WHERE id = :id";
        return $this->query($query, ['newAvailability' => $newAvailability, 'id' => $id]);
    }
    

    public function deleteVeterinarian($id)
    {
        return $this->delete($id);
    }

    // public function deactivateVeterinarian($id)
    // {
    //     return $this->update($id, ['status' => 'inactive']);
    // }
    public function deactivateVeterinarian($id)
    {
        // Get the user_id associated with the veterinarian
        $staffData = $this->getVeterinarianById($id);
        if ($staffData && isset($staffData->user_id)) {
            $userModel = new UserModel();
            // Call a method in the UserModel to update the status
            return $userModel->updateUserStatus($staffData->user_id, 'inactive');
        }

        return false;
    }
    public function activateVeterinarian($id)
    {
        // Get the user_id associated with the veterinarian
        $staffData = $this->getVeterinarianById($id);
        if ($staffData && isset($staffData->user_id)) {
            $userModel = new UserModel();
            // Call a method in the UserModel to update the status
            return $userModel->updateUserStatus($staffData->user_id, 'active');
        }

        return false;
    }


    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['name'])) {
            $this->errors['name'] = "Name is required";
        }

        if(empty($data['address'])) {
            $this->errors['address'] = "Address is required";
        }

        if(empty($data['contact_no'])) {
            $this->errors['contact_no'] = "Contact number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $data['contact_no'])) {
            $this->errors['contact_no'] = "Contact number is not valid";
        }

       
        if (empty($data['nic'])) {
            $this->errors['nic'] = "NIC is required";
        } elseif (!preg_match('/^[0-9]{9}[vVxX]$|^([0-9]{12})$/', $data['nic'])) {
            $this->errors['nic'] = "NIC is not valid";
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


