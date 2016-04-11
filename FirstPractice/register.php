<?php

echo "<h1>Register</h1>";

@$submit = $_POST['submit'];
//form data
@$fullname = strip_tags($_POST['fullname']);
@$username = strip_tags($_POST['username']);

@$password = strip_tags($_POST['password']);
@$repeatpassword = strip_tags($_POST['repeatpassword']);
@$date = date("Y-m-d");
// If user has clicked on the submit botton; 

if ($submit)
{
//Check for existance; If fullname, username, password and repeatpassword was enterned, then
if($fullname&&$username&&$password&&$repeatpassword)
{
	
	
	if($password==$repeatpassword)
	{
		//check char length of username and fullname
		if(strlen($username)>25 || strlen($fullname) >25)
		{
			echo "Your username or fullname is too long! Please keep in within 25 character";
			
		}
		else
		{
			if(strlen($password)>25 || strlen($password) <6)
			{
				echo "Password must be between 6 and 25 characters";


			}
			else
			{
			//register the user!	
			
			//Encrypting password 
			$password = md5($password);
			$repeatpasswordd = md5($repeatpassword);
				
			echo "You have created account successfully!";
			//open database
			
			$connect = mysql_connect("localhost" , "root", "") or die("Could not connect!");
			mysql_select_db("cpsc471proj");
				
			$queryreg = mysql_query(" INSERT INTO users VALUES ('','$fullname','$username','$password','$date')
			
			
			");
			
				die("You have been registered! <a href ='testing.html'>Return to login page</a>");
			}
		


		}
		
		
		
	}
	else //This message will be reached once password does not match repeatpassword
		echo "Your password do not match!";
}
else
	echo "Please fill in <b>all</b> fields!";
}





?>

<html>
 <p>
<form action='register.php' method ='POST'>
	<table>
			<!-- rows -->
			<tr>
				<!--Coumln -->
				<td>
				Your full name:
				</td>
				<td>
				<input type='text' name='fullname' value ='<?php echo $fullname; ?>' >
				
				</td>
			
			</tr>
			
			<tr>
				<!--Coumln -->
				<td>
				Choose a username:
				</td>
				<td>							   <!-- This line starting from value will prevent users from retyping same info-->
				<input type='text' name='username' value ='<?php echo $username; ?>' >
				
				</td>
			
			</tr>
			
			<tr>
				<!--Coumln -->
				<td>
				Choose a password:
				</td>
				<td>
				<input type='password' name='password'>
				
				</td>
			
			</tr>
			
						<tr>
				<!--Coumln -->
				<td>
				Repeat your password:
				</td>
				<td>
				<input type='password' name='repeatpassword'>
				
				</td>
			
			</tr>
	
	</table>
	<p>
	<input type='submit' name='submit' value='Register'>
</form>

</html>