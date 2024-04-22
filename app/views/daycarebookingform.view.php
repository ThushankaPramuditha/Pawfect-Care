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

<?php
?>


     <?php include '../app/views/components/dashboard-compo/daycaresidebar.php'; ?>   
    <div style="margin-left: 230px">
        <!-- <?php include '../app/views/components/panel-header-bar/withbutton.php'; ?>  -->
    </div>


    <!-- Add Day Care Booking Modal
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
    </div> -->

    <!-- View Day Care by Date Booking Modal -->
    <div class="modal-form" id="view-modal" style="margin-left:230px; margin-top:50px;">
        <div class="modal-content">
            <div class="form-container">
                <form id="view-booking-form" action="<?php echo ROOT?>/daycarebookingform/viewtable" method="post">
                    <div class="column">
                        <div class="form-group" style="width:400px;">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" required>
                            <div class="flex-container">
                                <button type="button" id="view-booking-button" style="width:100px; margin-left:150px;" onclick="loadBookings()">View</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div style="margin-left: 230px; margin-right:20px;">
    <div id="daycarebookingviewtable">
    <!-- Display the initial table content here -->
    <?php include '../app/views/components/tables/daycarebookingviewtable.php'; ?>
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
       
        function loadBookings() {
        // Get the selected date from the calendar input
        var selectedDate = document.getElementById('date').value;

        // Send the selected date to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo ROOT ?>/daycarebookingform/search', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update the table with the received data
                    document.getElementById('components/tables/daycarebookingviewtable').innerHTML = xhr.responseText;
                } else {
                    console.error('Failed to load bookings.');
                }
            }
        };
        xhr.send('drop_off_date=' + encodeURIComponent(selectedDate));
    }
            

    </script>
</body>
</html>
