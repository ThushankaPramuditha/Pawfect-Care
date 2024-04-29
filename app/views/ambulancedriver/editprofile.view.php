


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <?php $activePage = 'myprofile';?>

    <script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
<?php include '../app/views/components/dashboard-compo/ambulancedriversidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        <h1>Edit Profile</h1> 
        <div class = "formcontainer" id="updatedriver"> 
            <form id="edit-profile-form" action="<?php echo ROOT?>/ambulancedriver/EditProfile/update/<?php echo $userdata->id; ?>" method="post">
            
                <label for="update-name">Full Name:</label>
                <input type="text" id="update-name" name="name" value="<?php echo $userdata->name;?>">
                <div id="error-update-name" class="error-message"></div>

                <label for="update-address">Address:</label>
                <input type="text" id="update-address" name="address" value="<?php echo $userdata->address;?>">
                <div id="error-update-address" class="error-message"></div>

                <label for="update-contact_no">Contact Number:</label>
                <input type="tel" id="update-contact_no" name="contact" value="<?php echo $userdata->contact;?>" >
                <div id="error-update-contact" class="error-message"></div>

                <label for="update-license">License number:</label>
        <input type="text" id="update-license" name="license" value="<?php echo $userdata->license;?>">
        <div id="error-update-license" class="error-message"></div>

                <div class="flex-container">
                    <button type="submit" >Update Profile</button>
                </div>
            </form>   
        
    </div>
                
    </div>
</div>
</body>
<script>
    document.getElementById('update-name').addEventListener('input', validateUpdateName);
    document.getElementById('update-address').addEventListener('input', validateUpdateAddress);
    document.getElementById('update-contact_no').addEventListener('input', validateUpdateContactNumber);
    document.getElementById('update-license').addEventListener('input', validateUpdateLicense);
    
    document.getElementById("edit-profile-form").addEventListener('submit', function(event) {
        var isValid = true;

        isValid = validateUpdateName() && isValid;
        isValid = validateUpdateAddress() && isValid;
        isValid = validateUpdateContactNumber() && isValid;
        isValid = validateUpdateLicense() && isValid;

        if (!isValid) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: "Please correct the errors before submitting.",
            });
        }
    });
</script>
</html>
