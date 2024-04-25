<form id="updated-form" action="<?php echo ROOT?>/Petowner/Dashboard/updatePet/<?php echo $pet->id; ?>" method="post">
    <div class="column">
        <label for="update-name">Pet Name:</label>
        <input type="text" id="update-name" name="name" value="<?php echo $pet->name;?>">
        <div id="error-update-name" class="error-message"></div>
        
        <label for="update-birthday">Date of Birth:</label>
        <input type="date" id="update-birthday" name="birthday" value="<?php echo date('Y-m-d', strtotime($pet->birthday)); ?>">
        <div id="error-update-birthday" class="error-message"></div>

            <!-- enum to select gender-->
        <label for="update-gender">Gender:</label>
        <select id="update-gender" name="gender">
            <option value="M" <?php echo $pet->gender == 'M' ? 'selected': ''; ?>>Male</option>
            <option value="F" <?php echo $pet->gender == 'F' ? 'selected': ''; ?>>Female</option>
        </select>
            <div id="error-update-gender" class="error-message"></div>
    
        <label for="update-species">Species:</label>
        <input type="text" id="update-species" name="species" value="<?php echo $pet->species;?>">
        <div id="error-update-species" class="error-message"></div>

        <label for="update-breed">Breed:</label>
        <input type="text" id="update-breed" name="breed" value="<?php echo $pet->breed;?>">
        <div id="error-update-breed" class="error-message"></div>


    </div>
    <div class="flex-container">
            <button type="submit" >Update Pet</button>
    </div>
</form>
