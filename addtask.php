<?php
session_start();
$t = $_SESSION['TID'];
$conn = $servername = "localhost";
$username = "testing";
$password = "K-itten123";
$dbname = "users";
$array = array("DES","PA","CITO","NANANANANANA","SOMETHING DESPACITO","DUNNANANNANANANA","DESPACIITO","¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦¦");
$a =serialize($array);
	$sql = "INSERT INTO teacher_task (`TID`,`TaskName`,`Qdoc`) VALUES ('$t','lol','$a')";
 	$conn=mysqli_connect($servername, $username, $password, $dbname);
	mysqli_query($conn, $sql);
	mysqli_close($conn);
echo ("<br>aaaaaaaaaaaaaaaaaaaaaaaa<br>");

$conn=mysqli_connect($servername, $username, $password, $dbname);
$sql="SELECT * from teacher_task";
$q=mysqli_query($conn,$sql);
while($rs=mysqli_fetch_assoc($q))
{
$array= unserialize($rs['Qdoc']);
print_r($array);
}
 ?>