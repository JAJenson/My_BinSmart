<?php
session_start();
$arraycast = $_SESSION['arraycast'];
$var = array("Normal","Reverse","Positive and negative integer","Addition","Subtraction");
for ($i=1;$i<21;$i=$i+6){
	if (strpos($_SESSION['TaskARGS'], $arraycast[$i][0])) {
		if ($arraycast[$i][0]== "DenBin"){
			DenBin();
		}
		if ($arraycast[$i][0]== "DenHexBin"){

		}
		if ($arraycast[$i][0]== "DenBinFloat"){

		}
		if ($arraycast[$i][0]=="DenBinNorm"){

		}

	}
}
Function DenBin() {
	$total =0;
	for($i=0;$i<5;$i++){
		$var[$i]= $_SESSION['DenBin'][$i];
		$total = $total+$_SESSION['DenBin'][$i];
	}
	$DBQ = array(array());
	for($i =1;$i<=$total;$i++){ #generates all the random numbers for the total no of questions 
		$DBQ[$i][0] = mt_rand(7,255);
		echo($DBQ[$i][0]."<br>"); 
	}
	print_r($_SESSION['DenBin']);
	echo "<br>"; 
	print_r($DBQ);
	$post1=		  $_SESSION['DenBin'][0];
	$post2=$post1+$_SESSION['DenBin'][1]-1;
	$post3=$post2+$_SESSION['DenBin'][2]-1;
	$post4=$post3+$_SESSION['DenBin'][3]-1;
	$post5=$post4+$_SESSION['DenBin'][4]-1;
	echo("======= <br>");
;	for($i=1; $i<=$post1;$i++){
		echo ($DBQ[$i][0]." ");
	}
	echo " AAAAAA <br>";
	for($i=$post1;$i<=$post2;$i++){
		echo ($DBQ[$i][0]." ");
	}
	echo " AAAAAA <br>";
	for($i=$post2;$i<=$post3;$i++){
		echo ($DBQ[$i][0]." ");
	}echo " AAAAA <br>";
	for($i=$post3;$i<=$post4;$i++){
		echo ($DBQ[$i][0]." ");
	}echo "AAAAAA <br>";
	for($i=$post4;$i<=$post5;$i++){
		echo ($DBQ[$i][0]." ");
	}echo " AAAAAAA 	<br>";
}

?>