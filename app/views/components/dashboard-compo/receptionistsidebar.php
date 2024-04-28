
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/sidebar.css">

    
</head>


<body>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="nav-container">
        <div class="top-container">
            
            <div style="width: 90%">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'dashboardreceptionist') ? '-active' : '';?>" href="<?php echo ROOT?>/receptionist/dashboardreceptionist">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'myprofile') ? '-active' : '';?>" href="<?php echo ROOT?>/receptionist/myprofile">
                            My Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'petdetails') ? '-active' : '';?>" href="<?php echo ROOT?>/receptionist/petdetails">
                            Pet Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'petownerdetails') ? '-active' : '';?>" href="<?php echo ROOT?>/receptionist/petownerdetails">
                            Pet Owner Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'appointments') ? '-active' : '';?>" href="<?php echo ROOT?>/receptionist/appointments">
                            Appointments
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'oldappointments') ? '-active' : '';?>" href="<?php echo ROOT?>/receptionist/oldappointments">
                            Old Appointments 
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'veterinarians') ? '-active' : '';?>" href="<?php echo ROOT?>/receptionist/veterinarians">
                            Veterinarians
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'ambulancedrivers') ? '-active' : '';?>" href="<?php echo ROOT?>/receptionist/ambulancedrivers">
                            Ambulance Drivers
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
