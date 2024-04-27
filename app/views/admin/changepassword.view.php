
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <?php $activePage = 'myprofile'; ?>

    <script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>
</head>

<body>
<?php include '../app/views/components/panel-header-bar/hiadmin.php'; ?>
<div style = "margin-top: 80px; ">
<?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/panel-header-bar/hiadmin.php'; ?>
        <div class = "formcontainer"> 
         
            <h1>Change Password</h1>

            <form id="change-password-form" action="<?php echo ROOT?>/admin/changepassword/update" method="post">
            
                <label for="prev-password">Previous Password:</label>
                <input type="password" id="prev-password" name="prev-password" required>
                <div id="error-prev-password" class="error-message"></div>
                <br>


                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" required>
                <div id="error-new-password" class="error-message"></div>
                <br>


                <label for="confirm-password">Confirm New Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <div id="error-confirm-password" class="error-message"></div>
                <br>


                <div class="flex-container">
                    <button type="submit" id="change-password-button" >Change Password</button>
                </div>
            </form>   
     
        </div>
</div>          
    </div>
    <script>

        document.getElementById('prev-password').addEventListener('input', validatePrevPassword);
        document.getElementById('new-password').addEventListener('input', validateNewPassword);
        document.getElementById('confirm-password').addEventListener('input', validateConfirmNewPassword);

        
        document.getElementById('change-password-form').addEventListener('submit', function(event) {
            
            var isValid = true;

            isValid = validatePrevPassword() && isValid;
            isValid = validateNewPassword() && isValid;
            isValid = validateConfirmNewPassword() && isValid;

            if (!isValid) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: "Please correct the errors before submitting.",
                });
            }
        });

        //sweeetalert for validation SUCCESS and ERROR
        window.onload = function() {
            <?php if (isset($_SESSION['flash'])): ?>
                const flash = <?php echo json_encode($_SESSION['flash']); ?>;
                if (flash.success) {
                    Swal.fire('Success', flash.success, 'success');
                } else if (flash.error) {
                    Swal.fire('Error', flash.error, 'error');
                }
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>
        };
 
    </script> 

</body>
</html>
