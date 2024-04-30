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

function validateWeight() {
    var Weight = document.getElementById('weight').value;
    if (!Weight) {
        document.getElementById('error-weight').textContent = "* Weight is required.";
        return false;
    } else {
        document.getElementById('error-weight').textContent = "";
        return true;
    }
}

function validateTemperature() {
    var Temperature = document.getElementById('temperature').value;
    if (!Temperature) {
        document.getElementById('error-temperature').textContent = "* Temperature is required.";
        return false;
    } else {
        document.getElementById('error-temperature').textContent = "";
        return true;
    }
}

function validateMedCondition() {
    var MedCondition = document.getElementById('med_condition').value;
    if (!MedCondition) {
        document.getElementById('error-med_condition').textContent = "* Medical Condition is required.";
        return false;
    } else {
        document.getElementById('error-med_condition').textContent = "";
        return true;
    }
}

function validateTreatment() {
    var Treatment = document.getElementById('treatment').value;
    if (!Treatment) {
        document.getElementById('error-treatment').textContent = "* Treatment is required.";
        return false;
    } else {
        document.getElementById('error-treatment').textContent = "";
        return true;
    }
    
}

function validatePrescription() {
    var Prescription = document.getElementById('prescription').value;
    if (!Prescription) {
        document.getElementById('error-prescription').textContent = "* Prescription is required.";
        return false;
    } else {
        document.getElementById('error-prescription').textContent = "";
        return true;
    }
}


//validate update form

function validateUpdateWeight() {
    var weight = document.getElementById('update-weight').value;
    if (!weight) {
        document.getElementById('error-update-weight').textContent = "* Weight is required.";
        return false;
    } else {
        document.getElementById('error-update-weight').textContent = "";
        return true;
    }
    
}

function validateUpdateTemperature() {
    var Temperature = document.getElementById('update-temperature').value;
    if (!Temperature) {
        document.getElementById('error-update-temperature').textContent = "* Temperature is required.";
        return false;
    } else {
        document.getElementById('error-update-temperature').textContent = "";
        return true;
    }
}

/*function validateUpdateMedCondition() {
    var MedCondition = document.getElementById('update-med_condition').value;
    if (!MedCondition) {
        document.getElementById('error-update-med_condition').textContent = "* Medical Condition is required.";
        return false;
    } else {
        document.getElementById('error-update-med_condition').textContent = "";
        return true;
    }
}

function validateUpdateTreatment() {
    var Treatment = document.getElementById('update-treatment').value;
    if (!Treatment) {
        document.getElementById('error-update-treatment').textContent = "* Treatment is required.";
        return false;
    } else {
        document.getElementById('error-update-treatment').textContent = "";
        return true;
    }
    
}

function validateUpdatePrescription() {
    var prescription = document.getElementById('update-prescription').value;
    if (!prescription) {
        document.getElementById('error-update-prescription').textContent = "* Prescription is required.";
        return false;
    } else {
        document.getElementById('error-update-prescription').textContent = "";
        return true;
    }
    
}*/






 //if (!contact.match(/^[0-9]{10}$/))   "* Contact number must be 10 digits."
 //(!nic.match(/^[0-9]{9}[vVxX]$|^([0-9]{12})$/))    "* NIC format is not valid."
 //(!email.match(/^\S+@\S+\.\S+$/))   "* Email format is not valid."
 //(!password.match(/^(?=.*[\W]).{6,}$/))    "* Password must be at least 6 characters long and contain at least one symbol."
