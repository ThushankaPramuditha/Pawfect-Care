<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Ambulance</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bookingpages.css">

</head>
<body>

<div class="logo">
   <a href="<?=ROOT?>home">
    <img src="<?= ROOT ?>/assets/images/footer-logo.png" alt="Pawfect Care Logo">
  </a>
</div>

<h1>Book Pet Ambulance</h1>

<div class="cardcontainer">
<div class="card">
  <div class="image-container">
  <img src="<?= ROOT?>/assets/images/driver3.png" alt="Avatar" style="width:100%">
  </div>  
  <div class="container">
    <h4><b>MR.NIPUL WEERASIRI</b></h4> 
    <p class="available">available for a ride</p>
    <p>contact number: 077 123 4567</p>
    <button class="button" type="submit" name="book">Book Now</button>
  </div>
</div>  
 

<div class="card">
<div class="image-container">
  <img src="<?= ROOT?>/assets/images/driver4.png" alt="Avatar" style="width:100%">
  </div> 
  <div class="container">
    <h4><b>MR.KUMAR SEWAGAMA</b></h4> 
    <p class="not-available">not available</p> 
    <p>contact number: 077 123 4567</p>
    <button class="button" type="submit" name="book" style="opacity: 0.5; pointer-events: none;">Book Now</button>
  </div>
</div>

</div>

 </div>
</body>
</html>