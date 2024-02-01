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
    align-items: center;
    background:none;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bolder;
    font-size:20px;
}

.navlogo img {
    width: 150px;
    height: auto;
}

.nav-links {
    margin-left:50%;
    list-style: none;
    padding: 0;
    display: flex;
}

.nav-links li {
    margin-right: 20px;
}

.nav-links a {
    text-decoration: none;
    color: white;
}

.nav-links a:hover {
    transition: all 0.3s ease 0s;
    color: purple;

}


.user-profile {
    display: flex;
    align-items: center;
}

.user-profile img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 10px;
}

/* Adjust this styling as needed */
.user-profile span {
    font-size: 16px;
}

    </style>   
</head>
<body>
    <div class="navbar">
        <div class="navlogo">
            <img src="assets/images/logocolor.png" alt="">
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
  