<?php

class PetownersModel
{
    use Model;

    protected $table = 'petowners';
    protected $allowedColumns = ['name', 'address', 'contact', 'nic', 'user_id'];

    //CHECK THIS ADD VET PART

    public function getAllPetowners()
    {
        $query = "SELECT p.*, u.email ,u.status
        FROM petowners AS p
        JOIN users AS u ON p.user_id = u.id";

        return $this->query($query);    
    }

    public function getPetownerById($id)
    {
        $query = "SELECT p.*, u.email ,u.status
        FROM petowners AS p
        JOIN users AS u ON p.user_id = u.id
        WHERE p.id = :id";
        
        return $this->get_row($query, ['id' => $id]);
    }

    public function getPetOwnerIdByUserId($id) {
        $query = "SELECT po.id
                  FROM petowners AS po
                  JOIN users AS u ON po.user_id = u.id
                  WHERE u.id = :id";
    
        // Assuming `get_row` fetches a single row from the result set
        $result = $this->get_row($query, ['id' => $id]);
    
        // Extract the pet owner id from the result
        if ($result) {
            return $result->id;
        } else {
            return null; // Or handle the case when no pet owner is found for the given user id
        }
    }
    
 
    public function getPetownerByUserId($id) {
        $query = "SELECT po.id
        FROM petowners AS po
        JOIN users AS u ON po.user_id = u.id
        WHERE u.id = :id";
  
        return $this->query($query, ['id' => $id]);
        
    }

    public function getDaycareBookingsByUserId($userId) {
      
       
     $query=  "SELECT daycarebookinguser.*, petowners.name AS petowner_name
                                FROM users
                                JOIN petowners ON users.id = petowners.user_id
                                JOIN pets ON petowners.id = pets.petowner_id
                                JOIN daycarebookinguser ON pets.id = daycarebookinguser.pet_id
                                WHERE users.id = :userId AND daycarebookinguser.status = 'accepted'";
        return $this->query($query, ['userId' => $userId]); 

    }

    public function getPetownerRoleDataById($id) {
        $query = "SELECT p.*, u.email ,u.status ,u.user_type
                  FROM petowners AS p
                  JOIN users AS u ON p.user_id = u.id
                  WHERE u.id = :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);


    }

    // public function addPetowner($data)
    // {
    //     return $this->insert($data);
    // }

    public function petownerCount()
    {
        $query = "SELECT COUNT(*) as count FROM petowners";
        return $this->get_row($query)->count;
    }

    public function addPetowner($data)
    {
        $userModel = new UserModel;
        

        // Register the petowner as a user and directly assign the user_id to $data array
        $data['user_id'] = $userModel->registerUser([
            'email' => $data['email'],
            'password' => $data['password'],
            'user_type' => 'Pet Owner', 
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

    public function getpetdetails($id)
  {
    $query = "SELECT p.*, u.email ,u.status
    FROM petowners AS p
    JOIN users AS u ON p.user_id = u.id
    WHERE p.id = :id";

    return $this->get_row($query, ['id' => $id]);

  }

  public function addpet($data){
    return $this->insert($data);
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


