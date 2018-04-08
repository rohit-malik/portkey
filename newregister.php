<?php

if(isset($_SESSION['login_user'])){
	header("location: newprofile.php");
}

$hostname = "localhost";
$name= "root";
$password= "hello";

$db = mysqli_connect($hostname, $name, $password, "portkey");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully <br>";

$firstname =  mysqli_real_escape_string($db,$_POST['first_name']);
$lastname =  mysqli_real_escape_string($db,$_POST['last_name']);
$myusername = mysqli_real_escape_string($db,$_POST['user_name']);
$mypassword = mysqli_real_escape_string($db,$_POST['pass_word']); 
$year = mysqli_real_escape_string($db,$_POST['year']);
$batch = mysqli_real_escape_string($db,$_POST['batch']);

$sql3 = "SELECT user_id FROM authentication WHERE user_name = '$myusername'";
	$result = mysqli_query($db,$sql3);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];

	$count = mysqli_num_rows($result);

	
	if($count >= 1) {
 		//session_register("$myusername");
 		//$_SESSION['login_user'] = $myusername;
 		echo "Username Already Exists";
		echo "Enter a different username";
	}else{


$sql = "insert into authentication (user_name,password) values ('$myusername', '$mypassword')";
if ($db->query($sql) === TRUE) {
    echo "New record created successfully in authentication";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
$sql2 = "insert into user_info values((select user_id from authentication where user_name = '$myusername'),'$firstname','$lastname','$year','$branch')";
if ($db->query($sql2) === TRUE) {
    echo "New record created successfully in user info";
} else {
    echo "Error: " . $sql2 . "<br>" . $db->error;
}



header("location: newindex.php");
}

?>
