<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else{
		$hostname = "localhost";
		$name= "root";
		$password= "hello";

		$db = mysqli_connect($hostname, $name, $password, "portkey");

		if (!$db) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		echo "Connected successfully <br>";

		//session_start();
		   
		// username and password sent from form 

		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

		$sql = "SELECT user_id FROM authentication WHERE user_name = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
			
		if($count == 1) {
	 		//session_register("$myusername");
	 		//$_SESSION['login_user'] = $myusername;
			$_SESSION['login_user']=$myusername; // Initializing Session
	 		echo "Login successsful";
	 		header("location: newprofile.php");
		}else {
			echo "Login unsuccessful";
	 		$error = "Your Login Name or Password is invalid";
		}
		mysqli_close($connection); // Closing Connection
	}
}
?>
