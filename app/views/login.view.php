<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Login</title>


    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/loginpage.css">
    <script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>


    <div class="logo">

        <a href="<?php echo ROOT?>/home">
            <img src="<?php echo ROOT?>/assets/images/footer-logo.png" alt="Pawfect Care Logo">

        </a>
    </div>

    <div class="container">
        <div class="img-container">
            <img src="<?php echo ROOT?>/assets/images/login-photo1.jpg" alt="Login Photo">
        </div>

        <script>
        // Check for account deactivation
        <?php if (!empty($errors['account'])): ?>
        Swal.fire({
            icon: 'warning',
            title: 'Account Deactivated',
            text: '<?= $errors['account'] ?>',
        });
        <?php elseif (!empty($errors)): ?>
        // Create a JavaScript array to hold the error messages
        var errorMessages = [
            <?php foreach ($errors as $error): ?> "<?= $error ?>",
            <?php endforeach; ?>
        ];
        // Create an error message by joining the array elements
        var errorMessage = errorMessages.join("<br>");
        // Show the SweetAlert with the error message
        Swal.fire({
            icon: 'error',
            title: 'Login Error',
            html: errorMessage,
        });
        <?php endif; ?>
        </script>


        <div class="form-container">
            <form method="post" action="<?php echo ROOT?>/login">
                <h1>Log In</h1>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" ><br>
                <div id="error-email" class="error-message"></div>


                <label for="password">Password:</label>
                <input type="password" id="password" name="password" ><br>
                <div id="error-password" class="error-message"></div>



                <div class="flex-container">
                    <button class="button" type="submit" name="login">Login</button>
                </div>
                <p>Don't have an account? <a href="<?php echo ROOT?>/signup">Sign up</a>.</p>
            </form>

        </div>
    </div>


    <script>
       
        document.getElementById('email').addEventListener('input', validateEmail);
        document.getElementById('password').addEventListener('input', validatePassword);


        function validateForm() {
            var isValid = true;

            isValid = validateEmail() && isValid;
            isValid = validatePassword() && isValid;


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