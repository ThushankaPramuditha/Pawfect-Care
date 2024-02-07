// Add Pet Details View
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
</head>
<body>

<?php $_SESSION['addnewpath'] = 'addpets' ?>
  

<div style="margin-left: 230px">
    <?php include '../app/views/components/panel-header-bar/withbutton.php'; ?> 
   

</div>

<!-- Add Pet Details Modal -->
<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Add Pet Details</h1>
        <div class="form-container">
            <form id="add-petdetails-form" action="<?php echo ROOT?>/Petowner/petdetails/add" method="post">
               
            <label for="pet_name">Name:</label>
            <input type="text" id="pet_name" name="pet_name" required><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br>

            <label for="pet_type">Type:</label>
            <input type="text" id="pet_type" name="pet_type" placeholder="ex: Dog, Cat, Parrot" required><br>

            <label for="breed">Breed:</label>
            <input type="text" id="breed" name="breed" required><br>

            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Female</label><br>

                <div class="flex-container">
                    <button type="submit" id="add-petdetails-button">Add Pet Details</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Pet Details Modal -->
<div class="modal-form" id="update-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Edit Pet Details</h1>
        <div id="updatepetdetails" class="form-container">
            <!-- Update form content goes here -->
        </div>
    </div>
</div>

<!-- Delete Pet Details Modal -->
<div class="modal-form" id="delete-modal">
    <div class="modal-content-delete">
        <h1>Delete Pet Details</h1>
        <p>Are you sure you want to delete this pet?</p>
        <div class="flex-container">
            <button class="reject">No</button>
            <a id="delete-petdetails" href=""><button class="delete-button">Delete</button></a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
           // Get the modal elements
            var addModal = document.getElementById("add-modal");
            var updateModal = document.getElementById("update-modal");
            var deleteModal = document.getElementById("delete-modal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Function to open add form modal
            function openAddModal() {
                addModal.style.display = "block";
            }

            function openUpdateModal(id) {
                console.log(id);
                updateModal.style.display = "block";
                $.get(`<?php echo ROOT?>/admin/Services/viewService/${id}`, function(data) {
                        // Update the modal content with the fetched data
                        $("#updateservice").html(data);
                    });
                span.onclick = function() {
                modal.style.display = "none";
                }
                
            }
            function openDeleteModal(id) {
                console.log(id);
                deleteModal.style.display = "block";
                document.getElementById("delete-service").href = `<?php echo ROOT?>/admin/Services/delete/${id}`;
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
        document.getElementById("add-service-form").addEventListener('submit', function(event) {
            // event.preventDefault();
            // Handle add form submission logic
            // ...
            // Close the add modal after submission if successful
            addModal.style.display = "none";
        });

        

    </script>

</body>
</html>
