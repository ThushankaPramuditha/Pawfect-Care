<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Details</title>
</head>

<body style="margin: 0; display: flex;">

    <?php include '../app/views/components/dashboard-compo/ambulancedriversidebar.php'; ?>  
    <div style="flex: 1; display: flex; flex-direction: column; margin-left: 20px; padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/panel-header-bar/withoutbutton.php'; ?> 
      <div style="margin-top: 20px; margin-bottom: 20px;">
        <?php include '../app/views/components/tables/ambulancebookingtable.php'; ?> 
      </div>
    </div>

</body>
</html>
