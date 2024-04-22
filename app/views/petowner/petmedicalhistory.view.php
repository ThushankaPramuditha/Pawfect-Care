<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History</title>
</head>

<body>
<?php include 'navbar.php'; ?>

<?php $_SESSION['addnewpath'] = 'addtreatment' ?>

    <?php include '../app/views/components/dashboard-compo/medicalstaffsidebar.php'; ?>  
    <div style = "margin-left: 230px; margin-top:100px;">
        <?php include '../app/views/components/tables/medicalhistoryupdatetable.php'; ?> 
    </div>

</body>
</html>
