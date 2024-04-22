<?php

class ReceptionistsModel
{
    use Model;

    protected $table = 'receptionists';
    protected $allowedColumns = ['name', 'address', 'contact', 'nic', 'qualifications', 'user_id','status'];

    public function getAllReceptionists() {
        $query = "SELECT r.*, u.email , u.status
                  FROM receptionists AS r
                  JOIN users AS u ON r.user_id = u.id";
        

        return $this->query($query);
        
    }
    public function search($term)
    {
        $term = "%{$term}%";
        $query = "SELECT r.*, u.email ,u.status
                FROM {$this->table} AS r
                JOIN users AS u ON r.user_id = u.id 
                WHERE name LIKE :term";
        
        return $this->query($query, [':term' => $term]);
    }

    public function getReceptionistById($id) {
        $query = "SELECT r.*, u.email , u.status
                  FROM receptionists AS r
                  JOIN users AS u ON r.user_id = u.id
                  WHERE r.id = :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }
    public function getReceptionistRoleDataById($id) {
        $query = "SELECT r.*, u.email , u.status ,u.user_type
                  FROM receptionists AS r
                  JOIN users AS u ON r.user_id = u.id
                  WHERE u.id = :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);


    }

    public function addReceptionist($data)
    {
        $userModel = new UserModel;
        

        // Register the receptionist as a user and directly assign the user_id to $data array
        $data['user_id'] = $userModel->addUser([
            'email' => $data['email'],
            'password' => $data['password'],
            'user_type' => 'Receptionist', 
        ]);

        if ($data['user_id']) {
            // Prepare receptionist-specific data
            $staffData = [
                'user_id' => $data['user_id'],
                'name' => $data['name'],
                'address' => $data['address'],
                'contact' => $data['contact'],
                'nic' => $data['nic'],
                'qualifications' => $data['qualifications'],
            ];

            return $this->insert($staffData);
            

            // Attempt to insert receptionist-specific data into the receptionists table
            if (!($this->insert($staffData))) {
                $this->errors[] = 'Failed to insert receptionist data';
                return false;
            }
        } else {
            $this->errors[] = 'User registration failed';
            return false; 
        }
    }

    public function updateReceptionist($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

    

    public function deleteReceptionist($id)
    {
        return $this->delete($id);
    }

    // public function deactivateReceptionist($id)
    // {
    //     return $this->update($id, ['status' => 'inactive']);
    // }
    public function deactivateReceptionist($id)
    {
        // Get the user_id associated with the receptionist
        $staffData = $this->getReceptionistById($id);
        if ($staffData && isset($staffData->user_id)) {
            $userModel = new UserModel();
            // Call a method in the UserModel to update the status
            return $userModel->updateUserStatus($staffData->user_id, 'inactive');
        }

        return false;
    }
    public function activateReceptionist($id)
    {
        // Get the user_id associated with the receptionist
        $staffData = $this->getReceptionistById($id);
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


