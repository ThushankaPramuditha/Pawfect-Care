<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
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
            align-items: center;
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
        .logout-button {
            background-color: #6a387944;
            border:none;
            width: fit-content;
            color:#6a3879;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #6a3879;
            color: #fff;
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
            <li><a href="<?=ROOT?>/services">Services</a></li>
            <li><a href="<?=ROOT?>/aboutus">About Us</a></li>
            <li><a href="<?=ROOT?>/contactus">Contact Us</a></li>
            <li>
                <form action="<?=ROOT?>/login" style="margin: 0; padding: 0;">
                    <button type="submit" class="logout-button" name="logout"> Login</button>
                </form>
            </li>
            

        </ul>
    </div>
</body>
</html>
  