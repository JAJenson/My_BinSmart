<?php 

$Table = array("",
"dbcn",  "dbcr", "dbcpn", "dbca", "dbcs",
"dbhcn", "dbhcr","dbhcpn","dbhca","dbhcs",
"dbfcn", "dbfcr","dbfcpn","dbfca","dbfcs",  
"dbncn", "dbncr","dbncpn","dbnca","dbncs");
if (isset($_POST['taskname'])) {
	$Table[0]= $_POST['taskname']; # takes the variables from the table and checks that they exist and puts them into the $table array, empty or not.
	for($i=1;$i<21;$i++){
		$object = $Table[$i];
		if (isset($_POST[$object])){
			echo($i."<br>");
			$Table[$i] = $_POST[$object];
		}
	}
	$arraycast = array(array());
	$arraycast[1][0] = "DenBin";
	$arraycast[6][0] = "DenHexBin";
	$arraycast[11][0] = "DenBinFloat";
	$arraycast[16][0]= "DenBinNorm";
	print_r($Table);
	$stackcount = 0;
	for ($i=1;$i<17;$i=$i+5){
		if($Table[$i] == "on"){
			for($j=1;$j<5;$j++){
				$array[$j-1] =$Table[$i+$j];
			}
			$_SESSION[$arraycast[$i][0]] = $array;
			$arraycast[$i][1]= "ACTIVE";
			$Table[5] = $arraycast[$i][0];
		}
		else{
			$arraycast[$i][1]= "NULL";
		}
	}
	$createM = "";
	for ($i=1;$i<17;$i=$i+5){
		if ($arraycast[$i][1] == "NULL"){
			echo "array ".$arraycast[$i][0]." is void <br>";
			$stackcount++;
		}else if ($arraycast[$i][1] == "ACTIVE"){
			$createM = $createM.$arraycast[$i][0]." ";
			$_SESSION['TaskARGS'] =$createM;   
		}
	}
	if ($stackcount == 4){
		echo ('You did not select any tasks, pls go back :( <button><a href ="TeacherPage_v7.php">back</a></button>');
	}else{
	echo ($_SESSION['TaskARGS']);
	echo ("<br> ============================================== <br>");
	print_r($Table);
	echo ("<br>");
	print_r($arraycast);
	echo ("<br>");
	print_r($_SESSION['DenBin']);
	echo ("<br>");
	print_r($_SESSION['DenHexBin']);
	echo ("<br>");
	print_r($_SESSION["DenBinFloat"]);
	echo ("<br>");
	print_r($_SESSION["DenBinNorm"]);         
	}
}
?>