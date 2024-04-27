<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">

</head>
<?php $activePage = 'myprofile'; ?>


<body>
<?php include '../app/views/components/panel-header-bar/hiadmin.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
                <h1>My Profile</h1> 
                <div class= "pair"><div class = "key">Staff ID:</div>  <div class = "value"><?= htmlspecialchars($user->id) ?></div></div>
                <div class= "pair"><div class = "key">Email:</div> <div class = "value"><?= htmlspecialchars($user->email) ?></div></div>

                <div class="flex-container">
                        <button type="submit" id="changepw-button"><a href ="changepassword">Change Password</a></button>
                </div>
            
    </div>
</div>
</body>
</html>
