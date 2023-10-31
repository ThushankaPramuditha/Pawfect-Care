<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/bookingpages.css">
    <title>Veterinarians - availability</title>
</head>

<body>

    <?php include '../app/views/components/dashboard-compo/receptionistsidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withoutbutton.php'; ?> 
        <div class="cardcontainer">
            <div class="card">
                <div class="image-container">
                    <img src="<?= ROOT?>assets/images/dr1.jpg" alt="Avatar" style="width:100%">
                </div>  
                <div class="container">
                    <h4><b>DR. MIHIRAJ MAGAMAGE</b></h4> 
                    <p class="available">available</p>
                    <button class="available-button" type="submit" name="available">Available</button><br>
                    <button class="not-available-button" type="submit" name="not-available">Not Available</button>
                </div>
            </div>  
            

            <div class="card">
                <div class="image-container">
                    <img src="<?= ROOT?>assets/images/femaledoctor.jpg" alt="Avatar" style="width:100%">
                </div> 
                <div class="container">
                    <h4><b>DR. WASANTHI ALWIS</b></h4> 
                    <p class="not-available">not available</p>
                    <button class="available-button" type="submit" name="available" style="opacity: 0.5; pointer-events: none;">Available</button><br>
                    <button class="not-available-button" type="submit" name="not-available" style="opacity: 0.5; pointer-events: none;">Not Available</button>
                
                </div>
            </div>
        </div>
    </div>

</body>
</html>
