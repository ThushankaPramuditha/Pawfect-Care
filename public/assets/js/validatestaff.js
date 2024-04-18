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

function validateAddress() {
    var address = document.getElementById('address').value;
    if (!address) {
        document.getElementById('error-address').textContent = "* Address is required.";
        return false;
    } else {
        document.getElementById('error-address').textContent = "";
        return true;
    }
}

function validateContactNumber() {
    var contact = document.getElementById('contact_no').value;
    if (!contact.match(/^[0-9]{10}$/)) {
        document.getElementById('error-contact').textContent = "* Contact number must be 10 digits.";
        return false;
    } else {
        document.getElementById('error-contact').textContent = "";
        return true;
    }
}

function validateNIC() {
    var nic = document.getElementById('nic').value;
    if (!nic.match(/^[0-9]{9}[vVxX]$|^([0-9]{12})$/)) {
        document.getElementById('error-nic').textContent = "* NIC format is not valid.";
        return false;
    } else {
        document.getElementById('error-nic').textContent = "";
        return true;
    }
}

function validateEmail() {
    var email = document.getElementById('email').value;
    if (!email.match(/^\S+@\S+\.\S+$/)) {
        document.getElementById('error-email').textContent = "* Email format is not valid.";
        return false;
    } else {
        document.getElementById('error-email').textContent = "";
        return true;
    }
}

function validateQualifications() {
    var qualifications = document.getElementById('qualifications').value;
    if (!qualifications) {
        document.getElementById('error-qualifications').textContent = "* Qualifications are required.";
        return false;
    } else {
        document.getElementById('error-qualifications').textContent = "";
        return true;
    }
}

function validateLicense() {
    var license = document.getElementById('license').value;
    if (!license) {
        document.getElementById('error-license').textContent = "* License Number is required.";
        return false;
    } else {
        document.getElementById('error-license').textContent = "";
        return true;
    }
}

function validatePassword() {
    var password = document.getElementById('password').value;
    if (!password.match(/^(?=.*[\W]).{6,}$/)) {
        document.getElementById('error-password').textContent = "* Password must be at least 6 characters long and contain at least one symbol.";
        return false;
    } else {
        document.getElementById('error-password').textContent = "";
        return true;
    }
}

function validateConfirmPassword() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    if (password !== confirmPassword) {
        document.getElementById('error-confirm-password').textContent = "* Passwords do not match.";
        return false;
    } else {
        document.getElementById('error-confirm-password').textContent = "";
        return true;
    }
}

//validations for change password

function validatePrevPassword() {
    var password = document.getElementById('prev-password').value;
    if (!password.match(/^(?=.*[\W]).{6,}$/)) {
        document.getElementById('error-prev-password').textContent = "* Password must be at least 6 characters long and contain at least one symbol.";
        return false;
    } else {
        document.getElementById('error-prev-password').textContent = "";
        return true;
    }
}
function validateNewPassword() {
    var password = document.getElementById('new-password').value;
    if (!password.match(/^(?=.*[\W]).{6,}$/)) {
        document.getElementById('error-new-password').textContent = "* Password must be at least 6 characters long and contain at least one symbol.";
        return false;
    } else {
        document.getElementById('error-new-password').textContent = "";
        return true;
    }
}

function validateConfirmNewPassword() {
    var newpassword = document.getElementById('new-password').value;
    var confirmPassword = document.getElementById('confirm-password').value;
    if (newpassword !== confirmPassword) {
        document.getElementById('error-confirm-password').textContent = "* Passwords do not match.";
        return false;
    } else {
        document.getElementById('error-confirm-password').textContent = "";
        return true;
    }
}


//validate update form

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

function validateUpdateAddress() {
    var address = document.getElementById('update-address').value;
    if (!address) {
        document.getElementById('error-update-address').textContent = "* Address is required.";
        return false;
    } else {
        document.getElementById('error-update-address').textContent = "";
        return true;
    }
}

function validateUpdateContactNumber() {
    var contact = document.getElementById('update-contact_no').value;
    if (!contact.match(/^[0-9]{10}$/)) {
        document.getElementById('error-update-contact').textContent = "* Contact number must be 10 digits.";
        return false;
    } else {
        document.getElementById('error-update-contact').textContent = "";
        return true;
    }
}

function validateUpdateQualifications() {
    var qualifications = document.getElementById('update-qualifications').value;
    if(!qualifications) {
        document.getElementById('error-update-qualifications').textContent = "* Qualifications are required.";
        return false;
    } else {
        document.getElementById('error-update-qualifications').textContent = "";
        return true;
    }
}

function validateUpdateLicense() {
    var license = document.getElementById('update-license').value;
    if (!license) {
        document.getElementById('error-update-license').textContent = "* License Number is required.";
        return false;
    } else {
        document.getElementById('error-update-license').textContent = "";
        return true;
    }
}