<?php
  $userName = "Robin Reinvart";
  $fullTimeNow = date("d.m.Y H:i:s");
  $hourNow = date("H");
  $partOfDay = "hägune aeg";
  if($hourNow < 8){
	$partOfDay = "varane hommik";  
  }
?>

<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title>
   <?php
	echo $userName;
   ?>
   progreb veebi</title>
</head>
<body>
  <?php
	echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames ja ei sisalda tõsiseltvõetavat sisu!</p>
  <hr>
  <p>Lehe avamise hetkel oli aeg:
  <?php
  echo $fullTimeNow
  ?>
  .</p>
  <?php
    echo "<p> Lehe avamise hetkel oli $partOfDay. </p>";
  ?>
  <hr>
</body>
</html>