document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('edit-pet-details-form');
    const updateButton = document.getElementById('edit-pet-details-button');

    updateButton.addEventListener('click', function () {
        // Get the input values
        const petNameInput = document.getElementById('pet-name');
        const dateOfBirthInput = document.getElementById('date-of-birth');
        const petTypeInput = document.getElementById('pet-type');
        const breedInput = document.getElementById('breed');
        const genderMaleInput = document.getElementById('male');
        const genderFemaleInput = document.getElementById('female');
        const petImageInput = document.getElementById('add-image');

        const petName = petNameInput.value;
        const dateOfBirth = dateOfBirthInput.value;
        const petType = petTypeInput.value;
        const breed = breedInput.value;
        const gender = genderMaleInput.checked ? 'male' : 'female';

        // Perform validation if needed
        if (!petName || !dateOfBirth || !petType || !breed || !(genderMaleInput.checked || genderFemaleInput.checked)) {
            alert('Please fill in all fields.');
            return;
        }

        // Handle the image upload if a file is selected
        let petImage = null;
        if (petImageInput.files.length > 0) {
            petImage = petImageInput.files[0];
        }

        // Here, you can make an AJAX request to add the pet
        // Example: Send the data to a server-side script using fetch or XMLHttpRequest
        // Replace this with your actual API endpoint
        const apiUrl = 'https://example.com/api/edit-pet-details';

        const formData = new FormData();
        formData.append('pet-name', petName);
        formData.append('date-of-birth', dateOfBirth);
        formData.append('pet-type', petType);
        formData.append('breed', breed);
        formData.append('gender', gender);
        formData.append('pet-image', petImage);

        fetch(apiUrl, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            if (data.success) {
                alert('Pet updated successfully!');
                // You can optionally redirect the user to another page here
            } else {
                alert('Failed to update pet. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating pet.');
        });

        // Clear the input fields
        petNameInput.value = '';
        dateOfBirthInput.value = '';
        petTypeInput.value = '';
        breedInput.value = '';
        genderMaleInput.checked = false;
        genderFemaleInput.checked = false;
        petImageInput.value = ''; // Reset the file input
    });
});
