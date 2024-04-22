<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
</head>


<body>

    <?php include '../app/views/components/dashboard-compo/medicalstaffsidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withoutbutton.php'; ?> 
        <?php include '../app/views/components/tables/petdetailsmoreupdatetable.php'; ?> 
    </div>

</body>
</html>

<!--Add  Modal--> 

<!--Update petdetails Modal 
    <div class="modal-form" id="update-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Pet Details</h1>
                <div id="updatepetdetails" class="form-container">
                    
                </div>
        </div>
    </div>

    Delete petdetails Modal 
    <div class="modal-form" id="delete-modal">
        <div class="modal-content-delete">
            <h1>Delete Pet Details</h1>
            <p>Are you sure you want to delete?</p>
            <div class="flex-container">
                <button class="reject">No</button>
                <a id="delete-Petdetails" href=""><button class="delete-button">Delete</button></a>
            </div>
            
        </div>
    </div>-->


<script>

    // Get the modal elements
    //var addModal = document.getElementById("add-modal");
    //var updateModal = document.getElementById("update-modal");
    //var deleteModal = document.getElementById("delete-modal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    function getMedicalHistory(petId) {
        window.location.href = "<?php echo ROOT ?>/medicalstaff/medicalhistory/" + petId;
    }


    function getVaccinationHistory(petId) {
        window.location.href = "<?php echo ROOT ?>/medicalstaff/vaccinationhistory/" + petId;
    }

    
    /*function openUpdateModal(id) {
        console.log(id);
        updateModal.style.display = "block";
        $.get(`<!?php echo ROOT ?>/Medicalstaff/Petdetails/viewPetdetails/${id}`, function(data) {
            // Update the modal content with the fetched data
            $("#updatepetdetails").html(data);
        });
        // set time out and updateforminit
        setTimeout(updateFormInit, 1000);

        span.onclick = function() {
            modal.style.display = "none";
        }

    }*/

    // Event listener for add button click
    /*document.querySelector('.add-new-button').addEventListener('click', function() {
        openAddModal();
    });*/

    // Event listeners for update buttons click
    /*document.querySelectorAll('.edit-icon').forEach(function(button) {
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
    //var closeButtons = document.querySelectorAll('.close');

    // Close modals when the no button is clicked
    /**var noButtons = document.querySelectorAll('.reject');**/

    /*closeButtons.forEach(function(button) {
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

    
    
</script>
</body>
</html> 