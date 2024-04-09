<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care-Navbar</title>
    <style>
        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            margin-top: 10px; /* Increased margin */
            align-items: center;
            background-color: #fff; /* White background */
            padding: 20px 50px; /* Increased padding */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Added box shadow */
        }

        .navlogo img {
            width:175px; /* Reduced logo size */
            height: auto;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333; /* Dark grey color */
            font-size: 18px; /* Increased font size */
        }

        .nav-links a:hover {
            color: #8A2BE2; /* Purple color on hover */
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 40px; /* Increased image size */
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-profile span {
            font-size: 18px; /* Increased font size */
            color: #333; /* Dark grey color */
        }


    </style>   
</head>
<body>
    <div class="navbar">
        <div class="navlogo">
            <img src="<?php echo ROOT?>/assets/images/logocolor.png" alt="">
        </div>
        <ul class="nav-links">

            <li><a href="<?=ROOT?>/home">Home</a></li>
            <li><a href="<?=ROOT?>/ourservices">Services</a></li>
            <li><a href="<?=ROOT?>/aboutus">About Us</a></li>
            <li><a href="<?=ROOT?>/contactus">Contact Us</a></li>
            

        </ul>
    </div>
</body>
</html>
  