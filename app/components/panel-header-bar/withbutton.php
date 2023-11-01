<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/panelheader.css">
</head>
<body>
        <div class="header">
            <button class="add-new-button"><a href = "<?php echo $_SESSION['addnewpath'] ?>">Add New</a></button>
            <div class="search-bar">
                <input type="text" placeholder="Search..." class="search-input">
                <button class="search-button">Search</button>
            </div>
            <p>Hi, Admin!</p>
        </div>
</body>
</html>



