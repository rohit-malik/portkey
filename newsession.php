<?php
$hostname = "localhost";
$name= "root";
$password= "hello";

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$db = mysqli_connect($hostname, $name, $password, "portkey");

session_start();// Starting Session

$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User

$ses_sql=mysqli_query($db, "SELECT user_name FROM authentication WHERE user_name = '$user_check'");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session =$row['user_name'];
if(!isset($login_session)){
	mysqli_close($db); // Closing Connection
	header('Location: newindex.php'); // Redirecting To Home Page
}
?>
