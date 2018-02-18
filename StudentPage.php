<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type = "text/css" href ="stylesheet2.css">
<script type="text/javascript">
function ToggleTable(table){
  var form = document.getElementById(table);
  if (form.style.display == 'block'){
    form.style.display = 'none';
  } else if(form.style.display == 'none'){
    form.style.display = 'block';
  }else{
    form.style.display = 'block';
  }

}
</script>
<?php
// Set session variables
if (isset($_REQUEST["ID"])){
    $ID = ($_REQUEST["ID"]);
	$_SESSION["ID"] = "$ID";
	$servername = "localhost";
	$username = "testing";
	$password = "K-itten123";
	$dbname = "users";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM student_users WHERE id = $ID";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)) {		
		$_SESSION["F"] = $row['firstname'];
		$_SESSION["L"] = $row['lastname'];
		$_SESSION["U"] = $row['username'];
		$_SESSION["Si"]= $row['sid'];
	}
}
?>
</head>
<body>
<h1>My name is <?php echo ($_SESSION["F"]." ".$_SESSION["L"]); ?></h1>
<button type="button" value= "display" onclick="ToggleTable('table')"><a>Show my details</a></button>
<br>
<div id = "table" hidden="True">
<table style="width:100%">
	<tr>
	<th>Student ID</th>
	<th>Firstname</th>
	<th>Lastname</th> 
	<th>Username</th>
	<th>Teacher ID</th>
	</tr>
	<tr>
	<td><?php echo ($_SESSION["ID"]) ?></td>
	<td><?php echo ($_SESSION["F"]) ?></td>
	<td><?php echo ($_SESSION["L"]) ?></td> 
	<td><?php echo ($_SESSION["U"]) ?></td>
	<td><?php echo ($_SESSION["Si"]) ?></td>
	</tr>
</table>
<br>
</div>
<div id="txtHint"><b>Task info will be listed here...</b></div>

</body>
</html>
