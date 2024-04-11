<!--?php
// Check if $petdetails is defined and not null
if (isset($petdetails) && $petdetails) {
    ?>
    <form id="updated-form" action="<!?php echo ROOT ?>/Medicalstaff/PetDetails/update/<!?php echo $petdetails->id; ?>" method="post">

        <label for="updated-Petid">Pet ID:</label>
        <input type="text" id="updated-petid" name="petid" value="<!?php echo $petdetails->id; ?>" required><br>

        <label for="updated-name">Name:</label>
        <input type="text" id="updated-name" name="name" value="<!?php echo $petdetails->name; ?>" required><br>

        <label for="updated-age">Age:</label>
        <input type="text" id="updated-age" name="age" value="<!?php echo $petdetails->age; ?>" required><br>

        <label for="updated-breed">Breed:</label>
        <input type="text" id="updated-breed" name="breed" value="<!?php echo $petdetails->breed; ?>" required><br>

        <label for="updated-weight">Weight:</label>
        <input type="text" id="updated-weight" name="weight" value="<!?php echo $petdetails->weight; ?>" required><br>

        <label for="updated-temperature">Temperature:</label>
        <input type="text" id="updated-temperature" name="temperature" value="<!?php echo $petdetails->temperature; ?>" required><br>

        <label for="updated-species">Species:</label>
        <textarea id="updated-species" name="species" required><!?php echo $petdetails->species; ?></textarea><br>

        <label for="updated-gender">Gender:</label>
        <input type="text" id="updated-gender" name="gender" value="<!?php echo $petdetails->gender; ?>" required><br>

        <label for="updated-owner-name">Owner Name:</label>
        <input type="text" id="updated-owner-name" name="owner-name" value="<!?php echo $petdetails->owner_name; ?>" required><br>

        <label for="updated-contact-no">Contact No:</label>
        <input type="text" id="updated-contact-no" name="contact-no" value="<!?php echo $petdetails->contact_no; ?>" required><br>

        <div class="flex-container">
            <button type="submit">Update Pet Details</button>
        </div>
    </form>
    <!-?php
} else {
    echo "Pet details not available.";
}
?>

