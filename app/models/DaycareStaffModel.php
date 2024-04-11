<?php

class DaycareStaffModel
{
    use Model;

    protected $table = 'daycarestaff';
    protected $allowedColumns = ['name', 'address', 'contact', 'nic', 'qualifications', 'user_id','status'];

    public function getAllDaycareStaff() {
        $query = "SELECT d.*, u.email ,u.status
                  FROM daycarestaff AS d
                  JOIN users AS u ON d.user_id = u.id";
        

        return $this->query($query);
        
    }

    public function getDaycareStaffById($id) {
        $query = "SELECT d.*, u.email ,u.status
                  FROM daycarestaff AS d
                  JOIN users AS u ON d.user_id = u.id
                  WHERE d.id = :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }

    public function addDaycareStaff($data)
    {
        $userModel = new UserModel;
        

        // Register the daycare staff as a user and directly assign the user_id to $data array
        $data['user_id'] = $userModel->addUser([
            'email' => $data['email'],
            'password' => $data['password'],
            'user_type' => 'daycare-staff', 
        ]);

        if ($data['user_id']) {
            // Prepare daycare staff-specific data
            $staffData = [
                'user_id' => $data['user_id'],
                'name' => $data['name'],
                'address' => $data['address'],
                'contact' => $data['contact'],
                'nic' => $data['nic'],
                'qualifications' => $data['qualifications'],
            ];

            return $this->insert($staffData);
            

            // Attempt to insert daycare staff-specific data into the daycarestaff table
            if (!($this->insert($staffData))) {
                $this->errors[] = 'Failed to insert daycare staff data';
                return false;
            }
        } else {
            $this->errors[] = 'User registration failed';
            return false; 
        }
    }

    public function updateDaycareStaff($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

    

    public function deleteDaycareStaff($id)
    {
        return $this->delete($id);
    }

    // public function deactivateDaycareStaff($id)
    // {
    //     return $this->update($id, ['status' => 'inactive']);
    // }
    public function deactivateDaycareStaff($id)
    {
        // Get the user_id associated with the daycare staff
        $staffData = $this->getDaycareStaffById($id);
        if ($staffData && isset($staffData->user_id)) {
            $userModel = new UserModel();
            // Call a method in the UserModel to update the status
            return $userModel->updateUserStatus($staffData->user_id, 'inactive');
        }

        return false;
    }
    public function activateDaycareStaff($id)
    {
        // Get the user_id associated with the daycare staff
        $staffData = $this->getDaycareStaffById($id);
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


