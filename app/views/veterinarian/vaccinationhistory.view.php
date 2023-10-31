<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination History</title>
</head>

<body>

    <?php include '../app/views/components/dashboard-compo/veterinariansidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withoutbutton.php'; ?> 
        <?php include '../app/views/components/tables/vaccinationhistorytable.php'; ?> 
    </div>

</body>
</html>
