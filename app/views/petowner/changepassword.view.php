<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/petdetails.css">
    <style>
      .form-container1{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 60%; 
        margin-top:100px;
        margin-left:10%;
   }  
    .form-container1 h1{
          font-size: 40px;
          font-weight: 600;
          color: #333;
          margin-bottom: 20px;
          text-align: center;
    }
    

    </style>
  
</head>

<div class="logo">
   <a href="<?=ROOT?>home">
    <img src="<?= ROOT ?>assets/images/footer-logo.png" alt="Pawfect Care Logo">
  </a>
</div>

<body>

<div class="sidebar-menu">
<?php include '../app/views/components/dashboard-compo/petownersidebar.php'; ?>
</div>
<div class="form-container1"> 
<?php include '../app/views/components/forms/changepasswordform.php'; ?>
</div>




</body>
</html>

