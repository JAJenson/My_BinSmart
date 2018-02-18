<?php 

$name =""; 
$dbnum =""; $dbrev =""; $dbcpn =""; $dbca =""; $dbcs ="";
$dbhnum =""; $dbhrev =""; $dbhpos =""; $dbhca =""; $dbhcs ="";
$dbfcnum =""; $dbfcrev =""; $dbfcpos =""; $dbfca =""; $dbfcs ="";
$dbnnum =""; $dbnrev =""; $dbnpos =""; $dbnca =""; $dbncs ="";

if (isset($_POST['taskname'])){
	$name =clean_input($_POST['taskname'], "on the task name");
	if(isset($_POST['dbcn'])){
		$dbnum =clean_input($_POST['dbcn'], "on the quantity");
		if (isset($_POST['dbcr']) ){
			$dbrev = $_POST['dbcr'];
		}
		if (isset($_POST['dbcpn'])){
			$dbcpn = $_POST['dbcpn'];
		}
		if (isset($_POST['dbca'])){
			$dbca = $_POST['dbca'];
		}
		if (isset($_POST['dbcs'])){
			$dbcs = $_POST['dbcs'];
		}
	}
	if(isset($_POST['dbhcn'])) {
		$dbhnum =clean_input($_POST['dbhcn'], "on the quantity");
		if(isset($_POST['dbhcr'])) {
			$dbhrev =$_POST['dbhcr'];
		}
		if (isset($_POST['dbhcpn'])){
			$dbhpos =$_POST['dbhcpn'];
		}
		if (isset($_POST['dbhca'])){
			$dbhca = $_POST['dbhca'];
		}
		if (isset($_POST['dbhcs'])){
			$dbhcs = $_POST['dbhcs'];
		}
	}
	if(isset($_POST['dbfcn'])){
		$dbfcnum =clean_input($_POST['dbfcn'], "on the quantity");
		if(isset($_POST['dbfcr'])){
			$dbfcrev =$_POST['dbfcr'];
		}
		if (isset($_POST['dbfcpn'])){
			$dbfcpos =$_POST['dbfcpn'];
		}
		if (isset($_POST['dbfca'])){
			$dbfca = $_POST['dbfca'];
		}
		if (isset($_POST['dbfcs'])){
			$dbfcs = $_POST['dbfcs'];
		}
	}
	if(isset($_POST['dbncn'])){
		$dbnnum =clean_input($_POST['dbncn'], "on the quantity");
		if( isset($_POST['dbncr'])){
			$dbnrev =$_POST['dbncr'];
		}
		if (isset($_POST['dbncpn'])){
			$dbnpos =$_POST['dbncpn'];
		}
		if (isset($_POST['dbnca'])){
			$dbnca = $_POST['dbnca'];
		}
		if (isset($_POST['dbncs'])){
			$dbncs = $_POST['dbncs'];
		}
	}
}
$questionconfig = array($name, 
	$dbnum, $dbrev, $dbcpn, $dbca, $dbcs, 
	$dbhnum, $dbhrev, $dbhpos, $dbhca, $dbhcs, 		# This array acts as a hub for all variables that are passed from the tabel to the PHP script
	$dbfcnum, $dbfcrev, $dbfcpos, $dbfca, $dbfcs, 	# It holds all the variables from the tabel in order, but not indexed
	$dbnnum, $dbnrev, $dbnpos, $dbnca, $dbncs);		#
print_r ($questionconfig);
$k = 0;
$j = 0;

for($i=0; $i <count($questionconfig); $i++){ #tag marker addas all the tags to all the values when something is present, 
	if (strlen($questionconfig[$i])>0){ #otherwise the index will continue to increase, so that all values are in order
		$temp = $questionconfig[$i];
		$temp = $temp."@$k"."#$j";
		echo $temp."<br>";
		$questionconfig[$i] = $temp;
	}
	$j++;
	if ($i <18){
		if (is_numeric($questionconfig[$i+1])){
			$j = 0;
			$k++;
		}
	}
}
$i = 0;
$args = array();
foreach($questionconfig as $index){
	if (strlen($index)>0){
		$args[$i] = $index;
		$i++;
	}
}
print_r($args);

$i=0;
$DenBin = array();
$DenHexBin = array();
$DenBinFloat = array();
$DenBinNorm = array();
$_SESSION['array1'] =$DenBin;
$_SESSION['array2'] =$DenHexBin;
$_SESSION['array3'] =$DenBinFloat;
$_SESSION['array4'] =$DenBinNorm;

$i=0; $j=0; $k=0; $l=0;
foreach($args as $index){
	if (strpos($index, "@1")){
		$DenBin[$i] = $index;
		$i++;
	}
	if (strpos($index, "@2")){
		$DenHexBin[$j] = $index;
		$j++;
	}
	if (strpos($index, "@3")){
		$DenBinFloat[$k] = $index;
		$k++;
	}
	if (strpos($index, "@4")){
		$DenBinNorm[$l] = $index;
		$l++;
	}
}
OutKey($DenBin, 1);		
OutKey($DenHexBin, 2);
OutKey($DenBinFloat, 3);
OutKey($DenBinNorm, 4);
echo("---------------------------------------------------------------<br>");
print_r($_SESSION['array1']);
echo "<br>";
print_r($_SESSION['array2']);
echo "<br>";
print_r($_SESSION['array3']);
echo "<br>";
print_r($_SESSION['array4']);
echo "<br>";

if (count($_SESSION['array1'])>0){
	DenBin($_SESSION['array1']);
}
if (count($_SESSION['array2'])>0){
	DenHex($_SESSION['array2']);
}
if (count($_SESSION['array3'])>0){
	DenFloat($_SESSION['array3']);
}
if (count($_SESSION['array4'])>0){
	DenNorm($_SESSION['array4']);
}

Function DenBin($array){
	mt_rand(4,255);
	$castquantity = round($array[2]*(1/3));
	echo $castquantity."<br>";
	$remaining = $array[2] - $castquantity;
	echo $remaining."<br>";
	if (strlen($array[0]) >0){
		if(strpos($array[0], "reverse")){
		}
		if(strpos($array[0], "positive and negative")){
		}
		if(strpos($array[0], "addition")){
		}
		if(strpos($array[0], "subtraction")){
		}	

		#should take the $remaining value and randomly split in into random sections for each option
	} 
}
Function DenHex($array){
	mt_rand(4,255);
	$castquantity = $array[2]*(1/3);
	echo $castquantity;	
}
Function DenFloat($array){
	mt_rand(4,255);
	$castquantity = $array[2]*(1/3);
	echo $castquantity;
}
Function DenNorm($array){
	mt_rand(4,255);
	$castquantity = $array[2]*(1/3);
	echo $castquantity;
}
Function JoinProperties($CategoryNumber,$Message, $Quantity ){ #For each true value, the propertie must be added to an array that
	$GenData= array();
	$GenData[0] = $Message;
	if($CategoryNumber == 1){#contains the quantity and activated properties
		$GenData[1] = "_db_";
		$GenData[2] = $Quantity;
		$_SESSION['array1'] = $GenData;
	}
	if($CategoryNumber == 2){
		$GenData[1] = "_dhexbinary_";
		$GenData[2] = $Quantity;
		$_SESSION['array2']= $GenData;
	}
	if($CategoryNumber == 3){
		$GenData[1] = "_dbfloat_";
		$GenData[2] = $Quantity;
		$_SESSION['array3'] = $GenData;
	}
	if($CategoryNumber == 4){
		$GenData[1] = "_dbnormal_";
		$GenData[2] = $Quantity;
		$_SESSION['array4'] = $GenData;		
	} 
}
Function OutKey($array, $CategoryNumber){
	$dataMessage="";
	for ($i=0; $i <count($array);$i++) {
		if(strpos($array[$i], "#1")){
			$dataMessage = $dataMessage."_reverse_";
		}
		if(strpos($array[$i], "#2") ){
			$dataMessage=$dataMessage."_positive and negative_";
		}
		if(strpos($array[$i], "#3") ){
			$dataMessage= $dataMessage."_addition_";
		}
		if(strpos($array[$i], "#4") ){
			$dataMessage= $dataMessage."_subtraction_";
		}
	}
	$i=1;
	$Quantity = trim($array[0], "#0");
	for ($i=1; $i<5;$i++){
		$Quantity = str_replace("@".$i, "", $Quantity);
	}
	if($Quantity > 0 or strlen($Quantity)>0){
		JoinProperties($CategoryNumber, $dataMessage, $Quantity);
		echo ($dataMessage);
		echo("<br>");
	}else{
		echo "NO ACTIVE QUANTITY, GEN VOID FOR $CategoryNumber.<br>";
	}
} 	 	 
Function clean_input($subject, $varPhrase){ 
	if (strlen($subject) == 0){
	echo "Whoops, you seem to have missed out $varPhrase when creating a task. <br>";
	} else{
	$subject = htmlspecialchars($subject);
	$subject = trim($subject);
	$subject = stripcslashes($subject);
	return ($subject);
	}
}
?>