<?php
session_start();
$_SESSION["username"] = "";
?>
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
<form style = "text-align:center;color:white;font-size:24px" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<br>
    Username:<br>
	<input type="text" name="username" size="15">
	<br><br>
    Password:<br>
	<input type="password" name="password" size="15" maxlength="15">
	<br>
	
	<input type = "submit" name = "signin" value = "Sign In">
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
	else
	{
		$servername = "localhost";
		$user = "root";
		$password = "";
		$dbname = "project";
		$conn = new mysqli($servername, $user, $password, $dbname);
		if ($conn->connect_error) {
		session_destroy();
		die("Connection failed: " . $conn->connect_error);
		}
		$check = mysqli_real_escape_string($conn, $_POST["username"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"]);
		$sql = "SELECT * FROM users WHERE username = '$check' AND password = '$password'";
		if($result = mysqli_query($conn, $sql))
		{
		if (mysqli_num_rows($result) > 0) {
		$_SESSION["username"] = $_POST["username"];
		echo "<script>setTimeout(\"location.href = 'redirect.html';\",500);</script>;	
		<script>
			parent.head.location.href = \"header.php\";
		</script>";
		} 
		else
		{
			echo "<center>Sorry we couldn't find your record. Try Again.</center>";
			session_destroy();
			echo "<script>\"location.href = 'signin.php';\"</script>";	
		}
    }
    }
	}
	?>
</body>
</html> 