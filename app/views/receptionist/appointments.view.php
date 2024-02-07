<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


<body style="margin: 0; display: flex;">
   
    <?php include '../app/views/components/dashboard-compo/receptionistsidebar.php'; ?>

    <div style="flex: 1; display: flex; flex-direction: column; margin-left: 30px; padding: 10px 10px 100px 10px;">
<?php $_SESSION['addnewpath'] = 'addappointments' ?>
       
       <?php include '../app/views/components/panel-header-bar/withbutton.php'; ?> 
        
        <?php include '../app/views/components/tables/appointmenttable.php'; ?> 
    </div>

<!-- </body>
</html>

Add Appointment Modal -->

<div class="modal-form" id="add-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Add Appointments</h1>
                <div class="form-container">
                    <form id="add-appointment-form" action="<?php echo ROOT?>/Receptionist/Appointments/add" method="post">
                        
                        
                        <label for="appointment">Patient No:</label>
                        <input type="text" id="patient_no" name="patient_no" required><br>

                        <label for="appointment">Pet ID:</label>
                        <input type="text" id="pet_id" name="pet_id" required><br>

                        <label for="appointment">Pet Name:</label>
                        <input type="text" id="pet_name" name="pet_name" required><br>

                        <label for="appointment">Pet Owner Name:</label>
                        <input type="text" id="pet_owner_name" name="pet_owner_name" required><br>

                        <label for="appointment">Contact No:</label>
                        <input type="text" id="contact_no" name="contact_no" required><br>

                        <label for="appointment">Date:</label>
                        <input type="date" id="date" name="date" required><br>


                        <div class="flex-container">
                            <button type="submit" id="add-appointment-button" >Add Appointment</button>
                        </div>
                    </form>
                </div>
             
        </div>
</div>

    <!-- Update Appointment Modal -->
    <div class="modal-form" id="update-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Appointment</h1>
                <div id="updateappointment" class="form-container">
                    
                </div>
        </div>
    </div>

    <!-- Delete Appointment Modal -->
    <!-- <div class="modal-form" id="delete-modal">
        <div class="modal-content-delete">
            <h1>Delete Appointment</h1>
            <p>Are you sure you want to delete this Appointment?</p>
            <div class="flex-container">
                <button class="reject">No</button>
                <a id="delete-appointment" href=""><button class="delete-button">Delete</button></a>
            </div>
            
        </div>
    </div> -->


    <script>
           // Get the modal elements
            var addModal = document.getElementById("add-modal");
            var updateModal = document.getElementById("update-modal");
            // var deleteModal = document.getElementById("delete-modal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Function to open add form modal
            function openAddModal() {
                addModal.style.display = "block";
            }

            function openUpdateModal(id) {
                console.log(id);
                updateModal.style.display = "block";
                $.get(`<?php echo ROOT?>/receptionist/Appointments/viewAppointments/${id}`, function(data) {
                        // Update the modal content with the fetched data
                        $("#updateappointment").html(data);
                    });
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

        // Event listeners for delete buttons click
        document.querySelectorAll('.delete-icon').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openDeleteModal(id);
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
                deleteModal.style.display = "none";

            });
        });
        noButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                deleteModal.style.display = "none";

            });
        });

        // Handle form submissions (you can add your form submission logic here)
        document.getElementById("add-appointment-form").addEventListener('submit', function(event) {
            // event.preventDefault();
            // Handle add form submission logic
            // ...
            // Close the add modal after submission if successful
            addModal.style.display = "none";
        });

        

    </script>
</body>
</html>
