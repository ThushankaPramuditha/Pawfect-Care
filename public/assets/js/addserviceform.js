document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('add-service-form');
    const addButton = document.getElementById('add-button');

    addButton.addEventListener('click', function () {
        // Get the input values
        const serviceInput = document.getElementById('service');
        const descriptionInput = document.getElementById('description');

        const service = serviceInput.value;
        const description = descriptionInput.value;

        // Perform validation if needed
        if (!service || !description) {
            alert('Please fill in all fields.');
            return;
        }

        // Here, you can make an AJAX request to add the service
        // Example: Send the data to a server-side script using fetch or XMLHttpRequest
        // Replace this with your actual API endpoint
        const apiUrl = 'https://example.com/api/add-service';

        const formData = new FormData();
        formData.append('service', service);
        formData.append('description', description);

        fetch(apiUrl, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            if (data.success) {
                alert('Service added successfully!');
                // You can optionally redirect the user to another page here
            } else {
                alert('Failed to add service. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while adding service.');
        });

        // Clear the input fields
        serviceInput.value = '';
        descriptionInput.value = '';
    });
});
