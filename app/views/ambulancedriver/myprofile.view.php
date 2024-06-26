<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <?php $activePage = 'myprofile';?>

</head>


<body style="margin: 0; display: flex;">
    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
    <div style="margin-top: 80px; ">
        <?php include '../app/views/components/dashboard-compo/ambulancedriversidebar.php'; ?>

        <div
            style="flex: 1; display: flex; flex-direction: column; margin-left: 250px; padding: 10px 100px 100px 100px;">
            <h1>My Profile</h1>
            <div class="image-info-container">
                <div>
                    <div class="pair">
                        <div class="key">Staff ID:</div>
                        <div class="value"><?= htmlspecialchars($data['userdata']->id)?></div>
                    </div>
                    <div class="pair">
                        <div class="key">Full Name:</div>
                        <div class="value"><?= htmlspecialchars($data['userdata']->name)?></div>
                    </div>
                    <div class="pair">
                        <div class="key">Address:</div>
                        <div class="value"><?= htmlspecialchars($data['userdata']->address)?></div>
                    </div>
                    <div class="pair">
                        <div class="key">Contact No:</div>
                        <div class="value"><?= htmlspecialchars($data['userdata']->contact)?></div>
                    </div>
                    <div class="pair">
                        <div class="key">NIC:</div>
                        <div class="value"><?= htmlspecialchars($data['userdata']->nic)?></div>
                    </div>
                    <div class="pair">
                        <div class="key">Email:</div>
                        <div class="value"><?= htmlspecialchars($data['userdata']->email)?></div>
                    </div>
                    <div class="pair">
                        <div class="key">License No:</div>
                        <div class="value"><?= htmlspecialchars($data['userdata']->license)?></div>
                    </div>
                </div>
                <div>
                    <?php if($data['userdata']->image):?>
                    <img src="<?= ROOT ?>/uploads/ambulancedrivers/<?= $data['userdata']->image ?>" alt="Profile Picture"
                        style="width: 200px; height: 200px; border-radius: 50%;">
                    <?php else: ?>
                    <img src="<?= ROOT ?>/assets/images/defaultperson.png" alt="Profile Picture"
                        style="width: 200px; height: 200px; border-radius: 50%;">
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex-container">
                <button type="submit" id="edit-button"><a href="editprofile">Edit Profile</a></button>
                <button type="submit" id="changepw-button"><a href="changepassword">Change Password</a></button>
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