<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/forms.css">
</head>
<body>
 
    <div class = "form-container"> 
         
            <h1>Change Password</h1>

            <form id="change-password-form" action="<?php echo ROOT?>/changepassword/update" method="post">
            
                <label for="prev-password">Previous Password:</label>
                <input type="password" id="prev-password" name="prev-password" required><br>
                <div id="error-prev-password" class="error-message"></div>


                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" required><br>
                <div id="error-new-password" class="error-message"></div>


                <label for="confirm-password">Confirm New Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required><br>
                <div id="error-confirm-password" class="error-message"></div>


                <div class="flex-container">
                    <button type="submit" id="change-password-button" onclick="changePassword()">Change Password</button>
                </div>
            </form>   
        
    </div>
    


    <script>

            document.getElementById('prev-password').addEventListener('input', validatePrevPassword);
            document.getElementById('new-password').addEventListener('input', validateNewPassword);
            document.getElementById('confirm-password').addEventListener('input', validateConfirmPassword);

            
            document.getElementById('change-password-form').addEventListener('submit', function(event) {
                
                var isValid = true;

                isValid = validatePrevPassword() && isValid;
                isValid = validateNewPassword() && isValid;
                isValid = validateConfirmPassword() && isValid;

                if (!isValid) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: "Please correct the errors before submitting.",
                    });
                }
            });
            
    
        function validatePrevPassword() {
            var password = document.getElementById('prev-password').value;
            if (!password.match(/^(?=.*[\W]).{6,}$/)) {
                document.getElementById('error-prev-password').textContent = "* Password must be at least 6 characters long and contain at least one symbol.";
                return false;
            } else {
                document.getElementById('error-prev-password').textContent = "";
                return true;
            }
        }
        function validateNewPassword() {
            var password = document.getElementById('new-password').value;
            if (!password.match(/^(?=.*[\W]).{6,}$/)) {
                document.getElementById('error-new-password').textContent = "* Password must be at least 6 characters long and contain at least one symbol.";
                return false;
            } else {
                document.getElementById('error-new-password').textContent = "";
                return true;
            }
        }

        function validateConfirmPassword() {
            var newpassword = document.getElementById('new-password').value;
            var confirmPassword = document.getElementById('confirm-password').value;
            if (newpassword !== confirmPassword) {
                document.getElementById('error-confirm-password').textContent = "* Passwords do not match.";
                return false;
            } else {
                document.getElementById('error-confirm-password').textContent = "";
                return true;
            }
        }
    
    </script>
</body>
</html>