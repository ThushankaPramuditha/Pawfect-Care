// Validation for add form
function validateID() {
    var id = document.getElementById('petowner_id').value;
    if (!id) {
        document.getElementById('error-id').textContent = "* Pet owner ID is required.";
        return false;
    } else {
        document.getElementById('error-id').textContent = "";
        return true;
    }
}

function validateName() {
    var name = document.getElementById('name').value;
    if (!name) {
        document.getElementById('error-name').textContent = "* Name is required.";
        return false;
    } else {
        document.getElementById('error-name').textContent = "";
        return true;
    }
}

function validateBirthday() {
    var birthday = document.getElementById('birthday').value;
    if (!birthday) {
        document.getElementById('error-birthday').textContent = "* Birthday is required.";
        return false;
    } else {
        document.getElementById('error-birthday').textContent = "";
        return true;
    }
}

function validateGender() {
    var gender = document.getElementById('gender').value;
    if (!gender) {
        document.getElementById('error-gender').textContent = "* Gender selection is required.";
        return false;
    } else {
        document.getElementById('error-gender').textContent = "";
        return true;
    }
}

function validateSpecies() {
    var species = document.getElementById('species').value;
    if (!species) {
        document.getElementById('error-species').textContent = "* Species is required.";
        return false;
    } else {
        document.getElementById('error-species').textContent = "";
        return true;
    }
}

function validateBreed() {
    var breed = document.getElementById('breed').value;
    if (!breed) {
        document.getElementById('error-breed').textContent = "* Breed is required.";
        return false;
    } else {
        document.getElementById('error-breed').textContent = "";
        return true;
    }
}

// Functions for update form validations
function validateUpdateName() {
    var name = document.getElementById('update-name').value;
    if (!name) {
        document.getElementById('error-update-name').textContent = "* Name is required.";
        return false;
    } else {
        document.getElementById('error-update-name').textContent = "";
        return true;
    }
}

function validateUpdateBirthday() {
    var birthday = document.getElementById('update-birthday').value;
    if (!birthday) {
        document.getElementById('error-update-birthday').textContent = "* Birthday is required.";
        return false;
    } else {
        document.getElementById('error-update-birthday').textContent = "";
        return true;
    }
}

function validateUpdateGender() {
    var gender = document.getElementById('update-gender').value;
    if (!gender) {
        document.getElementById('error-update-gender').textContent = "* Gender selection is required.";
        return false;
    } else {
        document.getElementById('error-update-gender').textContent = "";
        return true;
    }
}

function validateUpdateSpecies() {
    var species = document.getElementById('update-species').value;
    if (!species) {
        document.getElementById('error-update-species').textContent = "* Species is required.";
        return false;
    } else {
        document.getElementById('error-update-species').textContent = "";
        return true;
    }
}

function validateUpdateBreed() {
    var breed = document.getElementById('update-breed').value;
    if (!breed) {
        document.getElementById('error-update-breed').textContent = "* Breed is required.";
        return false;
    } else {
        document.getElementById('error-update-breed').textContent = "";
        return true;
    }
}
