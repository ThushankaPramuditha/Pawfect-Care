<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>

    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/petdetails.css">
    <style>
      .form-container1{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 60%; 
        margin-top:100px;
        margin-left:10%;
   }  
    .form-container1 h1{
          font-size: 40px;
          font-weight: 600;
          color: #333;
          margin-bottom: 20px;
          text-align: center;
    }
    

    </style>
  
</head>

<div class="logo">
   <a href="<?=ROOT?>home">
    <img src="<?= ROOT ?>/assets/images/footer-logo.png" alt="Pawfect Care Logo">
  </a>
</div>

<body>

<div class="sidebar-menu">
<?php include '../app/views/components/dashboard-compo/petownersidebar.php'; ?>
</div>
<div class="form-container1"> 
  <h1>Change Password</h1>

      <form id="change-password-form" action="<?php echo ROOT?>/petowner/changepassword/update" method="post">
      
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

