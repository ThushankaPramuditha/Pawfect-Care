<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<?php include '../app/views/components/panel-header-bar/hiadmin.php'; ?>
<div style = "margin-top: 80px; ">
       
    <div style = "margin-left: 230px">
       
        <div style="margin-bottom: 60px;"></div>
        <div class="flex-container">
            <div class="chart-container" style="margin-left: 120px;">
            
            </div>  
            <div class="notification-container">
               
            </div>
        </div> 
       
   </div>
</div>
</body>
</html>

