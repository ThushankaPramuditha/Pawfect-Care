<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinarians</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>


<body>
    <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withbutton.php'; ?> 
        <?php include '../app/views/components/tables/vettable.php'; ?> 
    </div>

</body>
</html>

<!-- Add Veterinarian Modal -->
<div class="modal-form" id="add-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Add Veterinarian</h1>
            <div class="form-container">
                <form id="add-staff-form" action="<?php echo ROOT?>/Admin/Veterinarians/add" method="post">
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
                    </div>
                    <div class="column">
                        <label for="qualifications">Qualifications:</label>
                        <textarea id="qualifications" name="qualifications" style="border-radius: 10px;" rows="4"></textarea>
                        <div id="error-qualifications" class="error-message"></div>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password">
                        <div id="error-password" class="error-message"></div>

                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <div id="error-confirm-password" class="error-message"></div>
                    </div>
                    <div class="flex-container">
                        <button type="submit" id="add-staff-button">Add Veterinarian</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Update Veterinarian Modal -->
    <div class="modal-form" id="update-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Veterinarian</h1>
                <div id="updateveterinarian" class="form-container">
                    
                </div>
        </div>
    </div>

    <!-- check this -->
    <!-- Deactivate veterinarian Modal -->
    <div class="modal-form" id="deactivate-modal">
        <div class="modal-content-delete">
            <h1>Deactivate Veterinarian</h1>
            <p>The user will be deactivated</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="deactivate-staff" href=""><button class="d-button">Deactivate</button></a>
            </div>
            
        </div>
    </div>

    <!-- activate veterinarian Modal -->
    <div class="modal-form" id="activate-modal">
        <div class="modal-content-delete">
            <h1>Activate Veterinarian</h1>
            <p>The user data will be activated</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="activate-staff" href=""><button class="d-button">Activate</button></a>
            </div>
            
        </div>
    </div>


    <script>

           // Get the modal elements
            var addModal = document.getElementById("add-modal");
            var updateModal = document.getElementById("update-modal");
            //check
            var activateModal = document.getElementById("activate-modal");
            var deactivateModal = document.getElementById("deactivate-modal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Function to open add form modal
            function openAddModal() {
                addModal.style.display = "block";
            }

            function openUpdateModal(id) {
                console.log(id);
                updateModal.style.display = "block";
                $.get(`<?php echo ROOT?>/admin/Veterinarians/viewVeterinarian/${id}`, function(data) {
                        // Update the modal content with the fetched data
                        $("#updateveterinarian").html(data);
                    });

                // set time out and updateforminit
                setTimeout(updateFormInit, 1000);

                span.onclick = function() {
                modal.style.display = "none";
                }
                
            }
            function openActivateModal(id) {
                console.log(id);
                activateModal.style.display = "block";
                document.getElementById("activate-staff").href = `<?php echo ROOT?>/admin/Veterinarians/activate/${id}`;  //hereeee
                span.onclick = function() {
                modal.style.display = "none";
                }
                
            }
            function openDeactivateModal(id) {
                console.log(id);
                deactivateModal.style.display = "block";
                document.getElementById("deactivate-staff").href = `<?php echo ROOT?>/admin/Veterinarians/deactivate/${id}`;  //hereeee
                span.onclick = function() {
                modal.style.display = "none";
                }
                
            }


        // Event listener for add button click
        document.querySelector('.add-new-button').addEventListener('click', function () {
            openAddModal();
        });

        // Event listeners for update buttons click
        document.querySelectorAll('.edit-icon').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                openUpdateModal(id);
            });
        });

        // Event listeners for activate buttons click in the table
        document.querySelectorAll('.activate-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openActivateModal(id);
            });
        });

        // Event listeners for deactivate buttons click in the table
        document.querySelectorAll('.deactivate-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openDeactivateModal(id);
            });
        });

        // Close modals when the close button is clicked
        var closeButtons = document.querySelectorAll('.close');

        // Close modals when the no button is clicked
        var noButtons = document.querySelectorAll('.reject');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                addModal.style.display = "none";
                updateModal.style.display = "none";
                activateModal.style.display = "none";
                deactivateModal.style.display = "none";

            });
        });
        noButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                deactivateModal.style.display = "none";
                activateModal.style.display = "none";


            });
        });

        
        // Attach event listeners for validation on input for add form

        document.getElementById('name').addEventListener('input', validateName);
        document.getElementById('address').addEventListener('focus', validateName);
        document.getElementById('contact_no').addEventListener('focus', validateAddress);
        document.getElementById('nic').addEventListener('focus', validateContactNumber);
        document.getElementById('email').addEventListener('focus', validateNIC);
        document.getElementById('qualifications').addEventListener('focus', validateEmail);
        document.getElementById('password').addEventListener('focus', validateQualifications);
        document.getElementById("confirm_password").addEventListener('focus', validatePassword);
        document.getElementById("confirm_password").addEventListener('input', validateConfirmPassword);


        function validateAddForm() {
            var isValid = true;

            isValid = validateName() && isValid;
            isValid = validateAddress() && isValid;
            isValid = validateContactNumber() && isValid;
            isValid = validateNIC() && isValid;
            isValid = validateEmail() && isValid;
            isValid = validateQualifications() && isValid;
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
        document.getElementById("add-staff-form").addEventListener('submit', function(event) {
            
            if (!validateAddForm()) {
                event.preventDefault();
            } else {
                addModal.style.display = "none";
            }
        });
        function updateFormInit() {
            document.getElementById('update-name').addEventListener('input', validateUpdateName);
            document.getElementById('update-address').addEventListener('input', validateUpdateAddress);
            document.getElementById('update-contact_no').addEventListener('input', validateUpdateContactNumber);
            document.getElementById('update-qualifications').addEventListener('input', validateUpdateQualifications);
            
            document.getElementById("updated-form").addEventListener('submit', function(event) {
                console.log("insideee");
                if (!validateUpdateForm()) {
                    event.preventDefault();
                } else {
                    addModal.style.display = "none";
                }
        
            });
        }

        function validateUpdateForm() {
            var isValid = true;

            isValid = validateUpdateName() && isValid;
            isValid = validateUpdateAddress() && isValid;
            isValid = validateUpdateContactNumber() && isValid;
            isValid = validateUpdateQualifications() && isValid;

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
        

    </script>
</body>
</html>
