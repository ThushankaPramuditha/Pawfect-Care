<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <title>Pet Owner Details</title>
</head>

<body>
<?php $_SESSION['updatepath'] = 'editprofile_petowner' ?>

    <?php include '../app/views/components/dashboard-compo/receptionistsidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withoutbutton.php'; ?> 
        <?php include '../app/views/components/tables/petownerdetailstable.php'; ?> 
    </div>

</body>
</html>
