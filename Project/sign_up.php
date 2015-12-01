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
<h1 style="color:white;"><center>Sign Up</center></h1>
<form style = "text-align:center;color:white;font-size:24px" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	if(isset($_POST["signup"]))
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
		$servername = "localhost";
		$user = "root";
		$password = "";
		$dbname = "project";
		$conn = new mysqli($servername, $user, $password, $dbname);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$check = mysqli_real_escape_string($conn, $_POST["username"]);
		$sql = "SELECT * FROM users WHERE username = '$check'";
		if($result = mysqli_query($conn, $sql))
		{
		if (mysqli_num_rows($result) > 0) {
			echo "<center>Sorry username already exists. Try with a different username.</center>";
		} 
		else {
			$username = mysqli_real_escape_string($conn, $_POST["username"]);
			$password = mysqli_real_escape_string($conn, $_POST["password"]);	
			$sql = "INSERT INTO users (Username,Password) VALUES ('$username', '$password')";
			if(mysqli_query($conn, $sql)){
				echo "<br><center>Congratulations! You are now a member of LingoPedia<br>Redirecting you</center>";
				echo "<script>setTimeout(\"location.href = 'redirect.html';\",1500);</script>";
			} else{
				echo "<center>Something went wrong. Try Again</center>" . mysqli_error($conn);
			}
		}
		}
		else
		{
			echo "<center>Something went wrong.Try Again.</center>".mysqli_error($conn);
		}
$conn->close();		
    }
	}
?>
</body>
</html>