
<?php $activePage = 'ambulancedrivers'; ?>
<form id="updated-form" action="<?php echo ROOT?>/Admin/AmbulanceDrivers/update/<?php echo $ambulancedrivers->id; ?>" method="post">
    <div class="column">
        <label for="update-name">Full Name:</label>
        <input type="text" id="update-name" name="name" value="<?php echo $ambulancedrivers->name;?>">
        <div id="error-update-name" class="error-message"></div>

        <label for="update-address">Address:</label>
        <input type="text" id="update-address" name="address" value="<?php echo $ambulancedrivers->address;?>">
        <div id="error-update-address" class="error-message"></div>

        <label for="update-contact_no">Contact Number:</label>
        <input type="tel" id="update-contact_no" name="contact" value="<?php echo $ambulancedrivers->contact;?>">
        <div id="error-update-contact" class="error-message"></div>

    </div>
    <div class="column">

        <label for="update-nic">NIC:</label>
        <input type="text" class="disabled-field" id="update-nic" name="nic" value="<?php echo $ambulancedrivers->nic;?>">

        <label for="email">Email:</label>
        <input type="email" class="disabled-field" id="update-email" name="email" value="<?php echo $ambulancedrivers->email;?>"><br>

        <label for="update-license">License number:</label>
        <input type="text" id="update-license" name="license" value="<?php echo $ambulancedrivers->license;?>">
        <div id="error-update-license" class="error-message"></div>

    </div>
    <div class="flex-container">
        <button type="submit" >Update Ambulance Driver</button>
    </div>
</form>
