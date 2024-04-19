 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/petdetails.css">
</head>

<div class="logo">
   <a href="<?php echo ROOT?>/home">
    <img src="<?php echo ROOT?>/assets/images/footer-logo.png" alt="Pawfect Care Logo">
  </a>
</div>

<body>
<?php include 'navbar.php'; ?>

 <h1>Edit Pet Details</h1> 

<div class="container">
<div class="form-container"> 
<?php include '../app/views/components/forms/editpetdetailsform.php'; ?>
</div>

</div>


</body>
</html> 

