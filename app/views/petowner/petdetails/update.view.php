<form id="update-petdetails-form" action="<?php echo ROOT?>/Petowner/Petdetails/update/<?php echo $petdetails->id; ?>" method="post">
    
    <label for="updated-pet-name">Pet Name:</label>
    <input type="text" id="updated-pet-name" name="pet_name" value="<?php echo $petdetails->pet_name; ?>" required><br>

    <label for="updated-pet-type">Pet Type:</label>
    <input type="text" id="updated-pet-type" name="pet_type" value="<?php echo $petdetails->pet_type; ?>" required><br>

    <label for="updated-breed">Breed:</label>
    <input type="text" id="updated-breed" name="breed" value="<?php echo $petdetails->breed; ?>"><br>

    <label for="updated-age">Age:</label>
    <input type="text" id="updated-age" name="age" value="<?php echo $petdetails->age; ?>"><br>

    <label for="updated-weight">Weight:</label>
    <input type="text" id="updated-weight" name="weight" value="<?php echo $petdetails->weight; ?>"><br>

    <label for="updated-gender">Gender:</label>
    <input type="text" id="updated-gender" name="gender" value="<?php echo $petdetails->gender; ?>"><br>

    <div class="flex-container">
        <button type="submit">Update Pet Details</button>
    </div>
</form>
