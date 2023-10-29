<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pawfect Care - Login</title>
  <link rel="stylesheet" href="<?php ROOT?>assets/css/login.css">
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

  <div class="form-container">
    <form method="post">
      <h1>Log In</h1>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br>

      <div class="flex-container">
        <button class="button" type="submit" name="login">Login</button>
      </div>
        <p>Don't have an account? <a href="<?=ROOT?>signup">Sign up</a>.</p>
    </form>

  </div>
</div>

</body>
</html>