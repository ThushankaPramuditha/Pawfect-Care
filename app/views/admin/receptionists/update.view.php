<form id="updated-form" action="<?php echo ROOT?>/Admin/Receptionists/update/<?php echo $receptionists->id; ?>" method="post">
    <div class="column">
        <label for="update-name">Full Name:</label>
        <input type="text" id="update-name" name="name" value="<?php echo $receptionists->name;?>">
        <div id="error-update-name" class="error-message"></div>

        <label for="update-address">Address:</label>
        <input type="text" id="update-address" name="address" value="<?php echo $receptionists->address;?>">
        <div id="error-update-address" class="error-message"></div>

        <label for="update-contact_no">Contact Number:</label>
        <input type="tel" id="update-contact_no" name="contact" value="<?php echo $receptionists->contact;?>" >
        <div id="error-update-contact" class="error-message"></div>

    </div>
    <div class="column">

        <label for="update-nic">NIC:</label>
        <input type="text" class="disabled-field" id="update-nic" name="nic" value="<?php echo $receptionists->nic;?>">

        <label for="email">Email:</label>
        <input type="email" class="disabled-field" id="update-email" name="email" value="<?php echo $receptionists->email;?>" ><br>

        <label for="update-qualifications">Qualifications:</label>
        <textarea id="update-qualifications" name="qualifications" style="border-radius: 10px;" rows="4"><?php echo $receptionists->qualifications; ?></textarea>
        <div id="error-update-qualifications" class="error-message"></div>

    </div>
    <div class="flex-container">
        <button type="submit" >Update Receptionist</button>
    </div>
</form>
