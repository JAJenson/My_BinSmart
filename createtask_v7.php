<?php 
session_start();
$Table = array("",
"dbcn",  "dbq", "dbcr", "dbcpn", "dbca", "dbcs",
"dbhcn", "dbhq", "dbhcr","dbhcpn","dbhca","dbhcs", 
"dbfcn", "dbfq", "dbfcr","dbfcpn","dbfca","dbfcs",
"dbncn", "dbnq", "dbncr","dbncpn","dbnca","dbncs");
if (isset($_POST['taskname'])) {if (strlen($_POST['taskname']) >0){ 
	$Table[0]= $_POST['taskname'];
	for($i=1;$i<25;$i++){

		$object = $Table[$i];
		if (isset($_POST[$object])){
			$Table[$i] = $_POST[$object];}}

	$arraycast = array(array());
	$arraycast[1][0] = "DenBin";
	$arraycast[7][0] = "DenHexBin";
	$arraycast[13][0] = "DenBinFloat";
	$arraycast[19][0]= "DenBinNorm";
	$stackcount = 0;
	
	for ($i=1;$i<21;$i=$i+6){
		if($Table[$i] == "on"){
			if ($Table[$i+1] > 0){
				for($j=1;$j<6;$j++){ $array[$j-1] =$Table[$i+$j]; }
				$_SESSION[$arraycast[$i][0]] = $array;
				$arraycast[$i][1]= "ACTIVE";
				$Table[5] = $arraycast[$i][0];}
			else{$arraycast[$i][1]= "NULL";}
		}else{$arraycast[$i][1]= "NULL";}
	}
	$createM = "_"; # tag filler to ensure isset() detects any instance of DenBin in session variable

	for ($i=1;$i<21;$i=$i+6){
		if ($arraycast[$i][1] == "NULL"){
			echo "array ".$arraycast[$i][0]." is void <br>";
			$stackcount++;}
		else if ($arraycast[$i][1] == "ACTIVE"){
			$createM = $createM.$arraycast[$i][0]." ";
			$_SESSION['TaskARGS'] =$createM; }
	}
	if ($stackcount == 4){
		echo ('You did not select any tasks, pls go back :( <button><a href ="TeacherPage_v7.php">back</a></button>');}else{} 

}else{echo ("You need to name your task.");}}#update log:next step is to add validation of the quantity row ensuring if on that >0
echo('
<table style="width:100%">
<h3> Summary of demand</h3>
  <tr>
    <th>Task Type</th>
    <th>Conversions</th> 
    <th>Total Quantity</th>
  </tr>');
  
for ($i=1;$i<21;$i=$i+6){
	$var = array("Normal","Reverse","Positive and negative integer","Addition","Subtraction");
	$conversion="";
	$total = 0;
	if (strpos($_SESSION['TaskARGS'], $arraycast[$i][0])) {

		for($j=0;$j<5;$j++){
			if($_SESSION[$arraycast[$i][0]][$j]>0){
				$conversion = $conversion.$var[$j]." ";
			}else{$_SESSION[$arraycast[$i][0]][$j] = 0;}
			$total = $total+$_SESSION[$arraycast[$i][0]][$j];
		}
	}
	$name =$arraycast[$i][0];
	echo("
	<tr>
	    <td>$name</td>
	    <td>$conversion</td> 
	    <td>$total</td>
  	</tr>");
}
echo('</table>');
$_SESSION['arraycast'] = $arraycast;
echo('<h3>Do you wish to create the task with the following attributes?</h3> <button><a href ="TaskGen_v6.php">Yes</a></button>
	<button><a href ="TeacherPage_v7.php">No</a></button>');
?>
