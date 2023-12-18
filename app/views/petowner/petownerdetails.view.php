<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <style>
       
.sidebar {
    width: 35%;
    height: 100vh;
    color: #9971FE; 
    position: fixed;
    left: 0;
    top: 0;
    padding-top: 20px;
    
}


.nav {
    list-style-type: none;
    padding-left: 0;
}

.nav-item {
    margin-bottom: 15px;
}

.nav-link {
    color: #333; 
    font-size: 20px; 
    text-decoration: none;
    display: block;
    padding: 10px 20px;
    border-radius: 5px;
   
}

.nav-item:hover {
    background-color: #9971FE; 
    color: #fff;
}

body {
    font-family: Arial, sans-serif;
    background-color: #ffff;
    padding: 20px;
    margin: 0;
    color: #333;
    
}
.nav-item a:hover {
    background-color: #9971FE; 
    color: #fff; 
}


.nav-item.active {
    background-color: #9971FE; 
    color: #fff; 
}

.center-image {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px 10px;
}

.center-image img {
    width: 200px; 
}
    </style>
</head>

<body>

    <?php include '../app/views/components/dashboard-compo/petownersidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
                <h1>My Profile</h1> 
                <div class= "pair"><div class = "key">Staff ID:</div>  <div class = "value">12345</div></div>
                <div class= "pair"><div class = "key">Full Name:</div> <div class = "value">John Doe</div></div>
                <div class= "pair"><div class = "key">Address:</div> <div class = "value">Hospital Road, Dodangoda, Kalutara</div></div>
                <div class= "pair"><div class = "key">Contact No:</div> <div class = "value">077-4441482</div></div>
                <div class= "pair"><div class = "key">NIC:</div> <div class = "value">20018420398</div></div>
                <div class= "pair"><div class = "key">Qualifications:</div> <div class = "value">DVM, PhD</div></div>

                <div class = "flex-container">
                    <button type="submit" id="edit-button" >edit profile</button>
                    <button type="submit" id="changepw-button" >change password</button>
                </div>
            
    </div>

</body>
</html>
