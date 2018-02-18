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
	CQ("Hex", $DBQ);}
Function DenBinFloat() {
	$total =0;
	for($i=0;$i<5;$i++){	
		$total = $total+$_SESSION['DenBinFloat'][$i];
	}
	$DBQ = array(array());
	for($i =1;$i<=$total;$i++){ #generates all the random numbers for the total no of questions
		$floatval =0;
		$predec =mt_rand(1, 255);
		$postdec =0;
		$postdec  =$predec.".".$floatval;
		$floatsum = 0;
		for($j=0;$j<6;$j++){
			$exp = mt_rand(1,6);
			checkex($exp, $i);
			$exp = -$exp; #negative exponent for mantissa gen
			$postdectemp = pow(2, $exp); #multiplied by +ve exp
			$postdec = $postdec + $postdectemp;
			$binexponent = decbin(-$exp);
			$floatsum = $floatsum +$postdectemp;
			echo("Your sum is ".$floatsum."<br>");
			echo("Post value is ".$postdectemp."<br>");
			echo ("Your total float is ".$postdec."<br>");
		}echo("<br> -------------------- <br>");
			$exp = strlen($floatsum)-2;
			echo("your new exponent is ".$exp." and this equated to a binary exponent of ".decbin($exp)."<br>");
			$a =$floatsum - floor($floatsum);
			$b = pow(10 ,$exp);
			$c = $a*$b;
			echo("_____".$a." ".$b." ".$c."<br>");
			echo ("<br>");
			floatfunc($a);
	}
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
		while ($Active==True){

			#for this array [0] is the random float
			#for this array [4] is the answer(binary) 
			#for this array [5] is the exponent  (binary valu)
			#for this array [] is the 
			print_r($array);
			while($array[$i][1]=="n"){
				$array[$i][3] = "what is ".$array[$i][0]." converted to floating point binary with 8 bit exponent and 32 bit mantissa?";
				$array[$i][2] = decbin($array[$i][2]);
				$array[$i][] = ($array[$i][0]*pow(10,$array[$i][2]));
				$array[$i][] = format(decbin($array[$i][2]));
				if ($i<count($array)-1 )
				{
					$i++;
				}else{$Active= False;}

			}	
			while($array[$i][1]=="r"){
				$array[$i][1] = "what is ".decbin($array[$i][0])." converted to floating point?";
				$array[$i][2] = $array[$i][0];
				if ($i<count($array)-1 ){
					$i++;
				}else{$Active= False;}	
			}
			while($array[$i][1]=="pn"){
				$array[$i][0] = mt_rand(-255,-5);
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary using 2's compliment and 8-bit mantissa?";
				$array[$i][2] = decbin($array[$i][0]);
				if ($i<count($array)-1 ){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="a"){
				$add =  mt_rand(0,(255-$array[$i][0]));
				$array[$i][1] = "what is ".$array[$i][0]." converted to binary plus ".decbin($add) ." with 8 bit mantissa?";
				$array[$i][2] = decbin( ($array[$i][0]+$add) );
				if ($i<count($array)-1 ){
					$i++;
				}else{$Active= False;}
			}
			while($array[$i][1]=="s"){
				$sub =  mt_rand(5,$array[$i][0]);
				$array[$i][1] = "what is ".$array[$i][0]."subtract ".decbin($sub) ." converted to floating point binary with 8-bit mantissa?";
				$array[$i][2] = decbin( ($array[$i][0]-$sub) );
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
Function floatfunc($decimal){
	echo("^^^^^^^".$decimal."<br>");
	$fbin = array();
	for($i=1;$i<7;$i++){
		if($decimal/pow(2,-$i)>=1){
			echo("PING AAAAAAAAAAAAQ<br>");
			$fbin[$i] =1;
			$decimal = $decimal -pow(2,-$i); 
		}else{$fbin[$i] =0;}
	}
	print_r($fbin);
	$decimal = 0;
	for($i=1;$i<7;$i++){
		$decimal= $decimal.$fbin[$i];
	}
	echo ($decimal);}
Function checkex($exponent, $i){
	}
?>