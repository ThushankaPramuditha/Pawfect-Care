<?php

class PetownersModel
{
    use Model;

    protected $table = 'petowners';
    protected $allowedColumns = ['name', 'address', 'contact', 'nic', 'user_id'];

    //CHECK THIS ADD VET PART

    public function getAllPetowners()
    {
        return $this->where(['status' => 'active']);
    }

    public function getPetownerById($id)
    {
        return $this->first(['id' => $id]);
    }

    // public function addPetowner($data)
    // {
    //     return $this->insert($data);
    // }

    public function addPetowner($data)
    {
        $userModel = new UserModel;
        

        // Register the petowner as a user and directly assign the user_id to $data array
        $data['user_id'] = $userModel->registerUser([
            'email' => $data['email'],
            'password' => $data['password'],
            'user_type' => 'petowner', 
        ]);

        if ($data['user_id']) {
            // Prepare petowner-specific data
            $petownerData = [
                'user_id' => $data['user_id'],
                'name' => $data['name'],
                'address' => $data['address'],
                'contact' => $data['contact'],
                'nic' => $data['nic'],
            ];
            
            return $this->insert($petownerData);
            

            // Attempt to insert petowner-specific data into the petowners table
            if (!($this->insert($petownerData))) {
                $this->errors[] = 'Failed to insert petowner data';
                return false;
            }
        } 
        else {
            $this->errors[] = 'User registration failed';
            return false; 
        }
    }

    public function updatePetowner($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

    public function deletePetowner($id)
    {
        return $this->delete($id);
    }

    public function deactivatePetowner($id)
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

        if(empty($data['contact'])) {
            $this->errors['contact'] = "Contact number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $data['contact'])) {
            $this->errors['contact'] = "Contact number is not valid";
        }

       
        if (empty($data['nic'])) {
            $this->errors['nic'] = "NIC is required";
        } elseif (!preg_match('/^[0-9]{9}[vVxX]$|^([0-9]{12})$/', $data['nic'])) {
            $this->errors['nic'] = "NIC is not valid";
        }

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        }

        return empty($this->errors);
    }
}


