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
                            <a class="nav-link" href="<?php echo ROOT?>/daycarestaff/dashboardservices">
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT?>/daycarestaff/myprofile">
                                <span class="menu-title">My Profile</span>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT?>/daycarestaff/daycarestaff">
                                <span class="menu-title">Daycare Staff</span>
                            </a>
                        </li>
                        

                         <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT?>/daycarestaff/reports">

                            <span class="menu-title">Reports</span>

                        </a>
                        </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT?>/daycarestaff/feedbacks">
                        <span class="menu-title">Feedbacks</span>
                    </a>
                </li>
                
                    </ul>
                </div>
            </div>
            <div class="bottom-container">
                <button class="logout-button">
                    <a  href="logout">
                        <span>Logout</span>
                    </a>
                </button>
            </div>
        </div>
    </nav>
</body>

</html>
