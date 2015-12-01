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
}


ul.mainmenu li a {
    text-decoration: none;
    color: white;
    padding: 0.25em;
}

ul.mainmenu li a:hover {
    background: #6666ff;
}

ul.mainmenu li ul.submenu {
    list-style: none;
    display: none;
}

ul.mainmenu li:hover > ul.submenu {
    position: absolute;
    display: inline-block;
    top: 100px;
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
    <li><a href=#?id=2>Generate Reports</a>
        <ul class="submenu">
           <li><a href="?link=a" name="link1">Report 1</a></li>
                <li><a href="?link=b" name="link2">Report 2</a></li>
                <li><a href="?link=c" name="link3">Report 3</a></li>
                <li><a href="?link=d" name="link4">Report 4</a></li>    
          
        </ul>
    </li>
	<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	if (strlen($_SESSION["username"])>0)
    echo
		"<li><a href=#?id = 3>DDL Commands</a>
        <ul class=\"submenu\">
            <li><a href=#>Test7</a></li>
            <li><a href=#>Test8</a></li>
            <li><a href=#>Test9</a></li>
        </ul>
    </li>";
	?>
</ul>
</center></p>
 <?php
        $link=$_GET['link'];
        if ($link == 'a'){
             echo "1";
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
