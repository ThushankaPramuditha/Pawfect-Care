<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Sign Up</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/signuppage.css">
    <script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
</head>  
<body>
  
   <div>
   <div class="logo">
       <a href="<?php echo ROOT?>/home">
       <img src="<?php echo ROOT?>/assets/images/footer-logo.png" alt="Pawfect Care Logo">
      </a>
    </div>

    <div class="container">
        <div class="img-container">
            <img src="<?php echo ROOT?>/assets/images/signup-photo2.jpg" alt="Sign Up Photo">
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
                
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name">
                <div id="error-name" class="error-message"></div>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
                <div id="error-address" class="error-message"></div>

                <label for="contact_no">Contact Number:</label>
                <input type="tel" id="contact_no" name="contact" pattern="[0-9]{10}">
                <div id="error-contact" class="error-message"></div>
            
                <label for="nic">NIC:</label>
                <input type="text" id="nic" name="nic">
                <div id="error-nic" class="error-message"></div>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <div id="error-email" class="error-message"></div>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <div id="error-password" class="error-message"></div>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <div id="error-confirm-password" class="error-message"></div>

                <div class="flex-container">
                    <button class="button" type="submit" name="signup">Sign up</button>
                </div>
                <p>Already have an account? <a href="<?php echo ROOT?>/login">Login</a>.</p>
                
            </form>
               
        </div>
       
    </div>

    <script>
        
        document.getElementById('name').addEventListener('input', validateName);
        document.getElementById('address').addEventListener('focus', validateName);
        document.getElementById('contact_no').addEventListener('focus', validateAddress);
        document.getElementById('nic').addEventListener('focus', validateContactNumber);
        document.getElementById('email').addEventListener('focus', validateNIC);
        document.getElementById('password').addEventListener('focus', validateEmail);
        document.getElementById("confirm_password").addEventListener('focus', validatePassword);
        document.getElementById("confirm_password").addEventListener('input', validateConfirmPassword);


        function validateForm() {
            var isValid = true;

            isValid = validateName() && isValid;
            isValid = validateAddress() && isValid;
            isValid = validateContactNumber() && isValid;
            isValid = validateNIC() && isValid;
            isValid = validateEmail() && isValid;
            isValid = validatePassword() && isValid;
            isValid = validateConfirmPassword() && isValid;


            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: "Please correct the errors before submitting.",
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
