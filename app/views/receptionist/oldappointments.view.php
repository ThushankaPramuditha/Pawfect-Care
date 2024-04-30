<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">

    <?php $activePage = 'oldappointments';?>

    <title>Appointments</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


<body>
    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
    <div style="margin-top: 80px; ">
        <?php include '../app/views/components/dashboard-compo/receptionistsidebar.php'; ?>

        <div style="margin-left: 230px; margin-top:130px">

            <div class="panel-header">
                <div class="filter-date">
                    <input type="date" id="date-filter" placeholder="Filter by date..."
                        style="background-color: #ffffff; margin:0px; color: #666 ">
                </div>
                <div class="search-bar">
                    <input type="text" id="search" placeholder="Search appointments...">
                    <button class="search-button">Search</button>
                </div>

                </header>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Date Time</th>
                            <th>Patient No.</th>
                            <th>Pet ID</th>
                            <th>Pet Name</th>
                            <th>Pet Owner</th>
                            <th>Contact Number</th>
                            <th>Vet Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($appointments) && !empty($appointments)): ?>
                        <?php foreach ($appointments as $appointment): ?>
                        <tr key="<?php echo $appointment->id; ?>">
                            <td><?= htmlspecialchars($appointment->date_time); ?></td>
                            <td><?= htmlspecialchars($appointment->patient_no); ?></td>
                            <td><?= htmlspecialchars($appointment->pet_id); ?></td>
                            <td><?= htmlspecialchars($appointment->pet_name); ?></td>
                            <td><?= htmlspecialchars($appointment->petowner); ?></td>
                            <td><?= htmlspecialchars($appointment->contact); ?></td>
                            <td><?= htmlspecialchars($appointment->vet_name); ?></td>
                            <td><?= htmlspecialchars($appointment->status); ?></td>
                        </tr>

                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="20">No appointments found.</td>
                        </tr>
                        <?php endif; ?>




                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
    $(document).ready(function() {
        $('#date-filter').change(updateTable);
        $('#search').on('keyup', updateTable);

        function updateTable() {
            var searchTerm = $('#search').val();
            var filterDate = $('#date-filter').val();

            $.ajax({
                url: "<?php echo ROOT ?>/Receptionist/OldAppointments/search",
                type: "POST",
                data: {
                    search: searchTerm,
                    date: filterDate
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        }

    });

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