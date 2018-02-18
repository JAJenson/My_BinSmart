<?php
// Array with names
// get the q parameter from 
$servername = "localhost";
$username = "testing";
$password = "K-itten123";
$dbname = "users";
if (isset($_REQUEST["q"])){
    $q = strtolower($_REQUEST["q"]);
    
}
$q = htmlspecialchars($q);
$q = trim($q);
$q = stripcslashes($q);

if (strpos($q, "@")){
    $r = '2';
} else{
    $r = '1';
}
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
$sql = "SELECT username, email FROM teacher_users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($q !== ""){
            if ($r == '1'){
                if (strtolower($row["username"]) == $q){
                    echo "This username is taken";
                }
            } elseif ($r == '2'){
                if (strpos($r, "@") == True){
                    if (strtolower($row["email"]) == $q){
                        echo "This Email is in use";
                    }
                }
            }
        }
    }
} else {
mysqli_close($conn);
}

?>