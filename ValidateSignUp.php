<?php
$emailvalidate = True;
$unvalidate = True;
if(isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['username']) and isset($_POST['email']) and isset($_POST['confirme']) and isset($_POST['password']) and isset($_POST['confirmp']) and isset($_POST['studentID']) and isset($_POST['classname']) and isset($_POST['classpassword']))
//with the implementation of the function clean_input() we can reduce statements and only need to check for presence here before we do anything else with the forum data.
{
	$fn = clean_input($_POST['firstname'], "Your First name");
	$ln = clean_input($_POST['lastname'], "Your Last name");
	$un = clean_input($_POST['username'], "Your user name");
	$email = clean_input($_POST['email'], "Your Email address");
	$conemail = clean_input($_POST['confirme'], "Your confirmed Email");
	$pw = clean_input($_POST['password'], "Your password");
	$cpw = clean_input($_POST['confirmp'], "Your confirmed Password");
	$sid = clean_input($_POST['studentID'], "Your class name");
	$classn = clean_input($_POST['classname'], "Your class name");
	$classp = clean_input($_POST['classpassword'], "Your class password");
	if($email !== $conemail and $pw !== $cpw){
		echo "Oh no! both your Email and password dont match their confirmation, can you retry";
	}elseif ($email !== $conemail){
		echo "Sorry, your email and confirmed Email dont match up";
	} elseif ($pw !== $cpw){
		echo "Whoops! Your password and confirmed password dont match up";
//-------------------checks that emails and passwords match up after cleaning inputs and ensuring they exist------------------
	}else{
	$servername = "localhost";
	$username = "testing";
	$password = "K-itten123";
	$dbname = "users";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT 'username', 'email'  FROM student_users";
	$result = mysqli_query($conn, $sql);
	    while($row = mysqli_fetch_assoc($result)) {
	        if ($row["username"] == $un){
	        	echo "this user allready exists";
	        	$unvalidate = False;
	        }elseif ($row["email"] == $email){
	        	echo "this email is in use";
	        	$emailvalidate = False;
	       }
	    }
//---------------check that email and username are not taken -------------------------------------
	$IDConfirm = False;
    $sql = "SELECT Class name', 'Class Pass' FROM teachers_class";
	$result = mysqli_query($conn, $sql);
	    while($row = mysqli_fetch_assoc($result)) {
	    	if($row['Class name'] == $classn){
	    		if($row['Class pass'] == $classp){
	    			$IDConfirm = True;
	    		}
	    	}
		}
	}
}
if ($unvalidate==True and $emailvalidate ==True and $IDConfirm == True){
    $servername = "localhost";
	$username = "testing";
	$password = "K-itten123";
	$dbname = "users";
	$TID = "";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "INSERT INTO `student_users`(`firstname`, `lastname`, `email`, `login`, `username`, `sid`) 
			VALUES ('$fn', '$ln', '$email', '$pw', '$un', '$sid')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	header('Location: \FrontPage.html');

}

// this set of 'if' statements are used to check that the variable we are trying to '$_post' from do infact exist and then sets them to variable names in the php script for sanitisation in later development.
// the htmlspecialchars() function makes the user's input more robust and prevents xss attacks wich mak break the code of the website.
//this is used in the checking process of the varibles existence as it is the first line of exploit that an XSS script could cause damage, so this is a 'steralisation' of the inputs making them impotent.
Function clean_input($subject, $varPhrase){ //by putting all the inputs into a function that sanitises the input we can save using as many "if" statements and improve function of the program
//this statements is used to check that all the fields have at least something in them, otherwise it will give them the message.
	if (strlen($subject) == 0){
	echo "Whoops, you seem to have missed out $varPhrase when signing up. <br>";
	} else{
	$subject = htmlspecialchars($subject);
	$subject = trim($subject);
	$subject = stripcslashes($subject);
	return ($subject);
	}
}

//this statemnt set is to validate that both the username and password exist, otherwise it will void the user of creating an account.

//TIMESTAMP 12/09/17
?>
<html>
<button type="button"> <a href="StudentSignUp.html">go back</a></button>
</html>