<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/sidebar.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>  

</head>

<body>
    <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#ffff;">
        <div class="nav-container">
            <div class="top-container">
                <div style="width: 90%">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'dashboardservices') ? '-active' : '';?>" href="<?php echo ROOT?>/admin/dashboardservices">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'myprofile') ? '-active' : '';?>"  href="<?php echo ROOT?>/admin/myprofile">
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'veterinarians') ? '-active' : '';?>" href="<?php echo ROOT?>/admin/veterinarians">
                                Veterinarians
                            </a>
                        </li>
                        <li class="nav-item">
                    <a class="nav-link<?= ($activePage == 'medicalstaff') ? '-active' : '';?>" href="<?php echo ROOT?>/admin/medicalstaff">
                        Medical Staff
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= ($activePage == 'daycarestaff') ? '-active' : '';?>" href="<?php echo ROOT?>/admin/daycarestaff">
                        Daycare Staff
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= ($activePage == 'ambulancedrivers') ? '-active' : '';?>" href="<?php echo ROOT?>/admin/ambulancedrivers">
                        Ambulance Drivers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= ($activePage == 'receptionists') ? '-active' : '';?>" href="<?php echo ROOT?>/admin/receptionists">
                        Receptionists
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= ($activePage == 'services') ? '-active' : '';?>" href="<?php echo ROOT?>/admin/services">

                        Services

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= ($activePage == 'reports') ? '-active' : '';?>" href="<?php echo ROOT?>/admin/reports">

                        Reports

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= ($activePage == 'feedbacks') ? '-active' : '';?>" href="<?php echo ROOT?>/admin/feedbacks">
                        Feedbacks
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
