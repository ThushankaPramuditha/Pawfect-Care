<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Pet</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
</head>

<body>

    <?php include '../app/views/components/dashboard-compo/receptionistsidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
        <?php include '../app/views/components/forms/addnewpetform.php'; ?>
                
    </div>

</body>
</html>
