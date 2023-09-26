document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('add-treatment-form');
    const addButton = document.getElementById('add-treatment-button');

    addButton.addEventListener('click', function () {
        // Get the input values
        const dateInput = document.getElementById('date');
        const medicalConditionInput = document.getElementById('medical-condition');
        const treatmentInput = document.getElementById('treatment');
        const medicationsInput = document.getElementById('medications');
        const remarksInput = document.getElementById('remarks');

        const date = dateInput.value;
        const medicalCondition = medicalConditionInput.value;
        const treatment = treatmentInput.value;
        const medications = medicationsInput.value;
        const remarks = remarksInput.value;

        // Perform validation if needed
        if (!date || !medicalCondition || !treatment || !medications || !remarks) {
            alert('Please fill in all fields.');
            return;
        }

        // Here, you can make an AJAX request to add the treatment
        // Example: Send the data to a server-side script using fetch or XMLHttpRequest
        // Replace this with your actual API endpoint
        const apiUrl = 'https://example.com/api/add-treatment';

        const formData = new FormData();
        formData.append('date', date);
        formData.append('medical-condition', medicalCondition);
        formData.append('treatment', treatment);
        formData.append('medications', medications);
        formData.append('remarks', remarks);

        fetch(apiUrl, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            if (data.success) {
                alert('Treatment added successfully!');
                // You can optionally redirect the user to another page here
            } else {
                alert('Failed to add treatment. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while adding treatment.');
        });

        // Clear the input fields
        dateInput.value = '';
        medicalConditionInput.value = '';
        treatmentInput.value = '';
        medicationsInput.value = '';
        remarksInput.value = '';
    });
});
