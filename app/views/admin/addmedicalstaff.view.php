<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medical Staff</title>
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/forms.css">
</head>

<body>

    <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        
        <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
        <h1>Add Medical Staff</h1>
        <?php include '../app/views/components/forms/addstaffform.php'; ?>
                
    </div>

</body>
</html>
