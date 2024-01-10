<?php

// class User
// {
//     use Model;

//     protected $table = 'users';

//     protected $allowedColumns = [
//         'name',
//         'address',
//         'contact_no',
//         'nic',
//         'email',
//         'password',
//     ];

//     private function hashPassword(string $password): string
//     {
//         return password_hash($password, PASSWORD_BCRYPT);
//     }

//     public function registerUser(array $data): mixed
//     {
//         if ($this->validate($data)) {
//             $data['password'] = $this->hashPassword($data['password']);

//             return $this->insert($data);
//         }

//         return false;
//     }

//     private function verifyPassword(string $password, string $hashedPassword): bool
//     {
//         return password_verify($password, $hashedPassword);
//     }

//     public function authenticate(string $email, string $password): mixed
//     {
//         $data = $this->first(['email' => $email]);
//         if ($data && $this->verifyPassword($password, $data->password)) {
//             return $data;
//         }

//         return false;
//     }

//     // Rest of your validation and user-related methods...
//     public function validate($data)
//     {
//         $this->errors = [];

//         if (empty($data['email'])) {
//             $this->errors['email'] = "Email is required";
//         } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
//             $this->errors['email'] = "Email is not valid";
//         }

//         if(empty($data['name'])) {
//             $this->errors['name'] = "Name is required";
//         }

//         if(empty($data['address'])) {
//             $this->errors['address'] = "Address is required";
//         }

//         if(empty($data['contact_no'])) {
//             $this->errors['contact_no'] = "Contact number is required";
//         } elseif (!preg_match('/^[0-9]{10}$/', $data['contact_no'])) {
//             $this->errors['contact_no'] = "Contact number is not valid";
//         }

       
//         if (empty($data['nic'])) {
//             $this->errors['nic'] = "NIC is required";
//         } elseif (!preg_match('/^[0-9]{9}[vVxX]$|^([0-9]{12})$/', $data['nic'])) {
//             $this->errors['nic'] = "NIC is not valid";
//         }

//         if (empty($data['password'])) {
//             $this->errors['password'] = "Password is required";
//         } elseif (strlen($data['password']) < 8) {
//             $this->errors['password'] = "Password must be at least 8 characters long";
//         } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\W]).{8,}$/', $data['password'])) {
//             $this->errors['password'] = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol";
//         }

//         if (empty($data['confirm_password'])) {
//             $this->errors['confirm_password'] = "Confirm password is required";
//         } elseif ($data['password'] !== $data['confirm_password']) {
//             $this->errors['confirm_password'] = "Password and confirm password do not match";
//         }

//         if (empty($data['terms'])) {
//             $this->errors['terms'] = "Please accept the terms and conditions";
//         }

//         if (empty($this->errors)) {
//             return true;
//         }

//         return false;
//     }
// }



class UserModel {
    
    use Model;

    protected string $table = 'users';
    protected array $allowedColumns = [
        'email',
        'password',
        'user_type',
        'id'
    ];

    // Update the hashing algorithm and salt length as needed
    private string $hashAlgorithm = "sha256";
    private int $saltLength = 16;

    public function registerUser(array $data){
        if ($this->validate($data)) {
            $data['user_type'] = 'petowner';
            $data['password'] = $this->hashPassword($data['password']);
            // show($data);
            return $this->insert($data);

        }
        // show($this->errors);
        // die();
        return false;
    }

    public function addUser(array $data){
        
        if ($this->validate($data)) {
            
            $data['password'] = $this->hashPassword($data['password']);
            return $this->insert($data);
        }
        // show($this->errors);
        // die();
        return false;
    }

    public function authenticate(string $email,string $password):mixed {
        $data = $this->first(['email' => $email]);
        if ($data && $this->verifyPassword($password, $data->password)) {
            return $data;
        }
        return false;
    }

    private function hashPassword(string $password): string {
        $salt = random_bytes($this->saltLength);
        $hashedPassword = hash_pbkdf2($this->hashAlgorithm, $password, $salt, 10000, 64);
        return base64_encode($salt) . ":" . $hashedPassword;
    }

    public function verifyPassword(string $password, string $hashedPassword): bool{
        list($salt, $hash) = explode(":", $hashedPassword);
        $computedHash = hash_pbkdf2($this->hashAlgorithm, $password, base64_decode($salt), 10000, 64);
        return hash_equals($hash, $computedHash);
    }
   
    public function validate($data, $id = null)
    {
        $this->errors = [];
            
        if(trim($id) == ""){
            if($this->where(['email' => $data['email']]))   
            {
                $this->errors['email'] = "That email is already in use";
            }
        }else{
            if($this->query("select email from $this->table where email = :email && user_id != :id",['email'=>$data['email'],'id'=>$id]))
            {
                $this->errors['email'] = "That email is already in use";
            }
        }
        // if (empty($data['email'])) {
        //     $this->errors['email'] = "Email is required";
        // } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        //     $this->errors['email'] = "Email is not valid";
        // }
        if(empty($data['email']) || !filter_var($data['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "Email is not valid";
        }


        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        } elseif (strlen($data['password']) < 6) {
            $this->errors['password'] = "Password must be at least 6 characters long";
        } elseif (!preg_match('/^(?=.*[\W]).{6,}$/', $data['password'])) {
            $this->errors['password'] = "Password must contain at least one symbol";
        }
        

        // $user_type = ['receptionist', 'medical-staff', 'daycare-staff', 'pet-ambulance-driver', 'veterinarian'];
        // if(empty($data['user_type']) || !in_array($data['user_type'], $user_type))
        // {
        //     $this->errors['user_type'] = "User Type is not valid";
        // }
        

        // if (empty($data['terms'])) {
        //     $this->errors['terms'] = "Please accept the terms and conditions";
        // }

        if (empty($this->errors)) {
            return true;
        }

        return false;

    }
    
}

