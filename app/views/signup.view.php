<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Sign Up</title>
    <link rel="stylesheet" href="<?php ROOT?>assets/css/signuppage.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
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
        </div>
          
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
                <input type="tel" id="contact_no" name="contact" required ><br>
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
                
                <!-- <div>
                <input type="checkbox" name="terms" required> I agree to the terms and conditions.
                </div> -->

                <div class="flex-container">
                    <button class="button" type="submit" name="signup">Sign up</button>
                </div>
                <p>Already have an account? <a href="<?php ROOT?>login">Login</a>.</p>
                
            </form>
               
        </div>
       
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var contact_no = document.getElementById('contact_no').value;
            var nic = document.getElementById('nic').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            // var terms = document.querySelector('input[name="terms"]:checked');

            var errors = [];

            if (!name) errors.push("Name is required.");
            if (!address) errors.push("Address is required.");
            if (!contact_no.match(/^[0-9]{10}$/)) errors.push("Contact number must be 10 digits.");
            if (!nic.match(/^[0-9]{9}[vVxX]$|^([0-9]{12})$/)) errors.push("NIC format is not valid.");
            if (!email.match(/^\S+@\S+\.\S+$/)) errors.push("Email format is not valid.");
            if (!password.match(/^(?=.*[\W]).{6,}$/)) errors.push("Password must be at least 6 characters long and contain at least one symbol.");
        
            if (password !== confirm_password) errors.push("Passwords do not match.");
            // if (!terms) errors.push("Please accept the terms and conditions.");

            if (errors.length > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: errors.join("<br>"),
                });
                return false;
            }

            return true;
        }

        document.querySelector('form').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
