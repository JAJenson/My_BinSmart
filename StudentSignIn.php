<?php
$servername = "localhost";
$username = "testing";
$password = "K-itten123";
$dbname = "users";

if(isset($_POST['username']) and isset($_POST['password'])){
	$un = clean_input($_POST['username'], "Your user name");
	$pw = clean_input($_POST['password'], "Your password");
}

$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT username, login, id FROM student_users";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    if ($row["username"] == $un and $row["login"] == $pw){
    	echo "welcome";
    	$id = $row["id"]; 
    	header('Location: StudentPage.php?ID='.$id);
    }else if ($row["username"] !== $un or $row["login"] !== $pw){
    	echo "Username / Password is incorrect";
    	
    }
}
mysqli_close($conn);

Function clean_input($subject, $varPhrase){ 
	if (strlen($subject) == 0){
	echo "Whoops, you seem to have missed out $varPhrase when signing up. <br>";
	} else{
	$subject = htmlspecialchars($subject);
	$subject = trim($subject);
	$subject = stripcslashes($subject);
	return ($subject);
	}
}
?>