<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Care Staff</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    .view-date-button {
      cursor: pointer;
      padding: 5px 10px;
      background-color: purple;
      color: #fff;
      border: none;
      border-radius: 4px;
    }
  </style>
</head>

<body>

    <?php include '../app/views/components/dashboard-compo/daycaresidebar.php'; ?>  
    <div style="margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withbutton.php'; ?> 
        <div style="margin-left: 1200px; margin-top:40px;">
         <button class="view-date-button"><i class="fas fa-calendar"></i></button>
        </div>
          <div style="margin-left: 20px; margin-right:20px;">
            <?php include '../app/views/components/tables/daycarebookingtable.php'; ?>
          </div>
    </div>


    <!-- Add Day Care Booking Modal -->
    <div class="modal-form" id="add-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Add Booking</h1>
            <div class="form-container">
                <form id="add-booking-form" action="<?php echo ROOT?>/daycarebooking/add" method="post">
  
                    <div class="column">
                        <div class="form-group">

                      
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                      
                        <div class="flex-container">
                            <button type="submit" id="add-booking-button">Add a Slot</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Day Care by Date Booking Modal -->
    <div class="modal-form" id="view-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>View Booking</h1>
            <div class="form-container">
                <form id="view-booking-form" action="<?php echo ROOT?>/daycarebooking/view" method="post">
                    <div class="column">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="flex-container">
                            <button type="submit" id="view-booking-button">View</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

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

            // Event listener for add button click
            document.querySelector('.add-new-button').addEventListener('click', function () {
                openAddModal();
            });


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
