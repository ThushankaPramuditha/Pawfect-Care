document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('add-staff-form');
    const addButton = document.getElementById('add-button');

    addButton.addEventListener('click', function () {
        // Get the input values
        const fullNameInput = document.getElementById('full-name');
        const addressInput = document.getElementById('address');
        const contactNumberInput = document.getElementById('contact-number');
        const nicInput = document.getElementById('nic');
        const emailInput = document.getElementById('email');
        const qualificationsInput = document.getElementById('qualifications');

        const fullName = fullNameInput.value;
        const address = addressInput.value;
        const contactNumber = contactNumberInput.value;
        const nic = nicInput.value;
        const email = emailInput.value;
        const qualifications = qualificationsInput.value;

        // Perform validation if needed
        if (!fullName || !address || !contactNumber || !nic || !email || !qualifications) {
            alert('Please fill in all fields.');
            return;
        }

        // Here, you can make an AJAX request to add the staff
        // Example: Send the data to a server-side script using fetch or XMLHttpRequest
        // Replace this with your actual API endpoint
        const apiUrl = 'https://example.com/api/add-staff';

        const formData = new FormData();
        formData.append('full-name', fullName);
        formData.append('address', address);
        formData.append('contact-number', contactNumber);
        formData.append('nic', nic);
        formData.append('email', email);
        formData.append('qualifications', qualifications);

        fetch(apiUrl, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            if (data.success) {
                alert('Staff added successfully!');
                // You can optionally redirect the user to another page here
            } else {
                alert('Failed to add staff. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while adding staff.');
        });

        // Clear the input fields
        fullNameInput.value = '';
        addressInput.value = '';
        contactNumberInput.value = '';
        nicInput.value = '';
        emailInput.value = '';
        qualificationsInput.value = '';
    });
});
