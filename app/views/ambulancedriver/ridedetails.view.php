<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <title>Ride Details</title>
</head>

<body style="margin: 0; display: flex;">
<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/ambulancedriversidebar.php'; ?>  
    <div style="flex: 1; display: flex; flex-direction: column; margin-left: 20px; padding: 10px 10px 100px 100px;">
    <div style = "margin-left: 230px; margin-top:130px">
    <div class="panel-header" style="display:flex; justify-content:flex-end">
            <div class="search-bar">
                    <input type="text" id="search" placeholder="Search ride details...">
                    <button class="search-button">Search</button>
                </div>
            
    </header>
        </div>
      <div style="margin-top: 20px; margin-bottom: 20px;">
        <?php include '../app/views/components/tables/ambulancebookingtable.php'; ?> 
      </div>
    </div>
</div>
</body>
</html>
