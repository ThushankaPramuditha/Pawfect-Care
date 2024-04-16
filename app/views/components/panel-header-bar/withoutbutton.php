<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

</head>
<body>
        <div class="panel-header">
            <div class="search-bar">
                <input type="text" placeholder="Search..." class="search-input">
                <button class="search-button">Search</button>
            </div>
            <div class="greet-user">
                <span class="user-name">Hi, <?= htmlspecialchars($data['userdata']->name) ?></span>
                <span class="user-type"><?= htmlspecialchars($data['userdata']->user_type) ?></span>
            </div>
        </div>
</body>
</html>



