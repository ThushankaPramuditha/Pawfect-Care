<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Owner Details</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
<script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>


<body>
<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/receptionistsidebar.php'; ?>  
    <div style = "margin-left: 230px; margin-top:130px">
    <div class="panel-header" style="display:flex; justify-content:space-between">
            <button class="add-new-button">Add New</button>
                <div class="search-bar">
                    <input type="text" id="search" placeholder="Search pet owners...">
                    <button class="search-button">Search</button>
                </div>
            
    </header>
        </div>
        <?php include '../app/views/components/tables/petownerdetailstable.php'; ?> 
    </div>
<!-- Add Pets Modal -->
<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Register Pet Owner</h1>
        <div class="form-container">
            <form id="add-petowner-form" action="<?php echo ROOT?>/receptionist/petownerdetails/add" method="post">
                <div class="column">

                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name">
                <div id="error-name" class="error-message"></div>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
                <div id="error-address" class="error-message"></div>

                <label for="contact_no">Contact Number:</label>
                <input type="tel" id="contact_no" name="contact" pattern="[0-9]{10}">
                <div id="error-contact" class="error-message"></div>
            
                <label for="nic">NIC:</label>
                <input type="text" id="nic" name="nic">
                <div id="error-nic" class="error-message"></div>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <div id="error-email" class="error-message"></div>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <div id="error-password" class="error-message"></div>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <div id="error-confirm-password" class="error-message"></div>

                <div class="flex-container">
                    <button class="button" type="submit" name="signup" id="add-petowner-button">Sign up</button>
                </div>
                
            </form>
        </div>
        
    </div>
</div>



<script>

    // Get the modal elements
    var addModal = document.getElementById("add-modal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    
    // Function to open add form modal
    function openAddModal() {
        addModal.style.display = "block";
    }
    // Event listener for add button click
    document.querySelector('.add-new-button').addEventListener('click', function () {
        openAddModal();
    });

    
    
    
    var closeButtons = document.querySelectorAll('.close');

        // Close modals when the no button is clicked
        var noButtons = document.querySelectorAll('.reject');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                addModal.style.display = "none";


            });
        });

        document.getElementById('name').addEventListener('input', validateName);
        document.getElementById('address').addEventListener('focus', validateName);
        document.getElementById('contact_no').addEventListener('focus', validateAddress);
        document.getElementById('nic').addEventListener('focus', validateContactNumber);
        document.getElementById('email').addEventListener('focus', validateNIC);
        document.getElementById('password').addEventListener('focus', validateEmail);
        document.getElementById("confirm_password").addEventListener('focus', validatePassword);
        document.getElementById("confirm_password").addEventListener('input', validateConfirmPassword);


        function validateAddForm() {
            var isValid = true;

            isValid = validateName() && isValid;
            isValid = validateAddress() && isValid;
            isValid = validateContactNumber() && isValid;
            isValid = validateNIC() && isValid;
            isValid = validateEmail() && isValid;
            isValid = validatePassword() && isValid;
            isValid = validateConfirmPassword() && isValid;


            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: "Please correct the errors before submitting.",
                });
                return false;
            }
            return true;
        }
            

    document.getElementById("add-petowner-form").addEventListener('submit', function(event) {
        
        if (!validateAddForm()) {
            event.preventDefault();
        } else {
            addModal.style.display = "none";
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