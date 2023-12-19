<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


<body>
<?php $_SESSION['addnewpath'] = 'addservice' ?>

        <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withbutton.php'; ?> 
        <?php include '../app/views/components/tables/servicetable.php'; ?> 
    </div>

<!-- </body>
</html>

Add Service Modal -->

<div class="modal-form" id="add-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Add Service</h1>
                <div class="form-container">
                    <form id="add-service-form" action="<?php echo ROOT?>/Admin/Services/add" method="post">
                        
                        
                        <label for="service">Service:</label>
                        <input type="text" id="service" name="service" required><br>

                        <label for="description">Description:</label>
                        <textarea id="description" name="description" style="border-radius: 10px;" rows="4" required></textarea>

                        <div class="flex-container">
                            <button type="submit" id="add-service-button" >Add Service</button>
                        </div>
                    </form>
                </div>
             
        </div>
</div>

    <!-- Update Service Modal -->
    <div class="modal-form" id="update-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Service</h1>
                <div id="updateservice" class="form-container">
                    
                </div>
        </div>
    </div>

    <!-- Delete Service Modal -->
    <div class="modal-form" id="delete-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Delete Service</h1>
            <p>Are you sure you want to delete this service?</p>
            <div class="flex-container">
                <button type="submit">No</button>
                <button class="delete-button"><a id="delete-service" href="#">Delete</a></button>
            </div>
        </div>
    </div>


    <script>
           // Get the modal elements
            var addModal = document.getElementById("add-modal");
            var updateModal = document.getElementById("update-modal");

            // Get the buttons that open the modals
            var addButton = document.querySelector('.add-button');
            var updateButtons = document.querySelectorAll('.view-button');

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
            function opendeleteModal(id) {
                console.log(id);
                deleteModal.style.display = "block";
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
                openDeleteModal(id);
            });
        });

        // Close modals when the close button is clicked
        var closeButtons = document.querySelectorAll('.close');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                addModal.style.display = "none";
                updateModal.style.display = "none";
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
