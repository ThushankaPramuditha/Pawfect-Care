<form id="updated-form" action="<?php echo ROOT?>/Petowner/Dashboard/updatePet/<?php echo $pet->id; ?>" method="post">
    <div class="column">
        <label for="update-name">Pet Name:</label>
        <input type="text" id="update-name" name="name" value="<?php echo $pet->name;?>">
        <div id="error-update-name" class="error-message"></div>

        <label for="update-breed">Breed:</label>
        <input type="text" id="update-breed" name="breed" value="<?php echo $pet->breed;?>">
        <div id="error-update-breed" class="error-message"></div>

        <label for="update-age">Age:</label>
        <input type="text" id="update-age" name="age" value="<?php echo $pet->age;?>">
        <div id="error-update-age" class="error-message"></div>


    </div>
    <div class="flex-container">
            <button type="submit" >Update Pet</button>
    </div>
</form>
