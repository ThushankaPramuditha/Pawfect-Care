document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('add-vaccination-form');
    const addButton = document.getElementById('add-vaccination-button');

    addButton.addEventListener('click', function () {
        // Get the input values
        const dateInput = document.getElementById('date');
        const vaccineInput = document.getElementById('vaccine');
        const serialNumberInput = document.getElementById('serial-number');
        const administeredByInput = document.getElementById('administered-by');
        const nextDueDateInput = document.getElementById('next-due-date');

        const date = dateInput.value;
        const vaccine = vaccineInput.value;
        const serialNumber = serialNumberInput.value;
        const administeredBy = administeredByInput.value;
        const nextDueDate = nextDueDateInput.value;

        // Perform validation if needed
        if (!date || !vaccine || !serialNumber || !administeredBy || !nextDueDate) {
            alert('Please fill in all fields.');
            return;
        }

        // Here, you can make an AJAX request to add the vaccination
        // Example: Send the data to a server-side script using fetch or XMLHttpRequest
        // Replace this with your actual API endpoint
        const apiUrl = 'https://example.com/api/add-vaccination';

        const formData = new FormData();
        formData.append('date', date);
        formData.append('vaccine', vaccine);
        formData.append('serial-number', serialNumber);
        formData.append('administered-by', administeredBy);
        formData.append('next-due-date', nextDueDate);

        fetch(apiUrl, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            if (data.success) {
                alert('Vaccination added successfully!');
                // You can optionally redirect the user to another page here
            } else {
                alert('Failed to add vaccination. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while adding vaccination.');
        });

        // Clear the input fields
        dateInput.value = '';
        vaccineInput.value = '';
        serialNumberInput.value = '';
        administeredByInput.value = '';
        nextDueDateInput.value = '';
    });
});
