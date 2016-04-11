<?php

session_start();
error_reporting (E_ALL ^ E_NOTICE);

if($_SESSION['username'])

	echo "WELCOME, ".$_SESSION['username']."!<br><a href='logout.php'>Logout</a>";

else
	die ("You must be logged in!");
	
	

?>