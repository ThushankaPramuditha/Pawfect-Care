<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pawfect Care - Login</title>
  <link rel="stylesheet" href="<?php ROOT?>assets/css/loginpage.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

 <style>
    select {
    font-family: Arial, sans-serif;
    width: 102%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 15px;
    font-size: 16px;
    outline-color:#9971FE;
}

 </style>
</head>

<body>

<div class="logo">
    <a href="<?=ROOT?>home">
    <img src="<?=ROOT?>assets/images/footer-logo.png" alt="Pawfect Care Logo">
   </a>
 </div>
     
<div class="container">
  <div class="img-container">
    <img src="<?php ROOT?>assets/images/login-photo1.jpg" alt="Login Photo">
  </div>

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
      title: 'Login Error',
      html: errorMessage,
    });
  <?php endif; ?>
</script>


  <div class="form-container">
    <form method="post">
      <h1>Log In</h1>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br>
       
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br>
      
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
      <div class="flex-container">
        <button class="button" type="submit" name="stafflogin">Login</button>
      </div>
        <p>Don't have an account? <a href="<?=ROOT?>staffsignup">Sign up</a>.</p>
    </form>

  </div>
</div>

</body>
</html>