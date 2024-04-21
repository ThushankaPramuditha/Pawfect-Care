<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <title>Services</title>
   <style>

    .flex-container {
        display: flex;
        flex-direction: row;
        gap: 20px;
    }

    .chart-container {
        width: 25%;
        height: auto;
    }

    .notification-container {
        width: 50%;
        height: auto;
        padding-left:190px;

    }
   

    </style>

</head>

<body>
<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/veterinariansidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/dashboard-compo/card.php'; ?>
        <div style="margin-bottom: 60px;"></div>
        <div class="flex-container">
            <div class="chart-container" style="margin-left: 120px;">
                <?php include '../app/views/components/dashboard-compo/chart.php'; ?>
            </div>  
            <div class="notification-container">
                <?php include '../app/views/components/dashboard-compo/adminnotifications1.php'; ?>
            </div>
        </div> 
       
   </div>
</div>
</body>
</html>

