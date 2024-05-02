<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History</title>
    <style>
    /* Adjust font size for prescription names */
    #prescriptions label {
        font-size: 14px;
        /* Adjust the font size as needed */
    }

    /* Additional styling for checkboxes and labels */
    #prescriptions input[type="checkbox"] {
        display: inline-block;
        margin-right: 5px;
        /* Adjust spacing between checkbox and label */
    }

    #prescriptions label {
        display: inline-block;
        vertical-align: middle;
        /* Align label vertically with checkbox */
    }
    </style>
</head>

<script src="<?php echo ROOT?>/assets/js/validatemedicalhistory.js"></script>
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

<?php $activePage = 'petdetails';?>

<!--body onload="setInitialDate()"-->

<body>


    <!--?php $_SESSION['addnewpath'] = 'addtreatment' ?-->
    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
    <div style="margin-top: 80px; ">
        <?php include '../app/views/components/dashboard-compo/medicalstaffsidebar.php'; ?>
        <div style="margin-left: 230px; margin-top:130px">
            <div class="panel-header">
                <button class="add-new-button">Add New</button>

               
            <?php if (!empty($medicalhistory)): ?>
            <?php $petId = $medicalhistory[0]->pet_id; ?>
            <script>var petId = <?= json_encode($petId); ?>;</script>

            <?php endif; ?>

                <div class="search-bar">
                    <input type="text" id="search" placeholder="Search by medical condition or veterinarian name...">
                    <button class="search-button">Search</button>
                </div>

                </header>
            </div>
            <?php include '../app/views/components/tables/medicalhistoryupdatetable.php'; ?>
        </div>
    </div>

</body>

</html>

<!--Add treatment model-->

<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Add Treatment</h1>
        <div class="form-container">
            <form id="add-treatment-form" action="<?php echo ROOT?>/Medicalstaff/MedicalHistory/add" method="post">
                <div class="column">
                    <!--input type="hidden" name="pet_id" value="<!?php echo htmlspecialchars($medicalhistory->pet_id); ?>"-->
                    <!--label for="date">Date:</label>
                            <input type="date" id="date" name="date" required><br-->

                    <label for="patient no">Patient No:</label>
                    <!--input type="text" class="disabled-field" id="patient_no" name="patient_no" value="<!?php echo htmlspecialchars($data['appointments']); ?>"readonly><br-->
                    <input type="text" id="patient_no" name="patient_no">
                    <div id="error-patient_no" class="error-message"></div>

                    <label for="weight">Weight:</label>
                    <input type="text" id="weight" name="weight"><br>
                    <div id="error-weight" class="error-message"></div>

                    <label for="temperature">Temperature:</label>
                    <input type="text" id="temperature" name="temperature"><br>
                    <div id="error-temperature" class="error-message"></div>

                    <label for="medical condition">Medical Condition:</label>
                    <textarea id="med_condition" name="med_condition" rows="4"
                        style="border-radius: 10px;"></textarea><br>
                    <div id="error-med_condition" class="error-message"></div>

                </div>
                <div class="column">
                    <label for="treatment">Treatment:</label>
                    <textarea id="treatment" name="treatment" rows="4" style="border-radius: 10px;"></textarea><br>
                    <div id="error-treatment" class="error-message"></div>

                    <label for="prescriptions">Prescriptions:</label>
                    <div id="prescriptions">
                        <?php foreach ($prescriptions as $prescription): ?>
                        <div class="prescription-checkbox">
                            <input type="checkbox" id="prescription_<?= htmlspecialchars($prescription->id) ?>"
                                name="prescriptions[]" value="<?= htmlspecialchars($prescription->id) ?>">
                            <label for="prescription_<?= htmlspecialchars($prescription->id) ?>">
                                <?= htmlspecialchars($prescription->name) ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                        <!--div class="prescription-checkbox">
                            <input type="checkbox" id="other_prescription" name="other_prescription">
                            <label for="other_prescription">Other Prescription</label>
                            <textarea id="other_prescription_input" name="other_prescription_input"
                                placeholder="Enter other prescription" style="display: none;"></textarea>
                        </div>
                    </div-->


                    <label for="remarks">Remarks:</label>
                    <textarea id="remarks" name="remarks" rows="4" style="border-radius: 10px;"></textarea><br>
                </div>

                <div class="flex-container">
                    <button type="submit" id="add-treatment-button">Add Treatment</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!--prescription Modal-->
<!--div class="modal-form" id="prescription-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Prescription</h1>
        <div id="addprescription" class="form-container">

            <!-select id="prescription" name="prescription" required>
                    <option value="">Select Prescription</option>
                    <!?php foreach ($prescriptions as $prescription): ?>
                        <option value="<?= htmlspecialchars($prescription->prescription) ?>"><?= htmlspecialchars($prescription->prescription) ?></option>
                        <script>var petId = <?= json_encode($petId); ?>;</script>
                    <!?php endforeach; ?>
                    <option value="new_prescription">+ New Prescription</option>
                    </select-->

<!--label for="prescriptions">Prescriptions:</label>
<div id="prescriptions">
    <?php foreach ($prescriptions as $prescription): ?>
    <div class="prescription-checkbox">
        <input type="checkbox" id="prescription_<?= htmlspecialchars($prescription->id) ?>" name="prescriptions[]"
            value="<?= htmlspecialchars($prescription->id) ?>">
        <label for="prescription_<?= htmlspecialchars($prescription->id) ?>">
            <?= htmlspecialchars($prescription->name) ?>
        </label>
    </div>
    <?php endforeach; ?>
    <div class="prescription-checkbox">
                    <input type="checkbox" id="other_prescription" name="other_prescription">
                    <label for="other_prescription">Other Prescription</label>
                    <textarea id="other_prescription_input" name="other_prescription_input"
                        placeholder="Enter other prescription" style="display: none;"></textarea>
                </div>
            </div-->


    <!-- Button to add new prescription input field -->
    <!--button id="add-new-prescription" name="add_new_prescription">+ Other</button><br-->


                       

    <!--button id="done">Done</button>

        </div>
    </div>
</div-->


    <!-- Update medicalhistory Modal -->
    <div class="modal-form" id="update-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Medical History</h1>
            <div id="updatemedicalhistory" class="form-container">

            </div>
        </div>
    </div>


    <!-- Delete medicalhistory Modal 
    <div class="modal-form" id="delete-modal">
        <div class="modal-content-delete">
            <h1>Delete Medical History</h1>
            <p>Are you sure you want to delete?</p>
            <div class="flex-container">
                <button class="reject">No</button>
                <a id="delete-meducalhistory" href=""><button class="delete-button">Delete</button></a>
            </div>
            
        </div>
    </div>-->

    <script>
  



            $(document).ready(function(){
                //$('.search-button').on('click', function(){ 
                $('#search').on('keyup', function(){
                    //var searchTerm = $('#search').val(); 
                    var searchTerm = $(this).val();
                    
                    console.log(petId)
                    $.ajax({
                        url: "<?php echo ROOT ?>/Medicalstaff/MedicalHistory/search",
                        type: "POST",
                        data: { search: searchTerm,petId:petId }, 
                        success: function(data) {
                            $('tbody').html(data);
                        }
                    
                    });
                });

                // to update when filtered by search
                $('body').on('click', '.edit-icon', function(){
                    var Id = $(this).closest('tr').attr('key');
                    openUpdateModal(Id,petId);
                });

    });


    // Get the modal elements
    var prescriptionModal = document.getElementById("prescription-modal");
    var addModal = document.getElementById("add-modal");
    var updateModal = document.getElementById("update-modal");
    //var deleteModal = document.getElementById("delete-modal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Function to open add form modal
    function openAddModal() {
        addModal.style.display = "block";
    }

    // Function to open prescription form modal
    function openPrescriptionModal() {
        prescriptionModal.style.display = "block";
    }

    function openUpdateModal(Id, petId) {
        console.log(Id);
        console.log(petId);

        updateModal.style.display = "block";

        // Fetch data and update the modal content
        $.get(`<?php echo ROOT?>/Medicalstaff/MedicalHistory/viewMedicalHistory/${Id}/${petId}`, function(data) {
            // Update the content with the fetched data
            $("#updatemedicalhistory").html(data);
        });

        setTimeout(updateFormInit, 1000);
        // to close the modal
        span.onclick = function() {
            updateModal.style.display = "none";
        }
    }

    /*document.getElementById('prescription').addEventListener('change', function() {
        if (this.value === 'new_prescription') {
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'prescription';
            input.placeholder = 'Enter new prescription';
            this.parentNode.replaceChild(input, this);
        }
    });*/


    /*function setInitialDate() {
        // format YYYY-MM-DD
        var currentDate = new Date().toISOString().split('T')[0];

        // Set the value of the date field
        document.getElementById('date').value = currentDate;
    }

    // Call setInitialDate() when the form is loaded
    window.addEventListener('DOMContentLoaded', setInitialDate);*/

    /*function setInitialDateTime()
    {
        var currentDateTime = new Date().toISOString().slice(0, 16); // Format: YYYY-MM-DDTHH:mm

        document.getElementById('date_time').value = currentDateTime;
    }

    window.addEventListener('DOMContentLoaded', setInitialDateTime);*/


    //Event listener for add button click
    document.querySelector('.add-new-button').addEventListener('click', function() {
        openAddModal();
    });

    //Event listener for prescription button click
    document.querySelector('.prescription-button').addEventListener('click', function() {
        openPrescriptionModal();
    });

    document.getElementById('other_prescription').addEventListener('change', function() {
        var otherPrescriptionInput = document.getElementById('other_prescription_input');
        if (this.checked) {
            otherPrescriptionInput.style.display = 'block';
        } else {
            otherPrescriptionInput.style.display = 'none';
        }
    });

    // Get the prescription form elements
    /*var prescriptionSelect = document.getElementById("prescription");
    var addNewPrescriptionButton = document.getElementById("add-new-prescription");
    var doneButton = document.getElementById("done");
    var printButton = document.getElementById("print");
    var prescriptionButton = document.getElementById("prescriptionButton");

    document.getElementById('prescription').addEventListener('change', function() {
        if (this.value === 'new_prescription') {
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'prescription';
            input.placeholder = 'Enter new prescription';
            this.parentNode.replaceChild(input, this);
        }
    });


    // Function to add new row in prescription form
    addNewPrescriptionButton.addEventListener("click", function() {
        var newInput = document.createElement("input");
        newInput.type = "text";
        newInput.name = "additional_prescription[]";
        newInput.placeholder = "New Prescription";
        prescriptionModal.querySelector(".form-container").appendChild(newInput);

        var formContainer = prescriptionModal.querySelector(".form-container");
        var doneButton = prescriptionModal.querySelector("#done");

        // Insert the new input element before the "Done" button
        formContainer.insertBefore(newInput, doneButton);

    });

    $(document).ready(function() {
        $("#done").click(function() {

            // Serialize prescription form data
            var prescriptionFormData = $("#prescription-form").serialize();



            // Send merged form data to the server using AJAX
            $.ajax({
                type: "POST",
                url: "<?php echo ROOT ?>/Medicalstaff/MedicalHistory/add",
                data: {
                    prescription_data: prescriptionFormData
                },
                success: function(response) {
                    // Handle successful form submission
                    console.log("Form submitted successfully!");
                    $("#prescription-modal").hide();
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error("Error occurred:", error);
                    // Display error message to the user
                }
            });
        });
    });

    // Function to handle printing
    printButton.addEventListener("click", function() {
        // Logic for printing
        // You can implement your printing logic here
    });*/

   

    /*document.getElementById('done').addEventListener('click', function () {
        // Serialize the prescription form data
        var prescriptionFormData = new FormData(document.getElementById('prescription-form'));
        var prescriptionSerializedData = new URLSearchParams(prescriptionFormData).toString();

        // Get the add treatment form data
        var addTreatmentFormData = new FormData(document.getElementById('add-treatment-form'));
        var addTreatmentSerializedData = new URLSearchParams(addTreatmentFormData).toString();

        // Combine the prescription form data with the add treatment form data
        var combinedSerializedData = addTreatmentSerializedData + '&' + prescriptionSerializedData;

        // Send the combined data to the server
        fetch('your-server-url', {
            method: 'POST',
            body: combinedSerializedData,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(response => {
        // Handle the response
        closePrescriptionModal(); // Call function to close the prescription modal
        })
        .catch(error => {
            // Handle errors
            console.error('Error:', error);
        });
    });





    // Event listeners for update buttons click
    document.querySelectorAll('.edit-icon').forEach(function(button) {
        button.addEventListener('click', function() {
            var Id = this.getAttribute('id');
            var petId = this.getAttribute('pet-id');
            openUpdateModal(Id, petId);
        });
    });

    function closePrescriptionModal() {
        prescriptionModal.style.display = "none";
    }*/

    // Close modals when the close button is clicked
    var closeButtons = document.querySelectorAll('.close');

    // Close modals when the no button is clicked
    /**var noButtons = document.querySelectorAll('.reject');**/

    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            prescriptionModal.style.display = "none";
            addModal.style.display = "none";
            updateModal.style.display = "none";

        });
    });

    /*// Get the "Done" button element
    var doneButton = document.getElementById('done');

    // Add event listener for "Done" button click
    doneButton.addEventListener('click', function() {
        // Close the prescription modal
        
        closePrescriptionModal();
    });*/

    /*noButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            deleteModal.style.display = "none";

        });
    });***/

    // Attach event listeners for validation on input for add form

    document.getElementById('patient_no').addEventListener('input', validatePatientNo);
    document.getElementById('weight').addEventListener('focus', validatePatientNo);
    document.getElementById('temperature').addEventListener('focus', validateWeight);
    document.getElementById('med_condition').addEventListener('focus', validateTemperature);
    document.getElementById('treatment').addEventListener('focus', validateMedCondition);
    //document.getElementById('prescription').addEventListener('focus', validateTreatment);
    document.getElementById('remarks').addEventListener('focus', validateTreatment);


    function validateAddForm() {
        var isValid = true;

        isValid = validatePatientNo() && isValid;
        isValid = validateWeight() && isValid;
        isValid = validateTemperature() && isValid;
        isValid = validateMedCondition() && isValid;
        isValid = validateTreatment() && isValid;
        //isValid = validatePrescription() && isValid;


        if (!isValid) {
            console.log("dvnbfb");
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: "Please correct the errors before submitting.",
            });
            return false;
        }
        return true;
    }
    document.getElementById("add-treatment-form").addEventListener('submit', function(event) {

        if (!validateAddForm()) {
            event.preventDefault();
        } else {
            addModal.style.display = "none";
        }
    });

    function updateFormInit() {

        document.getElementById('update-weight').addEventListener('input', validateUpdateWeight);
        document.getElementById('update-temperature').addEventListener('input', validateUpdateTemperature);
        //document.getElementById('update-med_condition').addEventListener('input', validateUpdateMedCondition);
        //document.getElementById('update-treatment').addEventListener('input', validateUpdateTreatment);
        //document.getElementById('update-prescription').addEventListener('input', validateUpdatePrescription);

        document.getElementById("updated-form").addEventListener('submit', function(event) {
            //console.log("insideee");
            if (!validateUpdateForm()) {
                event.preventDefault();
            } else {
                addModal.style.display = "none";
            }

        });
    }

    function validateUpdateForm() {
        var isValid = true;

        isValid = validateUpdateWeight() && isValid;
        isValid = validateUpdateTemperature() && isValid;
        //isValid = validateUpdateMedCondition() && isValid;
        //isValid = validateUpdateTreatment() && isValid;
        //isValid = validateUpdatePrescription() && isValid;

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