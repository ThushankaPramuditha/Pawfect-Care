<?php

$_SESSION['user_email'] = $userEmail;

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
    // Method to get the email address of the logged-in user
    public function getUserEmailFromSession() {
        // Check if the user's email address is set in the session
        if (isset($_SESSION['user_email'])) {
            return $_SESSION['user_email'];
        } else {
            return null; // Return null if the email address is not set in the session
        }
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
    public function updateUserStatus($userId, $status)
    {
        // Assuming 'status' is a column in the 'users' table
        $query = "UPDATE $this->table SET status = :status WHERE id = :id";
        return $this->query($query, ['status' => $status, 'id' => $userId]);
    }

    
    
}

