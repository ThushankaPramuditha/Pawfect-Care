

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

<?php include '../app/views/components/dashboard-compo/veterinariansidebar.php'; ?>   
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
        <h1>Edit Profile</h1> 
        <div class = "formcontainer" id="updateveterianrian"> 
            <form id="edit-profile-form" action="<?php echo ROOT?>/Veterinarian/EditProfile/update/<?php echo $userdata->id; ?>" method="post">
            
                <label for="update-name">Full Name:</label>
                <input type="text" id="update-name" name="name" value="<?php echo $userdata->name;?>">
                <div id="error-update-name" class="error-message"></div>

                <label for="update-address">Address:</label>
                <input type="text" id="update-address" name="address" value="<?php echo $userdata->address;?>">
                <div id="error-update-address" class="error-message"></div>

                <label for="update-contact_no">Contact Number:</label>
                <input type="tel" id="update-contact_no" name="contact" value="<?php echo $userdata->contact;?>" >
                <div id="error-update-contact" class="error-message"></div>

                <label for="update-qualifications">Qualifications:</label>
                <textarea id="update-qualifications" name="qualifications" style="border-radius: 10px;" rows="4"><?php echo $userdata->qualifications; ?></textarea>
                <div id="error-update-qualifications" class="error-message"></div>

                <div class="flex-container">
                    <button type="submit" >Update Profile</button>
                </div>
            </form>   
        
    </div>
                
    </div>

</body>
<script>
    document.getElementById('update-name').addEventListener('input', validateUpdateName);
    document.getElementById('update-address').addEventListener('input', validateUpdateAddress);
    document.getElementById('update-contact_no').addEventListener('input', validateUpdateContactNumber);
    document.getElementById('update-qualifications').addEventListener('input', validateUpdateQualifications);
    
    document.getElementById("edit-profile-form").addEventListener('submit', function(event) {
        var isValid = true;

        isValid = validateUpdateName() && isValid;
        isValid = validateUpdateAddress() && isValid;
        isValid = validateUpdateContactNumber() && isValid;
        isValid = validateUpdateQualifications() && isValid;

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
