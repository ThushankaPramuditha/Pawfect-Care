<form id="updated-form" action="<?php echo ROOT?>/Admin/Services/update/<?php echo $services->id; ?>" method="post">
    
    <label for="updated-service">Service:</label>
    <input type="text" id="updated-service" name="service" value="<?php echo $services->service;  ?>" required><br>

    <label for="updated-description">Description:</label>
    <textarea id="updated-description" name="description" style="border-radius: 10px;" rows="4" required><?php echo $services->description;  ?></textarea>

    <div class="flex-container">
        <button type="submit" >Update Service</button>
    </div>
</form>