<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	
	data: [{
		type: "pie",
		startAngle: 25,
		// toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 10,
		// indexLabel: "{label} - {y}%",
		dataPoints: [
			{ y: 16, label: "Daycare Bookings" },
			{ y: 24, label: "Appointment Bookings" },
			{ y: 4, label: "Transport Bookings" },
			{ y:30, label: " On site Bookings" },
		
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>