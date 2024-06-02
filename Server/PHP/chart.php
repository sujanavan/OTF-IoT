<div id="areachart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Time Stamp', 'Celsius']
<?php
//check if request is empty

//Send input for database entry
$conn = mysqli_connect("<<Database Server URL>>","<<Database Username>>","<<Database Password>>","<<Database Name>>");

$sql = "SELECT * FROM data";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
echo ",['{$row["timestamp"]}',{$row["temperature"]}]";

mysqli_close($conn);
?>  
]);
  
  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Temperature Analysis', 'width':550, 'height':400};
  
  // Display the chart inside the <div> element with id="areachart"
  var chart = new google.visualization.AreaChart(document.getElementById('areachart'));
  chart.draw(data, options);
}
</script>
