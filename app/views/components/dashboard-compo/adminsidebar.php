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
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="nav-container">
            <div class="top-container">
                <div class="center-image">
                    <img src="<?php echo ROOT?>/assets/images/logocolor.png" alt="Logo">
                </div>
                <div style="width: 100%">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT?>/admin/dashboardservices">
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT?>/admin/myprofile">
                                <span class="menu-title">My Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT?>/admin/veterinarians">
                                <span class="menu-title">Veterinarians</span>
                            </a>
                        </li>
                        <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT?>/admin/medicalstaff">
                        <span class="menu-title">Medical Staff</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT?>/admin/daycarestaff">
                        <span class="menu-title">Daycare Staff</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT?>/admin/ambulancedrivers">
                        <span class="menu-title">Ambulance Drivers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT?>/admin/receptionists">
                        <span class="menu-title">Receptionists</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT?>/admin/services">

                        <span class="menu-title">Services</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT?>/admin/reports">

                        <span class="menu-title">Reports</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT?>/admin/feedbacks">
                        <span class="menu-title">Feedbacks</span>
                    </a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="<?php echo ROOT?>/admin/faq">
                        <span class="menu-title">FAQ</span>

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
