<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Care Staff</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <?php $activePage = 'daycarebookingform';?>

    <style>
        .view-date-button {
            cursor: pointer;
            padding: 5px 10px;
            background-color: purple;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        /* Add this style for modals */
        .modal-form {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content-delete {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 5px;
        }


        ::-webkit-scrollbar{
            width: 0.6rem;
        }

        ::-webkit-scrollbar-thumb{
            background-color: var(--color-primary);
            border-radius: 1rem;
        }

        ::-webkit-scrollbar-track{
            background-color: var(--color-white);
        }
    
    </style>
</head>
<body>
    <div style="margin-top: 80px;">
    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
    </div> 
    <div style="margin-top: 80px;">
        <?php include '../app/views/components/dashboard-compo/daycaresidebar.php'; ?>
        <div style="margin-left: 230px; margin-top:130px">
        <div class="panel-header">
            <div class="search-bar" style="margin-left:920px;">
            <input type="text" id="search" placeholder="yyyy-mm-dd">
                    <button class="search-button">Search</button>
                </div>
  
            </div>
            </div>
    </div>

    <!-- View Day Care by Date Booking Modal -->
    <!-- <div class="modal-form" id="view-modal" style="margin-left:230px; margin-top:50px;">
        <div class="modal-content">
            <div class="form-container">
                <form id="view-booking-form" action="<?php echo ROOT?>/daycarebookingform/viewtable" method="post">
                    <div class="column">
                        <div class="form-group" style="width:400px;">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" required>
                            <div class="flex-container">
                                <button type="button" id="view-booking-button" style="width:100px; margin-left:150px;">View</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <div style="margin-left: 230px;margin-right:20px; overflow:hidden; height:360px; overflow-y:scroll; overflow-x:scroll;">
        <div id="daycarebookingviewtable">
            <?php include '../app/views/components/tables/daycarebookingviewtable.php'; ?>
        </div>    
    </div>

    <!-- Accept Booking Modal -->
    <div class="modal-form" id="accept-modal">
        <div class="modal-content-delete">
            <h1>Accept the Booking</h1>
            <p>The booking will be accepted</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="accept-booking" href=""><button class="d-button">Accept</button></a>
            </div>
        </div>
    </div>

    <!-- Decline Booking Modal -->
    <div class="modal-form" id="decline-modal">
        <div class="modal-content-delete">
            <h1>Decline the Booking</h1>
            <p>The Booking will be declined</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="decline-booking" href=""><button class="d-button">Decline</button></a>
            </div>
        </div>
    </div>


    <!-- Finished Booking Modal -->
    <div class="modal-form" id="finish-modal">
        <div class="modal-content-delete">
            <h1>Daycare Time Over</h1>
            <p>Daycare Time will be over </p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="finish-booking" href=""><button class="d-button" >Finish</button></a>
            </div>
        </div>
    </div>
    <script>
              $(document).ready(function(){
            $('#search').on('keyup', function(){
                var searchTerm = $(this).val();
                $.ajax({
                url: "<?php echo ROOT ?>/Daycarestaff/Daycarebookingform/search",
                type: "POST",
                data: {search: searchTerm},
                success: function(data) {
                    $('tbody').html(data);
                }
                });
            });

            
            $('body').on('click', '.deactivate-button', function(){
                var id = $(this).closest('tr').attr('key');
                openDeclineModal(id);
            });
            $('body').on('click', '.activate-button', function(){
                var id = $(this).closest('tr').attr('key');
                openAcceptModal(id);
            });

            $('body').on('click', '.finish-button', function(){
                var id = $(this).closest('tr').attr('key');
                openFinishModal(id);
            });
        });
        // $(document).ready(function() {
        //     $("#datepicker").datepicker({
        //         dateFormat: 'yy-mm-dd', // Format the date as yyyy-mm-dd
        //         onSelect: function(dateText, inst) {
        //             // Automatically trigger search when a date is selected
        //             var selectedDate = $("#datepicker").val();
        //             searchByDate(selectedDate);
        //         }
        //     });
        // });

        // function searchByDate(date) {
        //     $.ajax({
        //         url: "<?php echo ROOT?>/daycarebookingform/viewtable",
        //         method: "POST",
        //         data: { date: date },
        //         success: function(data) {
        //             $('#daycarebookingviewtable').html(data);
        //         }
        //     });
        // }


         //check
        var declineModal = document.getElementById("decline-modal");
        var acceptModal = document.getElementById("accept-modal");
        var finishModal = document.getElementById("finish-modal");


         // Get the <span> element that closes the modal
         var span = document.getElementsByClassName("close")[0];

        // Function to open accept modal
        function openAcceptModal(id) {
            console.log(id);
            acceptModal.style.display = "block";
            document.getElementById("accept-booking").href = `<?php echo ROOT?>/Daycarestaff/Daycarebookingform/accept/${id}`;

            span.onclick = function() {
                modal.style.display = "none";
            }
        }

        // Function to open decline modal
        function openDeclineModal(id) {
            console.log(id);
            declineModal.style.display = "block";
            document.getElementById("decline-booking").href = `<?php echo ROOT?>/Daycarestaff/Daycarebookingform/decline/${id}`;

            span.onclick = function() {
                modal.style.display = "none";
            }
        }
       
        function openFinishModal(id) {
            console.log(id);
            console.log("Open finish modal called with id:", id);
            console.log("Finish modal:", finishModal);
            finishModal.style.display = "block"; // Change 'finishModel' to 'finishModal'
            document.getElementById("finish-booking").href = `<?php echo ROOT?>/Daycarestaff/Daycarebookingform/finish/${id}`;

            span.onclick = function() {
                modal.style.display = "none";
            }
        }
        document.querySelectorAll('.activate-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openAcceptModal(id);
            });
        });

        // Event listeners for delete buttons click in the table
        document.querySelectorAll('.deactivate-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openDeclineModal(id);
            });
        });

        document.querySelectorAll('.finish-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openFinishModal(id);
            });
        });

        // Close modals when the close button is clicked
        var closeButtons = document.querySelectorAll('.close');

        // Close modals when the no button is clicked
        var noButtons = document.querySelectorAll('.reject');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                declineModal.style.display = "none";
                acceptModal.style.display = "none";
                finishModal.style.display = "none";

            });
        });
        noButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                declineModal.style.display = "none";
                acceptModal.style.display = "none";
                finishModal.style.display = "none";


            });
        });


    </script>
</body>
</html>
