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
                            <a class="nav-link<?= ($activePage == 'dashboarddaycarestaff') ? '-active' : '';?>" href="<?php echo ROOT?>/daycarestaff/dashboarddaycarestaff">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'myprofile') ? '-active' : '';?>" href="<?php echo ROOT?>/daycarestaff/myprofile">
                                My Profile
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'daycarebookingform') ? '-active' : '';?>" href="<?php echo ROOT?>/daycarestaff/daycarebookingform">
                                Daycare Bookings
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'daycarebooking') ? '-active' : '';?>" href="<?php echo ROOT?>/daycarestaff/daycarebooking">
                                Today Slots
                            </a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link<?= ($activePage == 'olddaycarebookings') ? '-active' : '';?>" href="<?php echo ROOT?>/daycarestaff/olddaycarebookings">
                                Old Records
                            </a>
                        </li>
                        
                
                    </ul>
                </div>
            </div>
            <div class="bottom-container">
                <form action="<?=ROOT?>/logout" method="POST" style="margin: 0; padding: 0;">
                    <button type="submit" class="logout-button" name="logout" style="cursor:pointer;"> Logout</button>
                </form>
            </div>
        </div>
    </nav>
</body>

</html>
