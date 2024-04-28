<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
</head>

<body>
    <div class="table-container">
        <table>
            <thead>
                <tr>

                    <th>Date Time</th>
                    <th>Patient No.</th>
                    <th>Status</th>
                    <th>Pet ID</th>
                    <th>Pet Name</th>
                    <th>Pet Owner</th>
                    <th>Contact Number</th>
                    <th>Vet Name</th>
                    <th class="edit-action-buttons"></th>

                </tr>
            </thead>
            <tbody>
                <?php if (is_array($appointments) && !empty($appointments)): ?>
                <?php foreach ($appointments as $appointment): ?>
                <tr key="<?php echo $appointment->id; ?>">
                    <td><?= htmlspecialchars($appointment->date_time); ?></td>
                    <td><?= htmlspecialchars($appointment->patient_no); ?></td>
                    <td><select id="status-select" >
                            <option value="pending" <?= $appointment->status == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="current" <?= $appointment->status == 'current' ? 'selected' : '' ?>>Current</option>
                            <option value="finished" <?= $appointment->status == 'finished' ? 'selected' : '' ?>>Finished</option>
                            <option value="cancelled" <?= $appointment->status == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                        </select>
                    </td>
                    <td><?= htmlspecialchars($appointment->pet_id); ?></td>
                    <td><?= htmlspecialchars($appointment->pet_name); ?></td>
                    <td><?= htmlspecialchars($appointment->petowner); ?></td>
                    <td><?= htmlspecialchars($appointment->contact); ?></td>
                    <td><?= htmlspecialchars($appointment->vet_name); ?></td>
                    <td class="edit-action-buttons">
                        <!button class="edit-icon"></button>
                    </td>
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

    <script>
        document.getElementById('status-select').addEventListener('change', function() {
                var status = this.value;
                var appointmentId = $(this).closest('tr').attr('key');
                console.log(appointmentId);
                $.ajax({
                    url: "<?= ROOT ?>/Receptionist/Appointments/updateStatus",
                    type: "POST",
                    data: {
                        appointmentId: appointmentId,
                        status: status
                    },
                    success: function(data) {
                        Swal.fire('Updated', 'The appointment status has been updated.', 'success');
                    },
                    error: function() {
                        Swal.fire('Error', 'Failed to update the appointment status.', 'error');
                    }
                });
            });

        </script>

</body>

</html>