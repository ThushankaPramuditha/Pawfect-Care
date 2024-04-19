<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Generate Reports</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">

</head>

<body>
    <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px;  padding: 10px 10px 100px 100px;">
        <?php include '../app/views/components/panel-header-bar/hiadmin.php'; ?>
            <div class="modal-content">
                <h1>Appointments</h1> 
                <div class="form-container">
                    <form action="<?php echo ROOT?>/admin/reports/generate" method="post">
                        <label for="from">From:</label>
                        <input type="date" id="from" name="from" required>
                        <label for="to">To:</label>
                        <input type="date" id="to" name="to" required>
                        <button type="submit">Generate Report</button>
                    </form>
                </div>
            </div>
        
    </div>
</body>
</html>
