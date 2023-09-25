document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('change-password-form');
    const changePasswordButton = document.getElementById('change-password-button');

    changePasswordButton.addEventListener('click', function () {
        // Add your code here to handle password change and validation
        alert('Password changed successfully!');
        changePasswordButton.disabled = true; // Disable the button after changing password
        
        // Clear the input fields
        const prevPasswordInput = document.getElementById('prev-password');
        const newPasswordInput = document.getElementById('new-password');
        const confirmPasswordInput = document.getElementById('confirm-password');

        prevPasswordInput.value = '';
        newPasswordInput.value = '';
        confirmPasswordInput.value = '';
    });
});

