<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Drivers</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

<?php $activePage = 'ambulancedrivers'; ?>


<body>
<?php include '../app/views/components/panel-header-bar/hiadmin.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px; margin-top:130px">
    <div class="panel-header">
            <button class="add-new-button">Add New</button>
            <div class="search-bar">
                    <input type="text" id="search" placeholder="Search ambulance drivers...">
                    <button class="search-button">Search</button>
                </div>
            
    </header>
        </div>
        <div class = "table-container">
        <table>
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>NIC</th>
                <th>Email</th>
                <th>License Number</th>
                <th>Status</th>
                <th class="edit-action-buttons"></th>
                <th class="activate-action-buttons"></th>
                <th class="deactivate-action-buttons"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($ambulancedrivers) && !empty($ambulancedrivers)): ?>
                <?php foreach ($ambulancedrivers as $driver): ?>
                    <tr key = "<?php echo $driver->id; ?>" >
                        <td><?= htmlspecialchars($driver->id); ?></td>
                        <td><?= htmlspecialchars($driver->name); ?></td>
                        <td><?= htmlspecialchars($driver->address); ?></td>
                        <td><?= htmlspecialchars($driver->contact); ?></td>
                        <td><?= htmlspecialchars($driver->nic); ?></td>
                        <td><?= htmlspecialchars($driver->email); ?></td>
                        <td><?= htmlspecialchars($driver->license); ?></td>
                        <td><?= htmlspecialchars($driver->status); ?></td>
                        
                        <td class="edit-action-buttons">
                            <button class="edit-icon"></button>
                        </td>
                        <td class="activate-action-buttons">
                            <button class="activate-button">Activate</button>
                        </td>
                        <td class="deactivate-action-buttons">
                            <button class="deactivate-button">Deactivate</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10">No ambulance drivers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        
    </table> 
    </div>
            </div>
</body>
</html>


<!-- Add Ambulance Drivers Modal -->
<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Add Ambulance Drivers</h1>
        <div class="form-container">
            <form id="add-staff-form" action="<?php echo ROOT?>/Admin/AmbulanceDrivers/add" method="post">
            <div class="column">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="name">
                        <div id="error-name" class="error-message"></div>

                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address">
                        <div id="error-address" class="error-message"></div>

                        <label for="contact_no">Contact Number:</label>
                        <input type="tel" id="contact_no" name="contact" >
                        <div id="error-contact" class="error-message"></div>
                    
                        <label for="nic">NIC:</label>
                        <input type="text" id="nic" name="nic">
                        <div id="error-nic" class="error-message"></div>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email">
                        <div id="error-email" class="error-message"></div>
                    </div>
                    <div class="column">
                        <label for="nic">License Number:</label>
                        <input type="text" id="license" name="license" ><br>
                        <div id="error-license" class="error-message"></div>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password">
                        <div id="error-password" class="error-message"></div>

                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                        <div id="error-confirm-password" class="error-message"></div>
                    </div>
                </div>
                <div class="flex-container">
                    <button type="submit" id="add-staff-button">Add Ambulance Drivers</button>
                </div>
                
            </form>
        </div>
        
    </div>
</div>

    <!-- Update Ambulance Drivers Modal -->
    <div class="modal-form" id="update-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Ambulance Drivers</h1>
                <div id="updateambulancedriver" class="form-container">
                    
                </div>
        </div>
    </div>

    <!-- check this -->
    <!-- Deactivate Ambulance Drivers Modal -->
    <div class="modal-form" id="deactivate-modal">
        <div class="modal-content-delete">
            <h1>Deactivate Ambulance Driver</h1>
            <p>The user will be deactivated</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="deactivate-staff" href=""><button class="d-button">Deactivate</button></a>
            </div>
            
        </div>
    </div>
    <!-- activate  Modal -->
    <div class="modal-form" id="activate-modal">
        <div class="modal-content-delete">
            <h1>Activate Ambulance Driver</h1>
            <p>The user will be activated</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="activate-staff" href=""><button class="d-button">Activate</button></a>
            </div>
            
        </div>
    </div>


    <script>
         $(document).ready(function(){
            $('#search').on('keyup', function(){
                var searchTerm = $(this).val();
                $.ajax({
                url: "<?php echo ROOT ?>/Admin/AmbulanceDrivers/search",
                type: "POST",
                data: {search: searchTerm},
                success: function(data) {
                    $('tbody').html(data);
                }
                });
            });

            // to update when filtered by search
            $('body').on('click', '.edit-icon', function(){
                var id = $(this).closest('tr').attr('key');
                openUpdateModal(id);
            });

            
            $('body').on('click', '.deactivate-button', function(){
                var id = $(this).closest('tr').attr('key');
                openDeactivateModal(id);
            });
            $('body').on('click', '.activate-button', function(){
                var id = $(this).closest('tr').attr('key');
                openActivateModal(id);
            });
        });

           // Get the modal elements
            var addModal = document.getElementById("add-modal");
            var updateModal = document.getElementById("update-modal");
            //check
            var deactivateModal = document.getElementById("deactivate-modal");
            var activateModal = document.getElementById("activate-modal");


            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Function to open add form modal
            function openAddModal() {
                addModal.style.display = "block";
            }

            function openUpdateModal(id) {
                console.log(id);
                updateModal.style.display = "block";
                $.get(`<?php echo ROOT?>/admin/AmbulanceDrivers/viewAmbulanceDriver/${id}`, function(data) {
                        // Update the modal content with the fetched data
                        $("#updateambulancedriver").html(data);
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
                document.getElementById("activate-staff").href = `<?php echo ROOT?>/admin/AmbulanceDrivers/activate/${id}`;  //hereeee
                span.onclick = function() {
                modal.style.display = "none";
                }
                
            }
            function openDeactivateModal(id) {
                console.log(id);
                deactivateModal.style.display = "block";
                document.getElementById("deactivate-staff").href = `<?php echo ROOT?>/admin/AmbulanceDrivers/deactivate/${id}`;  //hereeee
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

        // Event listeners for delete buttons click in the table
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
                deactivateModal.style.display = "none";
                activateModal.style.display = "none";


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
        document.getElementById('license').addEventListener('focus', validateEmail);
        document.getElementById('password').addEventListener('focus', validateLicense);
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
            document.getElementById('update-license').addEventListener('input', validateUpdateLicense);
            
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
            isValid = validateUpdateLicense() && isValid;

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