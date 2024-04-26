<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <style>
        /* Sidebar styles */
        .sidebar {
            width: 230px;
            min-height: 100vh;
            background-color: #f4f4f4;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 10;
            display: flex;
            flex-direction: column;
            padding-left: 10px;
        }

        /* Remove ul disc style */
        .sidebar .nav {
            list-style-type: none;
            padding-left: 0;
            padding-right: 10px;
        }

        .sidebar .nav-container{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding-top: 80px;
            flex-grow: 1; /* Flex grow to push the bottom container down */

        }
        .sidebar .nav-item {
            margin-bottom: 10px;
            border-radius: 16px;
            background-color: #D6B9DF;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link {
            color: #56475C; /* New text color */
            font-size: 18px; /* Increase the font size */
            text-decoration: none;
            font-weight: bold;
            display: block;
            padding: 10px 20px;
            border-radius:16px;
        
        }

        .sidebar .nav-item:hover {
            background-color: #947c9b; /* Theme color on hover */
            color: #56475C; /* Text color on hover */
        }

        .sidebar .nav-item:active {
            background-color: #947c9b; /* Theme color for active item */
            color: #56475C; /* Text color for active item */
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
            color: #333;
            
        }
        .sidebar .nav-item a:hover {
            background-color: #947c9b; /* Theme color on hover */
            color: #fff; /* Text color on hover */
        }

        /* Active menu item */
        .sidebar .nav-item.active {
            background-color: #947c9b; /* Theme color for active item */
            color: #fff; /* Text color for active item */
        }

        .sidebar .center-image {
            display: flex;
            width: 90%;
            justify-content: center;
            align-items: center;
            padding: 10px 10px;
        }

        .sidebar .center-image img {
            width: 100%; /* Adjust the size as needed */
        }

        .sidebar .top-container {
            display: flex;
            width: 100%;
            align-items: flex-start;
            flex-direction: column;
        }

        .sidebar .bottom-container {
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }

        .sidebar .logout-button {
            width: fit-content;
            height: 45px;
            border: none;
            color: #7A408C;
            background-color: #DEC7E5;
            border-radius: 20px;
            margin-bottom: 40px;
            font-size: 20px; /* Increase the font size */
            font-weight: bold;
            padding: 10px 40px;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5); /* Added box shadow */

            
        }

        .sidebar .logout-button:hover {
            background-color: #7A408C; /* Theme color on hover */
            color: #fff; /* Text color on hover */
        }
        .sidebar .logout-button:active {
            background-color: #4b2756; /* Theme color on hover */
            color: #fff; /* Text color on hover */
        }



        </style>
    
</head>



<body>
    <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#ffff;">
        <div class="nav-container">
            <div class="top-container">
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
