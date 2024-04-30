<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var dps = []; // dataPoints
var chart = new CanvasJS.Chart("chartContainer", {
	title :{
		text: "Dynamic Data"
	},
	data: [{
		type: "line",
		dataPoints: dps
	}]
});

var xVal = 0;
var yVal = 100; 
var updateInterval = 1000;
var dataLength = 20; // number of dataPoints visible at any point

var updateChart = function (count) {

	count = count || 1;

	for (var j = 0; j < count; j++) {
		yVal = yVal +  Math.round(5 + Math.random() *(-5-5));
		dps.push({
			x: xVal,
			y: yVal
		});
		xVal++;
	}

	if (dps.length > dataLength) {
		dps.shift();
	}

	chart.render();
};

updateChart(dataLength);
setInterval(function(){updateChart()}, updateInterval);

}
</script>
</head>
<!-- <body>
<div id="chartContainer" style="height: 370px; width:100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>
<h2>Choose your favorite color:</h2>
    <input type="radio" id="color_red" name="color" value="red">
    <label for="color_red">Red</label><br>
    <input type="radio" id="color_blue" name="color" value="blue">
    <label for="color_blue">Blue</label><br>
    <input type="radio" id="color_green" name="color" value="green">
    <label for="color_green">Green</label><br>
    
    <p id="selectedColor">Your selected color will appear here.</p>

    <script>
        // Get all radio buttons
        const radioButtons = document.querySelectorAll('input[name="color"]');

        // Function to handle radio button change
        function handleRadioChange(event) {
            // Check which radio button is checked
            radioButtons.forEach(radioButton => {
                if (radioButton.checked) {
                    // Update the paragraph with the selected color
                    document.getElementById("selectedColor").innerText = "Your selected color is: " + radioButton.value;
                }
            });
        }

        // Attach change event listener to all radio buttons
        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', handleRadioChange);
        });

        // Initialize the paragraph with the default selected color
        handleRadioChange();
    </script> -->