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
            
            <div style="width: 90%">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'dashboardmedicalstaff') ? '-active' : '';?>" href="<?php echo ROOT?>/medicalstaff/dashboardmedicalstaff">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'myprofile') ? '-active' : '';?>" href="<?php echo ROOT?>/medicalstaff/myprofile">
                            My Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'petdetails') ? '-active' : '';?>" href="<?php echo ROOT?>/medicalstaff/petdetails">
                            Pet Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?= ($activePage == 'appointments') ? '-active' : '';?>" href="<?php echo ROOT?>/medicalstaff/appointments">
                            Appointments
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
