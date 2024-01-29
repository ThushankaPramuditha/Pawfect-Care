<form id="updated-form" action="<?php echo ROOT?>/Admin/MedicalStaff/update/<?php echo $medstaff->id; ?>" method="post">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $medstaff->name;?>" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $medstaff->address;?>" required><br>

        <label for="contact_no">Contact Number:</label>
        <input type="tel" id="contact_no" name="contact" value="<?php echo $medstaff->contact;?>" required pattern="[0-9]{10}"><br>

        <label for="nic">NIC:</label>
        <input type="text" id="nic" name="nic" value="<?php echo $medstaff->nic;?>" required><br>

        <!-- <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $medstaff->email;?>" required><br> -->

        <label for="qualifications">Qualifications:</label>
        <textarea id="qualifications" name="qualifications" style="border-radius: 10px;" rows="4" required> <?php echo $medstaff->qualifications;  ?>  </textarea>

        <div class="flex-container">
        <button type="submit" >Update Medical Staff</button>
    </div>
</form>