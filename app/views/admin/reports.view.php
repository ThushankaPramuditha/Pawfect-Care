<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Generate Reports</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <?php $activePage = 'reports'; ?>

</head>

<body>
    <?php include '../app/views/components/panel-header-bar/hiadmin.php'; ?>
    <div style="margin-top: 80px; ">
        <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>
        <div style="margin-left: 230px;  padding: 10px 10px 100px 100px;">
            <?php include '../app/views/components/panel-header-bar/hiadmin.php'; ?>
            <div>

                <!-- generate reports for appointment bookings -->
                <div class="modal-content">
                    <h1>Appointment Bookings</h1>
                    <div class="form-container">
                        <form action="<?php echo ROOT?>/admin/reports/generateAppointmentReport" method="post">
                            <label for="from">From:</label>
                            <input type="date" id="from" name="from" max="<?= date('Y-m-d'); ?>" required>
                            <label for="to">To:</label>
                            <input type="date" id="to" name="to" required>
                            <button type="submit">Generate Report</button>
                        </form>
                    </div>
                </div>

                <!-- generate reports for daycare bookings -->
                <div class="modal-content">
                    <h1>Daycare Bookings</h1>
                    <div class="form-container">
                        <form action="<?php echo ROOT?>/admin/reports/generateDaycareReport" method="post">
                            <label for="from">From:</label>
                            <input type="date" id="from" name="from" max="<?= date('Y-m-d'); ?>" required>
                            <label for="to">To:</label>
                            <input type="date" id="to" name="to" required>
                            <button type="submit">Generate Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    //sweeetalert for validation SUCCESS and ERROR
    window.onload = function() {
        <?php if (isset($_SESSION['flash'])): ?>
        const flash = <?php echo json_encode($_SESSION['flash']); ?>;
        if (flash.success) {
            Swal.fire('Success', flash.success, 'success');
        } else if (flash.error) {
            Swal.fire('Error', flash.error, 'error');
        }
        <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
    };
    </script>

</body>
</html>