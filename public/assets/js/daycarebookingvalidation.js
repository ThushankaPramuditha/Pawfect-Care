function validateDropOffDate() {
    var date = document.getElementById('drop-off-date').value;
    var today = new Date();
    var inputDate = new Date(date);
    
    if (!date) {
        document.getElementById('error-drop-off-date').textContent = "* Drop-off date is required.";
        return false;
    } else if (inputDate < today) {
        document.getElementById('error-drop-off-date').textContent = "* Drop-off date cannot be in the past.";
        return false;
    } else {
        document.getElementById('error-drop-off-date').textContent = "";
        return true;
    }
}

function validateDropOffTime() {
    var date = document.getElementById('drop-off-date').value;
    var time = document.getElementById('drop-off-time').value;
    var currentTime = new Date();
    var selectedTime = new Date(date + 'T' + time);
    
    if (!time) {
        document.getElementById('error-drop-off-time').textContent = "* Drop-off time is required.";
        return false;
    } else if (selectedTime < currentTime) {
        document.getElementById('error-drop-off-time').textContent = "* Drop-off time cannot be in the past.";
        return false;
    } else {
        document.getElementById('error-drop-off-time').textContent = "";
        return true;
    }
}

function validatePickUpTime() {
    var dropOffDate = document.getElementById('drop-off-date').value;
    var dropOffTime = document.getElementById('drop-off-time').value;
    var pickUpTime = document.getElementById('pick-up-time').value;
    var dropOff = new Date(dropOffDate + 'T' + dropOffTime);
    var pickUp = new Date(dropOffDate + 'T' + pickUpTime);

    if (!pickUpTime) {
        document.getElementById('error-pick-up-time').textContent = "* Pick-up time is required.";
        return false;
    } else if (pickUp <= dropOff) {
        document.getElementById('error-pick-up-time').textContent = "* Pick-up time must be later than drop-off time.";
        return false;
    } else {
        document.getElementById('error-pick-up-time').textContent = "";
        return true;
    }
}



function validateListOfItems() {
    var items = document.getElementById('list-of-items').value;
    if (items.length > 255) { // Assuming a maximum length for items
        document.getElementById('error-list-of-items').textContent = "* List of items must be under 255 characters.";
        return false;
    } else {
        document.getElementById('error-list-of-items').textContent = "";
        return true;
    }
}

function validateAllergies() {
    var allergies = document.getElementById('allergies').value;
    if (allergies.length > 255) {
        document.getElementById('error-allergies').textContent = "* Allergy details must be under 255 characters.";
        return false;
    } else {
        document.getElementById('error-allergies').textContent = "";
        return true;
    }
}

function validatePetBehaviour() {
    var behaviour = document.getElementById('pet-behaviour').value;
    if (behaviour.length > 255) {
        document.getElementById('error-pet-behaviour').textContent = "* Behaviour details must be under 255 characters.";
        return false;
    } else {
        document.getElementById('error-pet-behaviour').textContent = "";
        return true;
    }
}

function validateMedications() {
    var medications = document.getElementById('medications').value;
    if (medications.length > 255) {
        document.getElementById('error-medications').textContent = "* Medication details must be under 255 characters.";
        return false;
    } else {
        document.getElementById('error-medications').textContent = "";
        return true;
    }
}


