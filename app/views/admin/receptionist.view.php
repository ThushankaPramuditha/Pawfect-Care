<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionist</title>
</head>

<body>
<?php $_SESSION['addnewpath'] = 'addreceptionist' ?>
    <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withbutton.php'; ?> 
        <?php include '../app/views/components/tables/stafftable.php'; ?> 
    </div>

</body>
</html>
