<?php
session_start();
?>
<!DOCTYPE html>
<html lang="eng">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type = "text/css" href ="stylesheet.css">
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
<style>
table, th, tr {
    border: 1px solid black;
    border-collapse: collapse;
     padding-bottom: 2%;
    }
th{
  align-content: center;
}
tr:nth-child(even) {
    background-color: #3a75ff;
}
.dropdown-content {
  padding-bottom:10%;
  padding-left:  10%;
  padding-right: 10%;
}
</style>
<?php
// Set session variables
if ($_SESSION['ID']>0){
    $ID = $_SESSION['ID'];
    $servername = "localhost";
    $username = "testing";
    $password = "K-itten123";
    $dbname = "users";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM teacher_users WHERE id = $ID";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {   
      $_SESSION["F"] = $row['firstname'];
      $_SESSION["L"] = $row['lastname'];
      $_SESSION["U"] = $row['username'];
      $_SESSION["TID"] = $row['TID'];
    }
    $t = $_SESSION["TID"];
}
?>
	<title>Teacher page</title>
</head>
<div class = "TopButtons">
<button type="button"> <a href="SignUpPage.html"> User Settings</a></button>
</div>
<h1 id ="front text"> Teacher Page </h1>
<h2>Welcome <?php echo ($_SESSION["F"]." ".$_SESSION["L"]." ".$_SESSION["TID"]);?></h2>
<body>

<div class="dropdown">
  <button class="dropbtn">My Tasks</button>
  <div class="dropdown-content">
    <?php 
    $sql = "SELECT * FROM teacher_task WHERE TID = '$t'";
    $result = $conn->query($sql);
    echo ("<table> <tr>Tasks</tr> <tr><th>Task Name</th> <th>taskdoc</th></tr>");
    while($row = mysqli_fetch_assoc($result)){
      echo "<tr><td>".$row["TaskName"]."</td><td>".$row["Qdoc"]."</td></tr>";
    }
    echo "</table>"; 
    ?>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn">Assign task to...</button>
  <div class="dropdown-content">
    <?php 
      $sql = "SELECT * FROM teachers_class WHERE TID = '$t'";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_assoc($result)){
        echo "<button onclick ='ToggleTable('ConfirmAssign')'>".($row["Class name"])."</button>";
        echo "<br>";
      }
    ?>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn" >Create Task</button>
  <div class="dropdown-content">
    <form action ="createtask_v7.php" method="post">
      <h3>Conversion</h3>
      <table align="centre" width = "1000">
        Task name: <input type="text" name="taskname">
        <tr>
          <th>Question type</th>
          <th></th>
          <th>Quantity</th>
          <th>Reverse convert</th> 
          <th> Positive and negative convert</th>
          <th>Addition and convert</th>
          <th>Subtraction and convert</th>
        </tr>
        <tr>
          <td>Denary to Binary</td>
          <td><input name="dbcn" type="checkbox"></td>

          <td><input name="dbq" type="number" min="0" max="20"></td>

          <td><input name="dbcr" type="number" min="0" max="20"></td>
          <td><input name="dbcpn" type="number" min="0" max="20"></td>
          <td><input name="dbca" type="number" min="0" max="20"></td>
          <td><input name="dbcs" type="number" min="0" max="20"></td>
        </tr>
        <tr>
          <td>Denary to Binary to Hex</td>
          <td><input name="dbhcn" type="checkbox"></td>

          <td><input name="dbhq" type="number" min="0" max="20"></td>

          <td><input name="dbhcr" type="number" min="0" max="20"></td>
          <td active="false"><input name="dbhcpn" type="number" min="0" max=20"></td>
          <td><input name="dbhca" type="number" min="0" max="20"></td>
          <td><input name="dbhcs" type="number" min="0" max="20"></td>
        </tr>
        <tr>
          <td>Denary to Binary Floating Point</td>
          <td><input name="dbfcn" type= "checkbox"></td>

          <td><input name="dbfq" type="number" min="0" max="20"></td>

          <td><input name="dbfcr" type= "number" min="0" max="20"></td>
          <td><input name="dbfcpn" type="number" min="0" max="20"></td>
          <td><input name="dbfca" type= "number" min="0" max="20"></td>
          <td><input name="dbfcs" type= "number" min="0" max="20"></td>
        </tr>
        <tr>
          <td>Denary to Binary Normalisation</td>
          <td><input name="dbncn" type="checkbox"></td>

          <td><input name="dbnq" type="number" min="0" max="20"></td>

          <td><input name="dbncr" type= "number" min="0" max="20"></td>
          <td><input name="dbncpn" type="number" min="0" max="20"></td>
          <td><input name="dbnca" type= "number" min="0" max="20"></td>
          <td><input name="dbncs" type= "number" min="0" max="20"></td>
        </tr>
      </table>
        <button class="TopButtons" type="submit">Create task</button>
      </form>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">My Classes</button>
  <div class="dropdown-content">
    <?php 
    $sql = "SELECT * FROM teachers_class WHERE TID = '$t'";
    $result = $conn->query($sql);
    echo ("<table> <tr>Classes</tr> <tr><th>Class Name</th> <th>Class Pass</th></tr>");
    while($row = mysqli_fetch_assoc($result)){
      echo "<tr><td>".$row["Class name"]."</td><td>".$row["Class Pass"]."</td></tr>";
    }
    echo "</table>"; 
    ?>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Create Class</button>
    <div class="dropdown-content">
      <form action='CreateClass.php' method="post">
        Class Name: <br>
        <input type="text" name = 'classname'><br>

        Class Password:<br>
        <input type="password" name='classpassword'><br>
        <button class = "TopButtons" id="sub" type ="submit">create class</button>
      </form>

    </div>
</div>
</body>
</html>