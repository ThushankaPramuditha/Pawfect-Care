<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/sidebar.css">
 
    <title>Dashboard</title>
 
     <body>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="nav-container">
            <div class="top-container">
                <div style="width: 90%">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'dashboardambulancedriver') ? '-active' : '';?>" href="<?php echo ROOT?>/ambulacedriver/dashboardambulancedriver">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'myprofile') ? '-active' : '';?>" href="<?php echo ROOT?>/ambulacedriver/myprofile">
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'ridedetails') ? '-active' : '';?>" href="<?php echo ROOT?>/ambulacedriver/ridedetails">
                                Ride details
                            </a>
                        </li>
                        
                
                    </ul>
                </div>
            </div>
            <div class="bottom-container">
                <form action="<?=ROOT?>/logout" method="POST" style="margin: 0; padding: 0;">
                    <button type="submit" class="logout-button" name="logout"> Logout</button>
                </form>
            </div>
        </div>
    </nav>
</body>            
   </html>