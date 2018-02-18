<?php
session_start();
$arraycast = $_SESSION['arraycast'];
for ($i=1;$i<21;$i=$i+6){
	if (strpos($_SESSION['TaskARGS'], $arraycast[$i][0])) {
		if ($arraycast[$i][0]== "DenBin"){
			DenBin();}
		if ($arraycast[$i][0]== "DenHexBin"){
			DenHexBin();}
		if ($arraycast[$i][0]== "DenBinFloat"){
			DenBinFloat();}
		if ($arraycast[$i][0]=="DenBinNorm"){
			DenBinNorm();}}}

Function DenBin() {
	$total =0;
	for($i=0;$i<5;$i++){
		$total = $total+$_SESSION['DenBin'][$i];}
	$DBQ = array(array());
	for($i =1;$i<=$total;$i++){ #generates all the random numbers for the total no of questions 
		$DBQ[$i][0] = mt_rand(5,255);
	}
	$post1=		  $_SESSION['DenBin'][0]+1;
	$post2=$post1+$_SESSION['DenBin'][1];
	$post3=$post2+$_SESSION['DenBin'][2];
	$post4=$post3+$_SESSION['DenBin'][3];
	$post5=$post4+$_SESSION['DenBin'][4];
	$post= array(1,$post1,$post2,$post3,$post4,$post5);
	for($i=0;$i<5;$i++){
		for($j=$post[$i];$j<$post[$i+1];$j++){
			if ($i == 0){$DBQ[$j][1] ="n";}
			if ($i == 1){$DBQ[$j][1] ="r";}
			if ($i == 2){$DBQ[$j][1] ="pn";}
			if ($i == 3){$DBQ[$j][1] ="a";}
			if ($i == 4){$DBQ[$j][1] ="s";}}}
	CQ("Bin", $DBQ);
}
Function DenHexBin() {
	$total =0;
	for($i=0;$i<5;$i++){
		$total = $total+$_SESSION['DenHexBin'][$i];
	}
	$DBQ = array(array());
	for($i =1;$i<=$total;$i++){ #generates all the random numbers for the total no of questions 
		$DBQ[$i][0] = mt_rand(5,255);
	}
	$post1=		  $_SESSION['DenHexBin'][0]+1;
	$post2=$post1+$_SESSION['DenHexBin'][1];
	$post3=$post2+$_SESSION['DenHexBin'][2];
	$post4=$post3+$_SESSION['DenHexBin'][3];
	$post5=$post4+$_SESSION['DenHexBin'][4];
	$post= array(1,$post1,$post2,$post3,$post4,$post5);
	for($i=0;$i<5;$i++){
		for($j=$post[$i];$j<$post[$i+1];$j++){
			if ($i == 0){$DBQ[$j][1] ="n";}
			if ($i == 1){$DBQ[$j][1] ="r";}
			if ($i == 2){$DBQ[$j][1] ="pn";}
			if ($i == 3){$DBQ[$j][1] ="a";}
			if ($i == 4){$DBQ[$j][1] ="s";}}}
	CQ("Hex", $DBQ);
}
Function DenBinNorm() {
	$total =0;
	for($i=0;$i<5;$i++){
		$total = $total+$_SESSION['DenBinNorm'][$i];
	}
	$DBQ = array(array());
	for($i =1;$i<=$total;$i++){ #generates all the random numbers for the total no of questions 
		$DBQ[$i][0] = mt_rand(5,255);
	}

	$post1=		  $_SESSION['DenBinNorm'][0]+1;
	$post2=$post1+$_SESSION['DenBinNorm'][1];
	$post3=$post2+$_SESSION['DenBinNorm'][2];
	$post4=$post3+$_SESSION['DenBinNorm'][3];
	$post5=$post4+$_SESSION['DenBinNorm'][4];
	$post= array(1,$post1,$post2,$post3,$post4,$post5);
	for($i=0;$i<5;$i++){
		for($j=$post[$i];$j<$post[$i+1];$j++){
			if ($i == 0){$DBQ[$j][1] ="n";}
			if ($i == 1){$DBQ[$j][1] ="r";}
			if ($i == 2){$DBQ[$j][1] ="pn";}
			if ($i == 3){$DBQ[$j][1] ="a";}
			if ($i == 4){$DBQ[$j][1] ="s";}}}
	CQ("Norm", $DBQ);
}
Function DenBinFloat() {
	$total =0;
	for($i=0;$i<5;$i++){
		$total = $total+$_SESSION['DenBinFloat'][$i];}
	$DBQ = array(array());
	for($i =1;$i<=$total;$i++){ #generates all the random numbers for the total no of questions 
		$DBQ[$i][0] = mt_rand(5,255);}
	$post1=		  $_SESSION['DenBinFloat'][0]+1;
	$post2=$post1+$_SESSION['DenBinFloat'][1];
	$post3=$post2+$_SESSION['DenBinFloat'][2];
	$post4=$post3+$_SESSION['DenBinFloat'][3];
	$post5=$post4+$_SESSION['DenBinFloat'][4];
	$post= array(1,$post1,$post2,$post3,$post4,$post5);
	for($i=0;$i<5;$i++){
		for($j=$post[$i];$j<$post[$i+1];$j++){
			if ($i == 0){$DBQ[$j][1] ="n";}
			if ($i == 1){$DBQ[$j][1] ="r";}
			if ($i == 2){$DBQ[$j][1] ="pn";}
			if ($i == 3){$DBQ[$j][1] ="a";}
			if ($i == 4){$DBQ[$j][1] ="s";}}}
	CQ("Float", $DBQ);
}
Function CQ($type, $array){
	$finalArray = array(array(array()));
	echo($type."<br>");
	if ($type =="Bin")  {
		print_r($_SESSION['DenBin'])."<br>";out($array);
		$i=1;
		$Active = True;
		while ($Active==True){
			while($array[$i][1]=="n"){
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary?";
				$array[$i][2] = format(decbin($array[$i][0]));
				if ($i<count($array))
				{
					$i++;
				}else{$Active= False;}
			}	
			while($array[$i][1]=="r"){
				$array[$i][1] = "what is ".format(decbin($array[$i][0]))." converted to denary?";
				$array[$i][2] = $array[$i][0];
				if ($i<count($array)){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="pn"){
				$array[$i][0] = mt_rand(-255,-5);
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary using 2's compliment?";
				$array[$i][2] = format(decbin($array[$i][0]));
				if ($i<count($array)){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="a"){
				$add =  mt_rand(0,(255-$array[$i][0]));
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary plus ".format(decbin($add)) ."?";
				$array[$i][2] = format(decbin( ($array[$i][0]+$add) ));
				if ($i<count($array)){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="s"){
				$sub =  mt_rand(5,$array[$i][0]);
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary subtract ".format(decbin($sub)) ." ?";
				$array[$i][2] = format(decbin( ($array[$i][0]-$sub) ));
				echo $array[$i][1]."<br>";
				echo $array[$i][2]."<br>";
				if ($i<count($array)-1){
					$i++;
				}else{$Active= False;}
			}
		}
	}


	if ($type =="Hex")  {print_r($_SESSION['DenHexBin'])."<br>";out($array);}
	if ($type =="Float"){print_r($_SESSION['DenBinFloat'])."<br>";out($array);}
	if ($type =="Norm") {print_r($_SESSION['DenBinNorm'])."<br>";out($array);}
echo "<br> .......".count($array)."<br>";
echo "<br>";
print_r($array);
echo "<br>";
}
Function format($string){
	$len = 8- strlen($string);
	while ($len>0){
		$string = "0".$string;
		$len = 8- strlen($string);
	}
	while(strlen($string) >8){
		$string=substr($string,1);
	}
	return($string);
}
Function out($array){
	echo ("<br>");
	for($i=1;$i<count($array);$i++){
		echo $array[$i][0]."<br>";
	}
	echo ("<br>");
}
?>