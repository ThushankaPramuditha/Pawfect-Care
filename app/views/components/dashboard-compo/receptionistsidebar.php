
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
            background-color: #140e23;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 10;
            display: flex;
            flex-direction: column;
        }

        /* Remove ul disc style */
        .sidebar .nav {
            list-style-type: none;
            padding-left: 0;
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
        }

        .sidebar .nav-link {
            color: #ffffff; /* New text color */
            font-size: 20px; /* Increase the font size */
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-radius: 5px;
        
        }

        .sidebar .nav-item:hover {
            background-color: #4b2756; /* Theme color on hover */
            color: #fff; /* Text color on hover */
        }

        .sidebar .nav-item:active {
            background-color: #4b2756; /* Theme color for active item */
            color: #fff; /* Text color for active item */
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
            color: #333;
            
        }
        .sidebar .nav-item a:hover {
            background-color: #4b2756; /* Theme color on hover */
            color: #fff; /* Text color on hover */
        }

        /* Active menu item */
        .sidebar .nav-item.active {
            background-color: #4b2756; /* Theme color for active item */
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
            width: 100%;
            border: none;
            color: #fff;
            background-color: #6a3879;
            border-radius: 5px;
            margin-bottom: 40px;
            font-size: 20px; /* Increase the font size */
            padding: 10px 60px;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5); /* Added box shadow */

            
        }

        .sidebar .logout-button:hover {
            background-color: #4b2756; /* Theme color on hover */
            color: #fff; /* Text color on hover */
        }
        .sidebar .logout-button:active {
            background-color: #4b2756; /* Theme color on hover */
            color: #fff; /* Text color on hover */
        }



        </style>
    
</head>


<body>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="nav-container">
        <div class="top-container">
            
            <div style="width: 100%">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT?>/receptionist/dashboardreceptionist">
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT?>/receptionist/myprofile">
                            <span class="menu-title">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT?>/receptionist/petdetails">
                            <span class="menu-title">Pet Details</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT?>/receptionist/petownerdetails">
                            <span class="menu-title">Pet Owner Details</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT?>/receptionist/appointments">
                            <span class="menu-title">Appointments</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT?>/receptionist/veterinarians">
                            <span class="menu-title">Veterinarians</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo ROOT?>/receptionist/ambulancedrivers">
                            <span class="menu-title">Ambulance Drivers</span>
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
