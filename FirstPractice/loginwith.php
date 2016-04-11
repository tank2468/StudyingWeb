<?php

session_start();
//Works the same way as GET method except POST make the data invisiable to the user
$username = @$_POST['username'];
$password = @$_POST['password'];

// if both condition of $username and $password is correct then we are going to connect it to the database!


if ($username && $password)
{
$connect = mysql_connect("localhost" , "root", "") or die("Could not connect!");

mysql_select_db("test") or die ("Could not find db");
// If user name has been type;
// This will print out all the user name; where

$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
//If not, error message here counting number of queries

//This line stores number of rows in query and echo (prints) it the number
$numrows = mysql_num_rows($query);

// The reason we keep track of the number of rows, is to keep track that the speicific user does exists and 
//excutes and if statement; if user is does not exists, print the else statement

if ($numrows!=0)
{
	// code to login ; Password check; fetching the info into an arrary 
	while ($row = mysql_fetch_assoc($query))
	{
		$dbusername = $row['username'];
		$dbpassword = $row['password'];

	}
	//Check to see if they match!
	if($username==$dbusername&&$password==$dbpassword)
	{
		echo "You are in! <a href='member.php'>Click</a> here to enter the member page.";
		@$_SESSION['username']=$username;
		
	}
	else
		echo "Incorrect password!";
}
else
	die("That user doesn't exists!");


// echo $numrows;


}

else
	die("Please enter and username and a password");



	



?>