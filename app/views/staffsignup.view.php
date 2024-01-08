<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Sign Up</title>
    <link rel="stylesheet" href="<?php ROOT?>assets/css/staffsignuppage.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
    <style>
       button {
        background-color: #9971FE;
            width: 10%;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;

        }

        .container {
            position: relative;
        }

        .back-button {
            position: absolute;
            bottom: 58px;
            left: 10px;
            background-color: #9971FE;
            margin-left: 40px;
            border-radius: 20px;
        }

    </style>
</head>  
<body>
  
   <div>
   <div class="logo">
       <a href="<?php ROOT?>home">
       <img src="<?php ROOT?>assets/images/footer-logo.png" alt="Pawfect Care Logo">
      </a>
    </div>

    <div class="container">
        <div class="img-container">
            <img src="<?php ROOT?>assets/images/signup-photo2.jpg" alt="Sign Up Photo">
            <div class="flex-container">
            <button class="back-button" onclick="goToHomePage()">Back</button>
            </div>
        </div>
                <script>
                function goToHomePage() {
                    window.location.href ='<?php ROOT?>home';
                }
                </script>
   

        <div class="form-container">
            <form method="post">

        <script>
        // Check if the PHP variable $errors is set and not empty
        <?php if (!empty($errors)): ?>
            // Create a JavaScript array to hold the error messages
            var errorMessages = [
            <?php foreach ($errors as $error): ?>
                "<?= $error ?>",
            <?php endforeach; ?>
            ];

            // Create an error message by joining the array elements
            var errorMessage = errorMessages.join("<br>");

            // Show the SweetAlert with the error message
            Swal.fire({
            icon: 'error',
            title: 'Sign Up Error',
            html: errorMessage,
            });
        <?php endif; ?>
        </script>

                <h1>Sign Up</h1>
                
                <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>
                </div>

                <div>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required><br>
                </div>
                
                <div>
                <label for="contact_no">Contact Number:</label>
                <input type="tel" id="contact_no" name="contact_no" required ><br>
                </div>
                
                <div>
                <label for="nic">NIC:</label>
                <input type="text" id="nic" name="nic" required><br>
                </div>
                
                <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                </div>
                
                <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                </div>
               
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required><br>
            </div>

                <div>
                    <label for="user_role">User Role:</label>
                    <select id="user_role" name="user_role" required>
                        <option value="receptionist">Receptionist</option>
                        <option value="medical-staff">Medical Staff</option>
                        <option value="daycare-staff">Daycare Staff</option>
                        <option value="pet-ambulance-driver">Pet Ambulance Driver</option>
                        <option value="veterinarian">Veterinarian</option>
                    </select>
                </div>

                
                
                <div>
                <input type="checkbox" name="terms" required> I agree to the terms and conditions.
                </div>

                <div class="flex-container">
                    <button class="button" type="submit" name="signup">Sign up</button>
                </div>
                <p>Already have an account? <a href="<?php ROOT?>stafflogin">Login</a>.</p>
                
            </form>
               
        </div>
       
    </div>
</body>
</html>
