<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

</head>

<body>

    <?php include '../app/views/components/dashboard-compo/daycaresidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
                <h1>My Profile</h1> 
                <div class= "pair"><div class = "key">Staff ID:</div>  <div class = "value"><?= htmlspecialchars($data['userdata']->id)?></div></div>
                <div class= "pair"><div class = "key">Full Name:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->name)?></div></div>
                <div class= "pair"><div class = "key">Address:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->address)?></div></div>
                <div class= "pair"><div class = "key">Contact No:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->contact)?></div></div>
                <div class= "pair"><div class = "key">NIC:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->nic)?></div></div>
                <div class= "pair"><div class = "key">Email:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->email)?></div></div>
                <div class= "pair"><div class = "key">Qualifications:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->qualifications)?></div></div>

                <div class="flex-container">
                        <button type="submit" id="edit-button"><a href="editprofile">Edit Profile</a></button>
                        <button type="submit" id="changepw-button"><a href ="changepassword">Change Password</a></button>
                </div>
            
    </div>

</body>
</html>
