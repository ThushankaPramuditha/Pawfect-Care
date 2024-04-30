<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
<script src="<?php echo ROOT?>/assets/js/validatepetdetails.js"></script>



<body>
    <?php $activePage = 'petdetails';?>

    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
    <div style="margin-top: 80px; ">
        <?php include '../app/views/components/dashboard-compo/receptionistsidebar.php'; ?>
        <div style="margin-left: 230px; margin-top:130px">

            <div class="panel-header" style="display:flex; justify-content:space-between">
                <button class="add-new-button">Add New</button>
                <div class="search-bar">
                    <input type="text" id="search" placeholder="Search pets...">
                    <button class="search-button">Search</button>
                </div>

                </header>
            </div>

            <?php include '../app/views/components/tables/petdetailstable.php'; ?>
        </div>
    </div>


    <!-- Add Pets Modal -->
    <div class="modal-form" id="add-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Add New Pets</h1>
            <div class="form-container">
                <form id="add-pet-form" action="<?php echo ROOT?>/receptionist/petdetails/add" method="post">

                    <label for="petowner_id">Pet Owner ID:</label>
                    <input type="text" id="petowner_id" name="petowner_id">
                    <div id="error-id" class="error-message"></div>

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <div id="error-name" class="error-message"></div>

                    <label for="birthday">Date of Birth:</label>
                    <input type="date" id="birthday" name="birthday" max="<?= date('Y-m-d'); ?>">
                    <div id="error-birthday" class="error-message"></div>

                    <!-- enum to select gender-->
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <div id="error-gender" class="error-message"></div>

                    <label for="species">Species:</label>
                    <input type="text" id="species" name="species">
                    <div id="error-species" class="error-message"></div>

                    <label for="breed">Breed:</label>
                    <input type="text" id="breed" name="breed">
                    <div id="error-breed" class="error-message"></div>


                    <div class="flex-container">
                        <button type="submit" id="add-pet-button">Add Pet</button>
                    </div>

                </form>
            </div>

        </div>



        <script>
        $(document).ready(function() {
            $('#search').on('keyup', updateTable);

            function updateTable() {
                var searchTerm = $('#search').val();
                console.log(searchTerm);

                $.ajax({
                    url: "<?php echo ROOT ?>/Receptionist/petdetails/search",
                    type: "POST",
                    data: {
                        search: searchTerm,
                    },
                    success: function(data) {
                        $('tbody').html(data);
                    }
                });
            }

        });
        // Get the modal elements
        var addModal = document.getElementById("add-modal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];


        // Function to open add form modal
        function openAddModal() {
            addModal.style.display = "block";
        }
        // Event listener for add button click
        document.querySelector('.add-new-button').addEventListener('click', function() {
            openAddModal();
        });




        var closeButtons = document.querySelectorAll('.close');

        // Close modals when the no button is clicked
        var noButtons = document.querySelectorAll('.reject');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                addModal.style.display = "none";


            });
        });

        // Attach event listeners for validation on input for add form
        document.getElementById('petowner_id').addEventListener('input', validateID);
        document.getElementById('name').addEventListener('focus', validateID);
        document.getElementById('birthday').addEventListener('focus', validateName);
        document.getElementById('gender').addEventListener('focus', validateBirthday);
        document.getElementById('species').addEventListener('focus', validateGender);
        document.getElementById('breed').addEventListener('focus', validateSpecies);
        document.getElementById('breed').addEventListener('input', validateBreed);

        function validateAddForm() {
            var isValid = true;

            isValid = validateID() && isValid;
            isValid = validateName() && isValid;
            isValid = validateBirthday() && isValid;
            isValid = validateGender() && isValid;
            isValid = validateSpecies() && isValid;
            isValid = validateBreed() && isValid;


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

        document.getElementById("add-pet-form").addEventListener('submit', function(event) {

            if (!validateAddForm()) {
                event.preventDefault();
            } else {
                addModal.style.display = "none";
            }
        });

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