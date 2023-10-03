<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Sign Up</title>
    <link rel="stylesheet" href="<?=ROOT?>assets/css/signup.css">
   
</head>  
<body>
  
   <div>
   <div class="logo">
       <a href="<?=ROOT?>/home">
       <img src="<?=ROOT?>assets/images/footer-logo.png" alt="Pawfect Care Logo">
      </a>
    </div>

    <div class="container">
        <div class="img-container">
            <img src="<?=ROOT?>assets/images/signup-photo2.jpg" alt="Sign Up Photo">
        </div>
          
        <div class="form-container">
            <form method="post">
               
                <h1>Sign Up</h1>
                
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required><br>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required><br>

                <label for="contact_number">Contact Number:</label>
                <input type="tel" id="contact_number" name="contact_number" required pattern="[0-9]{10}"><br>

                <label for="NIC">NIC:</label>
                <input type="text" id="NIC" name="NIC" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required><br>
                
                <input type="checkbox" name="terms" checked> I agree to the terms and conditions.
               
                <div class="flex-container">
                    <button class="button" type="submit" name="signup">Sign up</button>
                </div>
                <p>Already have an account? <a href="<?=ROOT?>/login">Login</a>.</p>
                
            </form>
               
        </div>
       
    </div>
</body>
</html>
