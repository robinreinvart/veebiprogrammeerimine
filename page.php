<?php
  $userName = "Robin Reinvart";
  $photoDir = "./photos/";
  $picFileTypes = ["image/jpeg", "image/png"];
  $fullTimeNow = date("d.m.Y H:i:s");
  $hourNow = date("H");
  
  $weekDaysET = ["esmaspäev", "teisipäev"]
  
  $partOfDay = "hägune aeg";
  if($hourNow < 8){
	$partOfDay = "varane hommik";
	}
	if($hourNow >= 8 and $hourNow < 10) {
	$partOfDay = "hommik";
	}
	if($hourNow >= 10 and $hourNow < 13) {
	$partOfDay = "lõuna";
	}
	if($hourNow > 13 and $hourNow < 17){
	$partOfDay = "pärastlõuna";
	}
	if($hourNow > 17 and $hourNow < 21){
	$partOfDay = "õhtu";
	}
	if($hourNow > 21 and $hourNow < 4){
	$partOfDay = "hiline õhtu";
	}
	if($hourNow >= 4 and $hourNow < 8) {
	$partOfDay = "öö";
	}
	
	//info semestri kulgemise kohta
	$semesterStart = new DateTime("2019-9-2");
	$semesterEnd = new DateTime ("2019-12-13");
	$semesterDuration = $semesterStart->diff($semesterEnd);
	$today = new DateTime("now");
	$fromSemesterStart = $semesterStart->diff($today);
	//var_dump($fromSemesterStart);
	$semesterinfoHTML = "<p>Siin peaks olema info semestri kulgemise kohta!</p>";
	$elapsedValue = $fromSemesterStart->format("%r%a");
	$durationValue = $semesterDuration->format("%r%a");
	//echo $testValue;
	//<meter min="0" max="155" value="33">Väärtus</meter>
	if($elapsedValue > 0){
		$semesterinfoHTML = "<p>Semester on täies hoos: ";
		$semesterinfoHTML .= '<meter min="0" max="' .$durationValue .'" ';
		$semesterinfoHTML .= 'value="' .$elapsedValue .'">';
		$semesterinfoHTML .= round($elapsedValue / $durationValue * 100, 1);
		$semesterinfoHTML .="</meter>";
		$semesterinfoHTML .="</p>";
		
	}

	//foto lisamine lehele
	$allPhotos = [];
	$dirContent = array_slice (scandir($photoDir), 2);
	//var_dump ($dirContent);
	foreach ($dirContent as $file){
		$fileInfo = getImagesize($photoDir .$file);
		//var_dump($fileInfo);
		if(in_array($fileInfo["mime"], $picFileTypes) == true){
			array_push($allPhotos, $file);
		}
	}
	
	//var_dump($allPhotos);
	$picCount = count($allPhotos);
	$picNum = mt_rand(0, ($picCount - 1));
	//echo $allPhotos[$picNum];
	$photoFile = $photoDir .$allPhotos[$picNum];
	$randomImgHTML = '<img src="' .$photoFile.'" alt="TLÜ Terra õppehoone">';
	
	//lisame lehe päise
	require("header.php");
		
?>

<body>
  <?php
	echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames ja ei sisalda tõsiseltvõetavat sisu!</p>
  <?php
    echo $semesterinfoHTML
  ?>
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
  <?php
  echo $randomImgHTML;
  ?>
</body>
</html>