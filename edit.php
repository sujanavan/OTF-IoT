<form method=post action=write.php>
IoT Device Program:-<br>
<textarea name="program" rows="30" cols="100">
<?php
$myfile = fopen("sense.php", "r") or die("Unable to open file!");
echo fread($myfile,filesize("sense.php"));
fclose($myfile);
?>
</textarea>
<br>
<input type="submit">
</form>