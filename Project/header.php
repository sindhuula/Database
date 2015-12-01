<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
body
{
background-color:#6666ff;
}
img {
    float:left;
	vertical-align:top;
    margin-top:0px;	
	white-space:nowrap;
	display:inline;
}
h1 {
    text-align:center;
	font-size: 72px;
	font-color:white;
	font-family:"Georgia";
    float:center ;
    align:center;
    vertical-align:top;
	display:inline;
}
</style>
</head>
<body>

<img src="Logo.png"; alt="Logo";height="15%";width="15%";style="float:left";>
<br><br>
<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	if(strlen($_SESSION["username"])!=0)
	{
		echo "<p align=right>Welcome:".$_SESSION["username"];
		echo "<br><right><a href=\"signout.php\">Sign out</a></right>"; 
	}
?>
<h1 style="color:white";>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLingoPedia</h1>
<a href = "start.html"; target = "main"; style = "float:right";><img src = "Home-Button.png" alt = "Home"></a>
</body>
</html>
