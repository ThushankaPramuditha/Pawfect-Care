<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
</head>

<body>

    <?php include '../app/views/components/dashboard-compo/ambulancedriversidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
                <h1>My Profile</h1> 
                <div class= "pair"><div class = "key">Staff ID:</div>  <div class = "value">12345</div></div>
                <div class= "pair"><div class = "key">Full Name:</div> <div class = "value">John Doe</div></div>
                <div class= "pair"><div class = "key">Address:</div> <div class = "value">Hospital Road, Dodangoda, Kalutara</div></div>
                <div class= "pair"><div class = "key">Contact No:</div> <div class = "value">077-4441482</div></div>
                <div class= "pair"><div class = "key">NIC:</div> <div class = "value">20018420398</div></div>
                <div class= "pair"><div class = "key">Email:</div> <div class = "value">johndoe@gmail.com</div></div>
                <div class= "pair"><div class = "key">License No:</div> <div class = "value">CD 9692</div></div>

                <div class="flex-container">
                        <button type="submit" id="edit-button"><a href="editprofile">Edit Profile</a></button>
                        <button type="submit" id="changepw-button"><a href ="changepassword">Change Password</a></button>
                </div>
            
    </div>

</body>
</html>
