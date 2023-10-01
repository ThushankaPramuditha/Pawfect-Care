

<!-- /**
 * User class
 */
// Class User
// {
    
//     use Model;

//     protected $table = 'users';

//     protected $allowedColumns = [

//         'full-name',
//         'address',
//         'contact-number',
//         'nic',
//         'email',
//         'password',
//     ];

//     public function validate($data)
//     {
//         $this->errors = [];

//         // Check if the required fields are empty
//         foreach ($this->allowedColumns as $column) {
//             if (empty($data[$column])) {
//                 $this->errors[$column] = "$column is required";
//             }
//         }
	
//         // Check if the email address is already in use
// 		$existingUser = $this->where(['email' => $data['email']])->first();
//         if ($existingUser) {
//             $this->errors['email'] = 'Email address is already in use';
//         }

//         // Check if the password is strong enough
//         if (strlen($data['password']) < 8) {
//             $this->errors['password'] = 'Password must be at least 8 characters long';
//         } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\W]).{8,}$/', $data['password'])) {
//             $this->errors['password'] = 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol';
//         }

//         // Check if the password and confirm password match
//         if ($data['password'] !== $data['confirm_password']) {
//             $this->errors['confirm_password'] = 'Password and confirm password do not match';
//         }

//         // Check if the user accepts the terms and conditions
//         if (!$data['terms']) {
//             $this->errors['terms'] = 'Please accept the terms and conditions';
//         }

//         // If there are no errors, return true
//         if (empty($this->errors)) {
//             return true;
//         }

//         return false;
//     }
// } -->

<?php

/**
 * User class
 */
Class User
{
    
    use Model;

    
    public function validate($data)
    {
        $this->errors = [];

        // Check if the required fields are empty
        foreach ($this->allowedColumns as $column) {
            if (empty($data[$column])) {
                $this->errors[$column] = "$column is required";
            }
        }
    
        // Check if the email address is already in use
        // $existingUser = $this->where(['email' => $data['email']])->first();
        // if ($existingUser) {
        //     $this->errors['email'] = 'Email address is already in use';
        // }

        // Check if the password is strong enough
        if (strlen($data['password']) < 8) {
            $this->errors['password'] = 'Password must be at least 8 characters long';
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\W]).{8,}$/', $data['password'])) {
            $this->errors['password'] = 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol';
        }
		
        // Check if the password and confirm password match
        if ($data['password'] !== $data['confirm_password']) {
            $this->errors['confirm_password'] = 'Password and confirm password do not match';
        }

        // Check if the user accepts the terms and conditions
        if (!$data['terms']) {
            $this->errors['terms'] = 'Please accept the terms and conditions';
        }

        // If there are no errors, return true
        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}