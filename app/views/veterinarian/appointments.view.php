<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <title>Appointments</title>
</head>

<body>
<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/veterinariansidebar.php'; ?>  
    <div style = "margin-left: 230px; margin-top:130px">
    <div class="panel-header" style="display:flex; justify-content:flex-end">

        <?php if (!empty($appointments)): ?>
                <?php $vetId = $appointments[0]->vet_id; ?>
                
        <?php endif; ?>
        
        <div class="search-bar">
                    <input type="text" id="search" placeholder="Search By name,contact or veterinarian">
                    <button class="search-button">Search</button>
        </div>
            
        </header>
    </div>
    <?php include '../app/views/components/tables/appointmentwithoutvettable.php'; ?>
    </div>
</div>
</body>
</html>

<script>
     $(document).ready(function(){
            $('#search').on('keyup', function(){
                var searchTerm = $(this).val();
                var vetId = <?= json_encode($vetId); ?>;

                $.ajax({
                url: "<?php echo ROOT ?>/Veterinarian/Appointments/search",
                type: "POST",
                data: {search: searchTerm, vetId: vetId},
                success: function(data) {
                    $('tbody').html(data);
                }
                });
            });
     });
</script>


