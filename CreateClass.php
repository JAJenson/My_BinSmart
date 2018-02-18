<?php
$servername = "localhost";
$username = "testing";
$password = "K-itten123";
$dbname = "users";
session_start();
$TID = $_SESSION["TID"];
if(isset($_POST['classname']) and isset($_POST['classpassword'])) {
	$classname = clean_input($_POST['classname'], "Your class name");
	$classpass = clean_input($_POST['classpassword'], "Your class password");
	echo ($classname." ".$classpass." ".$TID);
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "INSERT INTO teachers_class (`Class Pass`, `Class name`, `TID`) VALUES ('$classpass', '$classname','$TID')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	echo "<button href='TeacherPage_v6.php?ID='>back</button>";
}
Function clean_input($subject, $varPhrase){ 
	if (strlen($subject) == 0){
	echo "Whoops, you seem to have missed out $varPhrase when creating a class. <br>";
	} else{
	$subject = htmlspecialchars($subject);
	$subject = trim($subject);
	$subject = stripcslashes($subject);
	return ($subject);
	}
}
?>