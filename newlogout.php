<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
	header("Location: newindex.php"); // Redirecting To Home Page
}
?>
