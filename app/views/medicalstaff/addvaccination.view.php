<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vaccination</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
</head>

<body>
<?php $activePage = 'petdetails';?>

<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/medicalstaffsidebar.php'; ?>  
    <div style = "margin-left: 230px; padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/forms/addvaccinationform.php'; ?>
                
    </div>
</div>
</body>
</html>
