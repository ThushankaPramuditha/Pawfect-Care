document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('vet-profile-form');
    const updateButton = document.getElementById('update-button');

    updateButton.addEventListener('click', function () {
        // Add your code here to handle form submission and update the profile
        alert('Profile updated!');
        updateButton.disabled = true; // Disable the button after saving
        
        // Clear the input fields
        const fullNameInput = document.getElementById('full-name');
        const addressInput = document.getElementById('address');
        const contactNumberInput = document.getElementById('contact-number');

        fullNameInput.value = '';
        addressInput.value = '';
        contactNumberInput.value = '';
    });
});

