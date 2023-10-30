<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet</title>
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/forms.css">
</head>
<body>
<h1>Edit Pet Details</h1>
    <div class="form-container">
        <form id="edit-pet-details-form">

            <label for="pet-name">Name:</label>
            <input type="text" id="pet-name" name="pet-name" required><br>

            <label for="date-of-birth">Date of Birth:</label>
            <input type="date" id="date-of-birth" name="date-of-birth" required><br>

            <label for="pet-type">Type:</label>
            <input type="text" id="pet-type" name="pet-type" placeholder="ex: Dog, Cat, Parrot" required><br>

            <label for="breed">Breed:</label>
            <input type="text" id="breed" name="breed" required><br>

            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Female</label><br>
            <br>

            <label for="pet-image">Image of Your Pet:</label>
            <div class="img-container" id="image-container">
                <label for="add-image" id="add-image-label" class="image-label">
                    <span>+</span> Add Image
                </label>
                <input type="file" id="add-image" accept="image/*" style="display: none;">
                <img id="pet-image-preview" src="" alt="Preview" style="display: none;">
            </div><br>

            <div class="flex-container">
                <button type="submit" id="edit-pet-details-button" onclick="updatePet()">Update</button>
            </div>
        </form>
    </div>

    <script src="editpetdetailsform.js"></script>
</body>
</html>
