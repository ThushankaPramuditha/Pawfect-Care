// Validate the sign up form.
function validateSignUpForm() {
    // Get the form data.
    const fullName = document.querySelector('#full_name').value;
    const address = document.querySelector('#address').value;
    const contactNumber = document.querySelector('#contact_number').value;
    const nic = document.querySelector('#nic').value;
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;
    const confirmPassword = document.querySelector('#confirm_password').value;

    // Validate the full name.
    if (fullName === '') {
        alert('Full name is required.');
        return false;
    }

    // Validate the address.
    if (address === '') {
        alert('Address is required.');
        return false;
    }

    // Validate the contact number.
    if (contactNumber === '' || contactNumber.length !== 10 || isNaN(contactNumber)) {
        alert('Contact number is required and must be a 10-digit number.');
        return false;
    }

    // Validate the NIC.
    if (nic === '') {
        alert('NIC is required.');
        return false;
    }

    // Validate the email.
    if (email === '' || !email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.\w{2,3}$/)) {
        alert('Valid email is required.');
        return false;
    }

    // Validate the password.
    if (password === '') {
        alert('Password is required.');
        return false;
    }

    // Validate the confirm password.
    if (confirmPassword === '') {
        alert('Confirm password is required.');
        return false;
    }

    // Check if the password and confirm password match.
    if (password !== confirmPassword) {
        alert('Password and confirm password must match.');
        return false;
    }

    // If all of the validation checks pass, then return true.
    return true;
}

// Submit the sign up form when the user clicks the "Sign up" button.
document.querySelector('#signup').addEventListener('click', function(event) {
    // Prevent the default form submission.
    event.preventDefault();

    // Validate the form.
    if (!validateSignUpForm()) {
        return;
    }

    // Submit the form.
    document.querySelector('form').submit();
});