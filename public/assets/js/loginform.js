document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('log-in-form');
    const loginButton = document.getElementById('log-in-button');

    loginButton.addEventListener('click', function () {
        // Add your code here to handle form submission 
        alert('Logged in successfully!');
        loginButton.disabled = true; // Disable the button after login
        
        // Clear the input fields
        const emailInput = document.getElementById('email'); // Corrected the input IDs
        const passwordInput = document.getElementById('password'); // Corrected the input IDs

        emailInput.value = '';
        passwordInput.value = '';
    });
});

