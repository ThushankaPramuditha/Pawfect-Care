<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/petdetails.css">
</head>

<div class="logo">
   <a href="<?=ROOT?>home">
    <img src="<?= ROOT ?>assets/images/footer-logo.png" alt="Pawfect Care Logo">
  </a>
</div>

<body>

<div class="container">
<div class="form-container"> 
<?php include '../app/views/components/forms/addnewpetform.php'; ?> 
</div>

</div>


</body>
</html>

