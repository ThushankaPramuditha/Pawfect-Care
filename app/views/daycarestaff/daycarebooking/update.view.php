<form id="updated-form" action="<?php echo ROOT?>/daycarebooking/update/<?php echo $daycarebooking->id; ?>" method="post">
    
    <label for="updated-daycarebooking">Time:</label>
    <input type="text" id="updated-daycarebooking" name="daycarebooking" value="<?php echo $daycarebooking->time;  ?>" required><br>

    <label for="updated-daycarebooking">Filled Slots:</label>
    <input type="text" id="updated-daycarebooking" name="daycarebooking" value="<?php echo $daycarebooking->filled_slots;  ?>" required><br>

    <label for="updated-daycarebooking">Free Slots:</label>
    <input type="text" id="updated-daycarebooking" name="daycarebooking" value="<?php echo $daycarebooking->free_slots;  ?>" required><br>

    <label for="updated-daycarebooking">Date:</label>
    <input type="date" id="updated-daycarebooking" name="daycarebooking" value="<?php echo $daycarebooking->date;  ?>" required><br>



    <div class="flex-container">
        <button type="submit" >Update Daycarebooking</button>
    </div>
</form>