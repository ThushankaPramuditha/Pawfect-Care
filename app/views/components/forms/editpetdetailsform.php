<h1>Edit Pet Details</h1> 
        <div class = "formcontainer" id="updatepetdetails"> 
            <form id="edit-pet-details-form" action="<?php echo ROOT?>/Receptionist/PetDetails/update/<?php echo $userdata->id; ?>" method="post">
            
                <label for="pet_name">Name:</label>
                <input type="text" id="pet_name" name="pet_name" required><br>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required><br>

                <label for="pet_type">Type:</label>
                <input type="text" id="pet_type" name="pet_type" placeholder="ex: Dog, Cat, Parrot" required><br>

                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed" required><br>

                <label>Gender:</label><br>
                <div class="flex-container">
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="female">Female</label><br>
                </div>
                
                <br>

                <label for="petimage">Image of Your Pet:</label>
                <div class="img-container" id="image-container">
                    <label for="add-image" id="add-image-label" class="image-label">
                        <span>+</span> Add Image
                    </label>
                    <input type="file" id="add-image" accept="image/*" style="display: none;">
                    <img id="pet-image-preview" src="" alt="Preview" style="display: none;">
                </div><br>

                <div class="flex-container">
                    <button type="submit" >Update PetDetails</button>
                </div>
            </form>   
        
    </div>
