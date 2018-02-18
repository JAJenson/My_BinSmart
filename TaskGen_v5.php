<?php
session_start();
$arraycast = $_SESSION['arraycast']; # this takes the seession variable which contains active arrays and calls function ofr active arrays
for ($i=1;$i<21;$i=$i+6){
	if (strpos($_SESSION['TaskARGS'], $arraycast[$i][0])) {
		if ($arraycast[$i][0]== "DenBin"){DenBin();}
		if ($arraycast[$i][0]== "DenHexBin"){DenHexBin();}
		if ($arraycast[$i][0]== "DenBinFloat"){DenBinFloat();}
		if ($arraycast[$i][0]=="DenBinNorm"){DenBinNorm();}}}
Function DenBin(){
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
	CQ("Bin", $DBQ);}
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
	CQ("Hex", $DBQ); } 
Function DenBinFloat() {
	$total =0;
	for($i=0;$i<5;$i++){	
		$total = $total+$_SESSION['DenBinFloat'][$i];
	}
	$DBQ = array(array());
	for($i =1;$i<=$total;$i++){ #generates all the random numbers for the total no of questions
		$integral = mt_rand(6, 255);
		$float = 0;
		$exponents_used = array();
		$binfloat =0;

		for($j=0;$j<8;$j++){
			$exponents_used[$j]=0;
		} 
		for($j=1;$j<8;$j++){
			$n = mt_rand(0, 7);
			if (in_array($n, $exponents_used)==False){
				$float = $float+ pow(2,-$n);
				$binfloat =$binfloat + pow(10, -$n); 
				$exponents_used[$n]= $n;
				$j++;
			}
		}
		$exp = max($exponents_used);
		$binfloat = (1 +$binfloat)*pow(10, $exp);$binfloat =substr($binfloat, 1);
		$DBQ[$i][1] =$integral; #interger val 
		$DBQ[$i][2] =$float;	#float num e.g. 0.x
		$DBQ[$i][3] =$binfloat; # binry of float
		$DBQ[$i][4] =$exp;		# exponent e.g. 8.25 ¦ 0100001 EXP[0010]
	}


	$post1=		  $_SESSION['DenBinFloat'][0]+1;
	$post2=$post1+$_SESSION['DenBinFloat'][1];
	$post3=$post2+$_SESSION['DenBinFloat'][2];
	$post4=$post3+$_SESSION['DenBinFloat'][3];
	$post5=$post4+$_SESSION['DenBinFloat'][4];
	$post= array(1,$post1,$post2,$post3,$post4,$post5);
	for($i=0;$i<5;$i++){
		for($j=$post[$i];$j<$post[$i+1];$j++){
			if ($i == 0){$DBQ[$j][0] ="n";}
			if ($i == 1){$DBQ[$j][0] ="r";}
			if ($i == 2){$DBQ[$j][0] ="pn";}
			if ($i == 3){$DBQ[$j][0] ="a"; }
			if ($i == 4){$DBQ[$j][0] ="s"; }}}
	CQ("Float", $DBQ);}
Function DenBinNorm() {
	$total =0;
	for($i=0;$i<5;$i++){
		$total = $total+$_SESSION['DenBinNorm'][$i];}
	$DBQ = array(array());
	for($i =1;$i<=$total;$i++){ #generates all the random numbers for the total no of questions 
		$DBQ[$i][0] = mt_rand(5,255);}
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
	CQ("Norm", $DBQ);}
Function CQ($type, $array){
	if ($type =="Bin"){
		$i=1;
		$Active = True;
		while ($Active==True){
			while($array[$i][1]=="n"){
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary?";
				$array[$i][2] = format(decbin($array[$i][0]));
				if ($i<count($array)-1)
				{
					$i++;
				}else{$Active= False;}
			}	
			while($array[$i][1]=="r"){
				$array[$i][1] = "what is ".format(decbin($array[$i][0]))." converted to denary?";
				$array[$i][2] = $array[$i][0];
				if ($i<count($array)-1){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="pn"){
				$array[$i][0] = mt_rand(-255,-5);
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary using 2's compliment?";
				$array[$i][2] = format(decbin($array[$i][0]));
				if ($i<count($array)-1){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="a"){
				$add =  mt_rand(0,(255-$array[$i][0]));
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary plus ".format(decbin($add)) ."?";
				$array[$i][2] = format(decbin( ($array[$i][0]+$add) ));
				if ($i<count($array)-1){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="s"){
				$sub =  mt_rand(5,$array[$i][0]);
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary subtract ".format(decbin($sub)) ." ?";
				$array[$i][2] = format(decbin( ($array[$i][0]-$sub) ));
				if ($i<count($array)-1){
					$i++;
				}else{$Active= False;}
			}
		}
	$_SESSION['DenBin']=$array;
	}
	if ($type =="Hex") {
		$i=1;
		$Active = True;
		while ($Active==True){
			while($array[$i][1]=="n"){
				$array[$i][1] = "what is ".$array[$i][0]." converted to Hexadecimal?";
				$array[$i][2] = dechex($array[$i][0]);
				if ($i<count($array)-1)
				{
					$i++;
				}else{$Active= False;}
			}	
			while($array[$i][1]=="r"){
				$array[$i][1] = "what is ".dechex($array[$i][0])." converted to denary?";
				$array[$i][2] = $array[$i][0];
				if ($i<count($array)-1){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="pn"){
				$array[$i][0] = mt_rand(-255,-5);
				$array[$i][1] = "what is ".$array[$i][0]." converted to Hexadecimal using 2's compliment?";
				$array[$i][2] = dechex($array[$i][0]);
				if ($i<count($array)-1){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="a"){
				$add =  mt_rand(0,(255-$array[$i][0]));
				$array[$i][1] = "what is ".$array[$i][0]." converted to Hex plus ".dechex($add) ."?";
				$array[$i][2] = dechex( ($array[$i][0]+$add) );
				if ($i<count($array)-1){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="s"){
				$sub =  mt_rand(5,$array[$i][0]);
				$array[$i][1] = "what is ".$array[$i][0]."subtract ".dechex($sub) ." converted to Hexadecimal?";
				$array[$i][2] = dechex( ($array[$i][0]-$sub) );
				if ($i<count($array)-1	){
					$i++;
				}else{$Active= False;}
			}
		}
	$_SESSION['DenHexBin']=$array;
	}
	if ($type =="Float"){
		$i=1;
		$Active = True;
		print_r($array);
		while ($Active==True){ 
			while($array[$i][0]=="n"){
				$a =$array[$i][1]+$array[$i][2];
				$array[$i][5] = "what is ".$a." converted to floating point binary with 4 bit exponent and 10 bit mantissa?";
				if ($i<count($array)-1 ){
					$i++;
				}else{$Active= False;}
			}	
			while($array[$i][0]=="r"){
				$array[$i][5] = "what is ".decbin($array[$i][1]).".".$array[$i][3]." [".decbin($array[$i][4])."] converted to floating point number?";
				if ($i<count($array)-1){
					$i++;
					echo($i);
				}else{$Active= False;}
			}
			while($array[$i][0]=="pn"){
				$array[$i][5] = "What is -".decbin($array[$i][1]).".".$array[$i][3]." [".decbin($array[$i][4])."] Converted to floating point binary with 4 bit exponent and 10 bit mantissa?";
				if ($i<count($array)-1 ){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][0]=="a"){
				$array[$i][5] = "What is -".decbin($array[$i][1]).".".$array[$i][3]." + ";
				if ($i<count($array)-1 ){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][0]=="s"){
				if ($i<count($array)-1	){
					$i++;
				}else{$Active= False;}
			}
		}
	$_SESSION['DenBinFloat']=$array; #this is a float question generator.
	} }
	#if ($type =="Norm") {print_r($_SESSION['DenBinNorm'])."<br>";out($array);}
Function format($string){
	$len = 8- strlen($string);
	while ($len>0){
		$string = "0".$string;
		$len = 8- strlen($string);
	}
	while(strlen($string) >8){
		$string=substr($string,1);
	}
	return($string);}
Function format32($string){

	$len = 32- strlen($string);
	while ($len>0){
		$string = "0".$string;
		$len = 32- strlen($string);
	}
	while(strlen($string) >32){
		$string=substr($string,1);
	}
	return($string);	}
Function out($array){
	echo ("<br>");
	for($i=1;$i<count($array);$i++){
		echo $array[$i][1]."<br>";
		echo $array[$i][2]."<br>";
	}
	echo ("<br>");}
?>