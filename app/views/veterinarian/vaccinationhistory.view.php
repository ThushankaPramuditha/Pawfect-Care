<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <title>Vaccination History</title>
</head>


<script src="<?php echo ROOT ?>/assets/js/validatehistory.js"></script>

<body onload="setInitialDate()">
<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/veterinariansidebar.php'; ?>  
    <div style = "margin-left: 230px; margin-top:130px">
    <div class="panel-header">
            <button class="add-new-button">Add New</button>
            <div class="search-bar">
                    <input type="text" id="search" placeholder="Search by vaccination...">
                    <button class="search-button">Search</button>
                </div>
            
    </header>
        </div>
        <?php include '../app/views/components/tables/vaccinationhistoryupdatetable.php'; ?>

    </div>
</div>
</body>
</html>

        
<!-- Add vaccination Modal -->

<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Add Vaccination</h1>
        <div class="form-container">
            <form id="add-vaccination-form" action="<?php echo ROOT ?>/Veterinarian/VaccinationHistory/add" method="post">
                <div class="column">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required><br>

                    <label for="patient no">Patient No:</label>
                    <input type="text" id="patient_no" name="patient_no" required><br>
                    <div id="error-patient_no" class="error-message"></div>

                    <label for="vaccine name">Vaccine Name:</label>
                    <input type="text" id="vaccine_name" name="vaccine_name" required><br>
                    <div id="error-vaccine_name" class="error-message"></div>

                    <label for="serial no">Serial No:</label>
                    <input type="text" id="serial_no" name="serial_no" required><br>
                    <div id="error-serial_no" class="error-message"></div>
                </div>
                <div class="column">

                    <label for="administered by">Administered By:</label>
                    <input type="text" id="administered_by" name="vet_name" required><br>
                    <div id="error-administered_by" class="error-message"></div>

                    <label for="due date">Next Due Date:</label>
                    <input type="date" id="due_date" name="due_date" required><br>
                    <div id="error-due_date" class="error-message"></div>

                    <label for="remarks">Remarks:</label>
                    <textarea id="remarks" name="remarks" rows="4" style="border-radius: 10px;" required></textarea><br>

                </div>
                <div class="flex-container">
                    <button type="submit" id="add-vaccination-button">Add Vaccination</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update vaccinationhistory Modal -->
<div class="modal-form" id="update-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Update Vaccination History</h1>
        <div id="updatevaccinationhistory" class="form-container">

        </div>
    </div>
</div>

<!-- Delete vaccinationhistory Modal 
    <div class="modal-form" id="delete-modal">
        <div class="modal-content-delete">
            <h1>Delete vaccinatioon History</h1>
            <p>Are you sure you want to delete?</p>
            <div class="flex-container">
                <button class="reject">No</button>
                <a id="delete-vaccinationhistory" href=""><button class="delete-button">Delete</button></a>
            </div>
            
        </div>
    </div>-->


<script>
    // Get the modal elements
    var addModal = document.getElementById("add-modal");
    var updateModal = document.getElementById("update-modal");
    //var deleteModal = document.getElementById("delete-modal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Function to open add form modal
    function openAddModal() {
        addModal.style.display = "block";
    }

    function openUpdateModal(id) {
        console.log(id);
        updateModal.style.display = "block";
        $.get(`<?php echo ROOT ?>/Veterinarian/VaccinationHistory/viewVaccinationHistory/${id}`, function(data) {
            // Update the modal content with the fetched data
            $("#updatevaccinationhistory").html(data);
        });
        // set time out and updateforminit
        setTimeout(updateFormInit, 1000);

        span.onclick = function() {
            modal.style.display = "none";
        }

    }

    function setInitialDate() {
        // Get the current date in the format YYYY-MM-DD
        var currentDate = new Date().toISOString().split('T')[0];

        // Set the value of the date input field
        document.getElementById('date').value = currentDate;
    }

    // Call setInitialDate() when the form is loaded
    window.addEventListener('DOMContentLoaded', setInitialDate);

    // Event listener for add button click
    document.querySelector('.add-new-button').addEventListener('click', function() {
        openAddModal();
    });

    // Event listeners for update buttons click
    document.querySelectorAll('.edit-icon').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.parentElement.parentElement.getAttribute('key');
            openUpdateModal(id);
        });
    });

    // Event listeners for delete buttons click
    /**document.querySelectorAll('.delete-icon').forEach(function (button) {
        button.addEventListener('click', function () {
            var id = this.parentElement.parentElement.getAttribute('key');
            console.log(id)
            openDeleteModal(id);
        });
    });**/

    // Close modals when the close button is clicked
    var closeButtons = document.querySelectorAll('.close');

    // Close modals when the no button is clicked
    /**var noButtons = document.querySelectorAll('.reject');**/

    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            addModal.style.display = "none";
            updateModal.style.display = "none";

        });
    });
    /*noButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            deleteModal.style.display = "none";

        });
    });***/

    // Attach event listeners for validation on input for add form

    document.getElementById('patient_no').addEventListener('input', validatePatientNo);
    document.getElementById('vaccine_name').addEventListener('focus', validatePatientNo);
    document.getElementById('serial_no').addEventListener('focus', validateVaccineName);
    document.getElementById('administered_by').addEventListener('focus', validateSerialNo);
    document.getElementById('due_date').addEventListener('focus', validateAdministeredBy);
    document.getElementById('due_date').addEventListener('input', validateDueDate);

    function validateAddForm() {
        var isValid = true;

        isValid = validatePatientNo() && isValid;
        isValid = validateVaccineName() && isValid;
        isValid = validateSerialNo() && isValid;
        isValid = validateAdministeredBy() && isValid;
        isValid = validateDueDate() && isValid;


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
    document.getElementById("add-vaccination-form").addEventListener('submit', function(event) {

        if (!validateAddForm()) {
            event.preventDefault();
        } else {
            addModal.style.display = "none";
        }
    });

    function updateFormInit() {

        document.getElementById('update-vaccine_name').addEventListener('input', validateUpdateVaccineName);
        document.getElementById('update-serial_no').addEventListener('input', validateUpdateSerialNo);
        //document.getElementById('update-administered_by').addEventListener('input', validateUpdateAdministeredBy);
        document.getElementById('update-due_date').addEventListener('input', validateUpdateDueDate);
        //document.getElementById('update-remarks').addEventListener('input', validateUpdateRemarks);

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

        isValid = validateUpdateVaccineName() && isValid;
        isValid = validateUpdateSerialNo() && isValid;
        //isValid = validateUpdateAdministeredBy() && isValid;
        isValid = validateUpdateDueDate() && isValid;
        //isValid = validateUpdateRemarks() && isValid;

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
</script>
</body>

</html>