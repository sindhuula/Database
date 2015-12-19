<?php
session_start();
?>
<!DOCTYPE html> 
<html lang = "en">
<head>
<title>Options</title>
<style type = "text/css">
body {
    background-color: #99ccff;
	width : 100%;
	height: 100%;
	alt :[];
  }
  p{
	  color:white;
	  font-size: 24px;
  }
  table{
	color:white;
	font-size: 24px;
    border-color: #6666ff;
  }
  td {
  text-align: center;
  vertical-align: middle;
}
a:link {
    color: white;
    background-color: transparent;
    text-decoration: none;
}
a:visited {
    color: white;
    background-color: transparent;
    text-decoration: none;
}
a:hover {
    color: black;
    background-color: transparent;
    text-decoration: none;
}
a:active {
    color: plum;
    background-color: transparent;
    text-decoration: none;
}
ul.mainmenu {
    list-style: none;
	font-size:24px
	}


ul.mainmenu li a {
    text-decoration: none;
    color: white;
	font-size:24px
    padding: 0.25em;
}

ul.mainmenu li a:hover {
    background: #6666ff;
}

ul.mainmenu li ul.submenu {
    list-style: none;
	font-size:24px;
    display: none;
}

ul.mainmenu li:hover > ul.submenu {
    position: relative;
    display: inline-block;
}
</style>
</head>
<body>
<h1 style="color:white;"><center>Select an option</center></h1>
<ul class="mainmenu">
    <li><a href=#?>Print Queries</a>
      <ul class="submenu">
                <li><a href="?link=1" name="link1">Query 1</a></li>
                <li><a href="?link=2" name="link2">Query 2</a></li>
                <li><a href="?link=3" name="link3">Query 3</a></li>
                <li><a href="?link=4" name="link4">Query 4</a></li>    
            </ul>
    </li>
	<br>
	<br>
	<br>
    <li><a href=#?id=2>Generate Reports</a>
        <ul class="submenu">
				<li><a href="?link=a" name="link1">Report 1</a></li>
				<li><a href="?link=b" name="link2">Report 2</a></li>
                <li><a href="?link=c" name="link3">Report 3</a></li>
                <li><a href="?link=d" name="link4">Report 4</a></li>    
          
        </ul>
    </li>
	<br>
	<br>
	<br>
	<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	if (strlen($_SESSION["username"])>0)
    echo
		"<li><a href=#?id = 3>DDL Commands</a>
        <ul class=\"submenu\">
            <li><a href=#>SELECT</a></li>";
	if ($_SESSION["access"]==="all")
	{echo "
            <li><a href=#>INSERT</a></li>
            <li><a href=#>UPDATE</a></li>
			<li><a href=#>DELETE</a></li>";}
	echo"		
        </ul>
    </li>";
	?>
</ul>
</center></p>
 <?php
 		$servername = "localhost";
		$user = "root";
		$password = "";
		$dbname = "language";
		$conn = new mysqli($servername, $user, $password, $dbname);
		if ($conn->connect_error) {
		session_destroy();
		die("Connection failed: " . $conn->connect_error);
		}
        $link=$_GET['link'];
        if ($link == '1'){
			echo "<center><p>This query does what?</p></center>";
             $sql = "SELECT C.Name as Name, Result.total as Total 
				FROM countrycodes c,
				(SELECT i.countryid as ID, count(DISTINCT i.langid) as total 
					FROM languageindex I where i.NameType not like \"%D%\"  GROUP BY i.CountryID) 
					as Result WHERE Result.ID = C.countryID AND Result.total>10;";
			echo "<center><table border = \"2\" style = \"width:50%\"><tr>";
			if($result = mysqli_query($conn, $sql))
			{
				while ($finfo = $result->fetch_field()) {
					echo "<td>",$finfo->name,"</td>";
				}
				echo "</tr>";
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_array($result);
				echo "<tr>";
				$i=0;
				while($i< mysqli_num_fields($result))
				{
					echo "<td>",$row[$i],"</td>";
					$i++;
				}
				echo "</tr>";
				}
			}
			else
			{
				echo "Result not found.";
			}
			echo "</table></center>";
			}
        if ($link == 'b'){
			echo "2";
		}
        if ($link == 'c'){
			echo "3";
 }
        if ($link == 'd'){
			echo "4";
        }
            ?>  
			</body>
</html>
