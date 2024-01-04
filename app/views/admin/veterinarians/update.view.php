<form id="updated-form" action="<?php echo ROOT?>/Admin/Veterinarians/update/<?php echo $veterinarians->id; ?>" method="post">
        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="name" value="<?php echo $veterinarians->name;?>" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $veterinarians->address;?>" required><br>

        <label for="contact-number">Contact Number:</label>
        <input type="tel" id="contact-number" name="contact" value="<?php echo $veterinarians->contact;?>" required pattern="[0-9]{10}"><br>

        <label for="nic">NIC:</label>
        <input type="text" id="nic" name="nic" value="<?php echo $veterinarians->nic;?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $veterinarians->email;?>" required><br>

        <label for="qualifications">Qualifications:</label>
        <textarea id="qualifications" name="qualifications" style="border-radius: 10px;" rows="4" required> <?php echo $veterinarians->qualifications;  ?>  </textarea>

        <div class="flex-container">
        <button type="submit" >Update Veterinarian</button>
    </div>
</form>