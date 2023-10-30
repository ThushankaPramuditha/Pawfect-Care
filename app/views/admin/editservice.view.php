<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/forms.css">
</head>

<body>

    <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
        <h1>Edit Service</h1> 
        <div class = "form-container"> 
            <form id="edit-profile-form">
            
            <?php
            // You should replace these placeholders with the actual PHP code
            // to retrieve and populate the form data.
            $service = "blood testing"; // Replace with actual service
            $description = "A complete blood count (CBC) and complete blood chemistry panel, including electrolytes and urinalysis, are common tests. The CBC identifies whether there is anemia, inflammation, or infection present."; // Replace with actual description
            ?>

                <label for="full-name">Service:</label>
                <input type="text" id="service" name="service" required value="<?php echo $service; ?>"><br>

                <label for="description">Description:</label>
                <textarea id="description" name="description" style="border-radius: 10px;" rows="4" required><?php echo $description; ?></textarea>

                <div class = "flex-container">
                    <button type="submit" id="update-button" onclick="updateProfile()">Update Service</button>
                </div>
            </form>   
        
        </div>
    

        <script src="editprofileform.js"></script>
                
    </div>



</body>
</html>
