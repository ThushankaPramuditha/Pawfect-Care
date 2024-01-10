<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinarians</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


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
                    <input type="text" id="name" name="name" required><br>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required><br>

                    <label for="contact_no">Contact Number:</label>
                    <input type="tel" id="contact_no" name="contact" required pattern="[0-9]{10}"><br>
                </div>
                <div class="column">
                    <label for="nic">NIC:</label>
                    <input type="text" id="nic" name="nic" required><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>

                    <label for="qualifications">Qualifications:</label>
                    <textarea id="qualifications" name="qualifications" style="border-radius: 10px;" rows="4" required></textarea>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required><br>
                    
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required><br>
                
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
            <p>The user data will be removed from the view</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="deactivate-staff" href=""><button class="d-button">Deactivate</button></a>
            </div>
            
        </div>
    </div>


    <script>

           // Get the modal elements
            var addModal = document.getElementById("add-modal");
            var updateModal = document.getElementById("update-modal");
            //check
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

            });
        });
        noButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                deactivateModal.style.display = "none";

            });
        });

        function validateForm() {
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var contact_no = document.getElementById('contact_no').value;
            var nic = document.getElementById('nic').value;
            var email = document.getElementById('email').value;
            var qualifications = document.getElementById('qualifications').value;
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            var terms = document.querySelector('input[name="terms"]:checked');

            var errors = [];

            if (!name) errors.push("Name is required.");
            if (!address) errors.push("Address is required.");
            if (!contact_no.match(/^[0-9]{10}$/)) errors.push("Contact number must be 10 digits.");
            if (!nic.match(/^[0-9]{9}[vVxX]$|^([0-9]{12})$/)) errors.push("NIC format is not valid.");
            if (!email.match(/^\S+@\S+\.\S+$/)) errors.push("Email format is not valid.");
            if (!qualifications) errors.push("qualifications are required.");
            if (!password.match(/^(?=.*[\W]).{6,}$/)) errors.push("Password must be at least 6 characters long and contain at least one symbol.");
        
            if (password !== confirm_password) errors.push("Passwords do not match.");
            
            if (errors.length > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: errors.join("<br>"),
                });
                return false;
            }

            return true;
        }

        // Handle form submissions (you can add your form submission logic here)
        document.getElementById("add-staff-form").addEventListener('submit', function(event) {
            // event.preventDefault();
            // Handle add form submission logic
            // ...
            // Close the add modal after submission if successful
            if (!validateForm()) {
                event.preventDefault();
            }
            addModal.style.display = "none";
        });

        

    </script>
</body>
</html>
