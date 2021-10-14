<?php

//Getting data from http request of IoT Device A0,D0,D1,D2 - as per setup
$data=$_GET["data"];

//Split data based on separator
$str=explode(",",$data);

//Select the required GPIO as per setup
$ip=$str[0];

//Perform computations over input data as raw data is received
$ip=($ip/1024.0)*330;

//Send input for database entry
$conn = mysqli_connect("fdb25.awardspace.net","2999155_otfiot","otfiot123","2999155_otfiot");

$sql = "INSERT INTO data (temperature) VALUES ({$ip})";

mysqli_query($conn, $sql);

mysqli_close($conn);

//Apply conditions over the input data received D3,D4,D5,D6 - as per setup
if($ip>25)
$op=31405060;
else
$op=30405060;
//in 31, 3 stands for GPIO and 1 stands for HIGH and 0 for LOW

//Send control signal code to the IoT Device 
echo $op;
?>