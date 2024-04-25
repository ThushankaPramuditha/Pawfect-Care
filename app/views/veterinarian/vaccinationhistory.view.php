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
    <div class="panel-header"style="display:flex; justify-content:flex-end">
            <!--button class="add-new-button">Add New</button-->
            <div class="search-bar">
                    <input type="text" id="search" placeholder="Search by vaccination...">
                    <button class="search-button">Search</button>
                </div>
            
    </header>
        </div>
        <?php include '../app/views/components/tables/vaccinationhistorytable.php'; ?>

    </div>
</div>
</body>
</html>

        
<!-- Add vaccination Modal ->

<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Add Vaccination</h1>
        <div class="form-container">
            <form id="add-vaccination-form" action="<?php echo ROOT ?>/Veterinarian/VaccinationHistory/add" method="post">
                <div class="column">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" ><br>

                    <label for="patient no">Patient No:</label>
                    <input type="text" id="patient_no" name="patient_no" ><br>
                    <div id="error-patient_no" class="error-message"></div>

                    <label for="vaccine name">Vaccine Name:</label>
                    <input type="text" id="vaccine_name" name="vaccine_name" ><br>
                    <div id="error-vaccine_name" class="error-message"></div>

                    <label for="serial no">Serial No:</label>
                    <input type="text" id="serial_no" name="serial_no" ><br>
                    <div id="error-serial_no" class="error-message"></div>
                </div>
                <div class="column">

                    <label for="administered by">Administered By:</label>
                    <input type="text" id="administered_by" name="vet_name" ><br>
                    <div id="error-administered_by" class="error-message"></div>

                    <label for="due date">Next Due Date:</label>
                    <input type="date" id="due_date" name="due_date" ><br>
                    <div id="error-due_date" class="error-message"></div>

                    <label for="remarks">Remarks:</label>
                    <textarea id="remarks" name="remarks" rows="4" style="border-radius: 10px;" ></textarea><br>

                </div>
                <div class="flex-container">
                    <button type="submit" id="add-vaccination-button">Add Vaccination</button>
                </div>
            </form>
        </div>
    </div>
</div-->

<!-- Update vaccinationhistory Modal >
<div class="modal-form" id="update-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Update Vaccination History</h1>
        <div id="updatevaccinationhistory" class="form-container">

        </div>
    </div>
</div-->

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
    
</script>
</body>

</html>