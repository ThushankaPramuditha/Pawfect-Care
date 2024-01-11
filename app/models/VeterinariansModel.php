<?php

class VeterinariansModel
{
    use Model;

    protected $table = 'veterinarians';
    protected $allowedColumns = ['name', 'address', 'contact', 'nic', 'qualifications', 'user_id'];

    //CHECK THIS ADD VET PART

    public function getAllVeterinarians()
    {
        return $this->where(['status' => 'active']);
    }

    public function getVeterinarianById($id)
    {
        return $this->first(['id' => $id]);
    }

    // public function addVeterinarian($data)
    // {
    //     return $this->insert($data);
    // }

    public function addVeterinarian($data)
    {
        $userModel = new UserModel;
        

        // Register the veterinarian as a user and directly assign the user_id to $data array
        $data['user_id'] = $userModel->addUser([
            'email' => $data['email'],
            'password' => $data['password'],
            'user_type' => 'veterinarian', 
        ]);

        if ($data['user_id']) {
            // Prepare veterinarian-specific data
            $vetData = [
                'user_id' => $data['user_id'],
                'name' => $data['name'],
                'address' => $data['address'],
                'contact' => $data['contact'],
                'nic' => $data['nic'],
                'qualifications' => $data['qualifications'],
            ];

            return $this->insert($vetData);
            

            // Attempt to insert veterinarian-specific data into the veterinarians table
            if (!($this->insert($vetData))) {
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

