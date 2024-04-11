function validatePatientNo() {
    var patientNo = document.getElementById('patient_no').value;
    if (!patientNo) {
        document.getElementById('error-patient_no').textContent = "* Patient No is required.";
        return false;
    } else {
        document.getElementById('error-patient_no').textContent = "";
        return true;
    }
}

function validateVaccineName() {
    var vaccineName = document.getElementById('vaccine_name').value;
    if (!vaccineName) {
        document.getElementById('error-vaccine_name').textContent = "* Vaccine Name is required.";
        return false;
    } else {
        document.getElementById('error-vaccine_name').textContent = "";
        return true;
    }
}

function validateSerialNo() {
    var serialNo = document.getElementById('serial_no').value;
    if (!serialNo) {
        document.getElementById('error-serial_no').textContent = "* Serial No is required.";
        return false;
    } else {
        document.getElementById('error-serial_no').textContent = "";
        return true;
    }
}
function validateAdministeredBy() {
    var administeredBy = document.getElementById('administered_by').value;
    if (!administeredBy) {
        document.getElementById('error-administered_by').textContent = "* Administered By is required.";
        return false;
    } else {
        document.getElementById('error-administered_by').textContent = "";
        return true;
    }

}

function validateDueDate() {
    var DueDate = document.getElementById('due_date').value;
    if (!DueDate) {
        document.getElementById('error-due_date').textContent = "* Next Due Date is required.";
        return false;
    } else {
        document.getElementById('error-due_date').textContent = "";
        return true;
    }
    
}

//validate update form

function validateUpdateVaccineName() {
    var vaccineName = document.getElementById('update-vaccine_name').value;
    if (!vaccineName) {
        document.getElementById('error-update-vaccine_name').textContent = "* Vaccine is required.";
        return false;
    } else {
        document.getElementById('error-update-vaccine_name').textContent = "";
        return true;
    }
}

function validateUpdateSerialNo() {
    var serialNo = document.getElementById('update-serial_no').value;
    if (!serialNo) {
        document.getElementById('error-update-serial_no').textContent = "* Serial No is required.";
        return false;
    } else {
        document.getElementById('error-update-serial_no').textContent = "";
        return true;
    }
}
/*function validateUpdateAdministeredBy() {
    var administeredBy = document.getElementById('update-administered_by').value;
    if (!administeredBy) {
        document.getElementById('error-update-administered_by').textContent = "* Administered By is required.";
        return false;
    } else {
        document.getElementById('error-update-administered_by').textContent = "";
        return true;
    }

}*/

function validateUpdateDueDate() {
    var DueDate = document.getElementById('update-due_date').value;
    if (!DueDate) {
        document.getElementById('error-update-due_date').textContent = "* Next Due Date is required.";
        return false;
    } else {
        document.getElementById('error-update-due_date').textContent = "";
        return true;
    }
    
}

/**function validateUpdateRemarks() {
    var remarks = document.getElementById('update-remarks').value;
    if (!remarks) {
        document.getElementById('error-update-remarks').textContent = "* Remarks is required.";
        return false;
    } else {
        document.getElementById('error-update-remarks').textContent = "";
        return true;
    }
    
}**/

 //if (!contact.match(/^[0-9]{10}$/))   "* Contact number must be 10 digits."
 //(!nic.match(/^[0-9]{9}[vVxX]$|^([0-9]{12})$/))    "* NIC format is not valid."
 //(!email.match(/^\S+@\S+\.\S+$/))   "* Email format is not valid."
 //(!password.match(/^(?=.*[\W]).{6,}$/))    "* Password must be at least 6 characters long and contain at least one symbol."
