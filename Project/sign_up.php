<!DOCTYPE html> 
<html lang = "en">
<head>
<title>Sign-in</title>
<style type = "text/css">
body {
    background-color: #99ccff;
	width : 100%;
	height: 100%;
	alt :[];
  }
</style>
</head>
<body>
<h1 style="color:white;"><center>Sign In</center></h1>
<form style = "text-align:center;color:white;font-size:24px" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
	<br>
    Username:<br>
	<input type="text" name="username" size="15">
	<br>
    Password:<br>
	<input type="password" name="password" size="15" maxlength="15">
	<br>
	Confirm Password:<br>
	<input type="password" name="cpassword" size="15" maxlength="15">
	<br>
	<input type = "submit" name = "signup" value = "Sign Up">
</form>
 <?php
	if(isset($_POST["signin"]))
	{
	if(strlen($_POST["username"])==0)
	{
		echo "ERROR: Username cannot be empty.<br>";
	}
	else if(strlen($_POST["password"])==0)
	{
		echo "Error: Password cannot be empty.<br>"; 
	}
	else if(strlen($_POST["cpassword"])==0)
	{
		echo "Error: Confirm Password cannot be empty.<br>";
	}
    else if($_POST["password"]!=$_POST["cpassword"])
	{
		echo "Error: Passwords should match.<br>";
	}
	else
	{
		echo "Congratulations.<br>";

    }
	}
?>
</body>
</html>