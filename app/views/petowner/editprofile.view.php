<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/basic.css">
    <style>
       
       .sidebar {
           width: 35%;
           height: 100vh;
           color: #9971FE; 
           position: fixed;
           left: 0;
           top: 0;
           padding-top: 20px;
           
       }
       
       
       .nav {
           list-style-type: none;
           padding-left: 0;
       }
       
       .nav-item {
           margin-bottom: 15px;
       }
       
       .nav-link {
           color: #333; 
           font-size: 20px; 
           text-decoration: none;
           display: block;
           padding: 10px 20px;
           border-radius: 5px;
          
       }
       
       .nav-item:hover {
           background-color: #9971FE; 
           color: #fff;
       }
       
       body {
           font-family: Arial, sans-serif;
           background-color: #ffff;
           padding: 20px;
           margin: 0;
           color: #333;
           
       }
       .nav-item a:hover {
           background-color: #9971FE; 
           color: #fff; 
       }
       
       
       .nav-item.active {
           background-color: #9971FE; 
           color: #fff; 
       }
       
       .center-image {
           display: flex;
           justify-content: center;
           align-items: center;
           padding: 10px 10px;
       }
       
       .center-image img {
           width: 200px; 
       }
           </style>
</head>

<div class="logo">
   <a href="<?=ROOT?>home">
    <img src="<?= ROOT ?>/assets/images/footer-logo.png" alt="Pawfect Care Logo">
  </a>
</div>

<body>


<div class="container">
<div class="sidebar-menu">
<?php include '../app/views/components/dashboard-compo/petownersidebar.php'; ?>
</div>
<div class="form-container"> 
<?php include '../app/views/components/forms/editprofileform.php'; ?>
</div>
</div>


</body>
</html>

