<?php
/**
 * User class
 */
class User
{
    use Model;

    protected $table = 'users';

    protected $allowedColumns = [
        'name',
        'address',
        'contact_no',
        'nic',
        'email',
        'password', // We'll store the hashed password in the database
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email is not valid";
        }

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

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        } elseif (strlen($data['password']) < 8) {
            $this->errors['password'] = "Password must be at least 8 characters long";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\W]).{8,}$/', $data['password'])) {
            $this->errors['password'] = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol";
        }

        if (empty($data['confirm_password'])) {
            $this->errors['confirm_password'] = "Confirm password is required";
        } elseif ($data['password'] !== $data['confirm_password']) {
            $this->errors['confirm_password'] = "Password and confirm password do not match";
        }

        if (empty($data['terms'])) {
            $this->errors['terms'] = "Please accept the terms and conditions";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function hashPassword($password)
    {
        // Generate a secure password hash with a random salt
        $options = [
            'cost' => 12, // Adjust the cost according to your security needs
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function verifyPassword($password, $hashedPassword)
    {
        // Verify a password against its hash
        return password_verify($password, $hashedPassword);
    }
}
