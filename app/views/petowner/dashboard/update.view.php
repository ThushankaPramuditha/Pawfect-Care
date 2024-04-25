<form id="updated-form" action="<?php echo ROOT?>/Petowner/Dashboard/updatePet/<?php echo $pet->id; ?>" method="post">
    <div class="column">
        <label for="update-name">Pet Name:</label>
        <input type="text" id="update-name" name="name" value="<?php echo $pet->name;?>">
        <div id="error-update-name" class="error-message"></div>
        
        <label for="birthday">Date of Birth:</label>
                    <input type="date" id="birthday" name="birthday">
                    <div id="error-birthday" class="error-message"></div>

                     <!-- enum to select gender-->
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                      <div id="error-gender" class="error-message"></div>
                
                    <label for="species">Species:</label>
                    <input type="text" id="species" name="species">
                    <div id="error-species" class="error-message"></div>

                    <label for="update-breed">Breed:</label>
                    <input type="text" id="update-breed" name="breed" value="<?php echo $pet->breed;?>">
                    <div id="error-update-breed" class="error-message"></div>


    </div>
    <div class="flex-container">
            <button type="submit" >Update Pet</button>
    </div>
</form>
