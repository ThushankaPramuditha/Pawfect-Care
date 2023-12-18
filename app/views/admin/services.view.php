<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
</head>

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
            <h1>Add Service</h1>
                <div class="form-container">
                    <form id="updated-form" action="<?php echo ROOT?>/Admin/Services/add" method="post">
                        
                        
                        <label for="updated-service">Service:</label>
                        <input type="text" id="updated-service" name="service" required><br>

                        <label for="updated-description">Description:</label>
                        <textarea id="updated-description" name="description" style="border-radius: 10px;" rows="4" required></textarea>

                        <div class="flex-container">
                            <button type="submit" >Update Service</button>
                            <button class="delete-button"><a id="delete-service" href="#">Delete</a></button>
                        </div>
                    </form>
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

            // Function to open add form modal
            function openAddModal() {
                addModal.style.display = "block";
            }

            function openUpdateModal(name, description,id) {
                // Populate update form fields with existing data
                document.getElementById("updated-service").value = name;
                document.getElementById("updated-description").value = email;
                document.getElementById("service-id").value = id;
                document.getElementById("delete-service").href = "<?php echo ROOT ?>/Admin/Services//delete/"+id;
                updateModal.style.display = "block";
            }

        // Event listener for add button click
        document.querySelector('.add-new-button').addEventListener('click', function () {
            openAddModal();
        });

        // Event listeners for update buttons click
        document.querySelectorAll('.edit-icon').forEach(function (button) {
            button.addEventListener('click', function () {
                var name = this.parentElement.parentElement.querySelector('td:first-child').textContent;
                var description = this.parentElement.parentElement.querySelector('td:nth-child(2)').textContent;
                var id = this.getAttribute('key');
                openUpdateModal(name, description, id);
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

        document.getElementById("update-service-form").addEventListener('submit', function(event) {
            // event.preventDefault();
            // Handle update form submission logic
            // ...
            // Close the update modal after submission if successful
            updateModal.style.display = "none";
        });

    </script>
</body>
</html>
