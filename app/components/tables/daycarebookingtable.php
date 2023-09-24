<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/tables.css">
    <script>
       
        function updateSlots(row, action) {
            var filledSlotsCell = row.cells[1]; // Cell containing filled slots
            var freeSlotsCell = row.cells[2];   // Cell containing free slots
            
            var filledSlots = parseInt(filledSlotsCell.textContent);
            var freeSlots = parseInt(freeSlotsCell.textContent);
            
            if (action === 'add') {
                // Check free slots available
                if (freeSlots > 0) {
                    filledSlots++;
                    freeSlots--;
                    
                    // Update the cell content
                    filledSlotsCell.textContent = filledSlots;
                    freeSlotsCell.textContent = freeSlots;
                } else {
                    alert("No more free slots available.");
                }
            } else if (action === 'remove') {
                // Check filled slots to remove
                if (filledSlots > 0) {
                    filledSlots--;
                    freeSlots++;
                    
                    // Update the cell content
                    filledSlotsCell.textContent = filledSlots;
                    freeSlotsCell.textContent = freeSlots;
                } else {
                    alert("No filled slots to remove.");
                }
            }
        }
    </script>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Time</th>
                <th>Filled Slots</th>
                <th>Free Slots</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>09.00 am - 10.00 am</td>
                <td>4</td>
                <td>6</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>

            </tr>
            <tr>
                <td>10.00 am - 11.00 am</td>
                <td>5</td>
                <td>5</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>11.00 am - 12.00 am</td>
                <td>2</td>
                <td>8</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>12.00 pm - 01.00 pm</td>
                <td>3</td>
                <td>7</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>01.00 pm - 02.00 pm</td>
                <td>9</td>
                <td>1</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>02.00 pm - 03.00 pm</td>
                <td>8</td>
                <td>2</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>03.00 pm - 04.00 pm</td>
                <td>1</td>
                <td>9</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>04.00 pm - 05.00 pm</td>
                <td>7</td>
                <td>2</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>05.00 pm - 06.00 pm</td>
                <td>9</td>
                <td>1</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>06.00 pm - 07.00 pm</td>
                <td>9</td>
                <td>1</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>07.00 pm - 08.00 pm</td>
                <td>9</td>
                <td>1</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            <tr>
                <td>08.00 pm - 09.00 pm</td>
                <td>10</td>
                <td>0</td>
                <td><button class="add-button" onclick="updateSlots(this.parentNode.parentNode, 'add')">Add</button></td>
                <td><button class="remove-button" onclick="updateSlots(this.parentNode.parentNode, 'remove')">Remove</button></td>
            </tr>
            
        </tbody>
    </table>
    
</body>
</html>

