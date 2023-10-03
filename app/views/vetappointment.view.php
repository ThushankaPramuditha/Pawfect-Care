<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment</title>
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/vetappointment.css">

</head>
<body>
<div class="logo">
            <img src="<?= ROOT ?>assets/images/Logo 2.png" alt="Pawfect Care Logo">
</div>
<h1>Book your preferred vet</h1>

<div class="cardcontainer">
<div class="card">
  <div class="image-container">
  <img src="<?= ROOT?>assets/images/maledoctor.jpg" alt="Avatar" style="width:100%">
  </div>  
  <div class="container">
    <h4><b>DR.MIHIRAJ MAGAMAGE</b></h4> 
    <p class="available">available</p>
    <button class="button" type="submit" name="book">Book an Appointment</button>
    <p class="app-number">Current No.</p>
    <p class="app-number">15</p>
  </div>
</div>  
 

<div class="card">
<div class="image-container">
  <img src="<?= ROOT?>assets/images/femaledoctor.jpg" alt="Avatar" style="width:100%">
  </div> 
  <div class="container">
    <h4><b>DR.WASANTHI ALWIS</b></h4> 
    <p class="not-available">not available</p> 
    <button class="button" type="submit" name="book">Book an Appointment</button>
    <p class="app-number" style="visibility:hidden">Current No.</p>
    <p class="app-number" style="visibility:hidden">15</p>
  </div>
</div>

</div>

 </div>
</body>
</html>