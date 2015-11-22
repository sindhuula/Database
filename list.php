<head>
  <title>AllRawScores</title>
 </head>
 <body>

 
 
 <?php
// PHP code just started

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
// display errors

$db = mysql_connect("dbase.cs.jhu.edu", "apandya5", "$pan^67Tz");
// ********* Remember to use your MySQL username and password here ********* //

if (!$db) {

  echo "Connection failed!";

} else {

  $pass = $_POST['password'];
  // This says that the $cr_cnt variable should be assigned a value obtained as an
  // input to the PHP code. In this case, the input is called 'cr_cnt'.

  mysql_select_db("rawscores",$db);
  // ********* Remember to use the name of your database here ********* //

  $result = mysql_query("SELECT * FROM rawscores AS r WHERE (r.SSN<>0001 AND r.SSN<>0002 AND $pass IN (SELECT CurPasswords FROM passwords)) ORDER BY r.Section,r.LName,r.FName",$db);

  // a simple query on the Course table. This should work fine, just like in
  // list_one_stu.php

  if (!$result) {

    echo "Query failed!\n";
    print mysql_error();

  } else {

    echo "<table border=1>\n";
    echo "<tr><td>CID</td><td>CName</td></tr>\n";

    while ($myrow = mysql_fetch_array($result)) {
      printf("<tr><td>%s</td><td>%s</td></tr>\n", $myrow["CID"], $myrow["CName"]);
    }

    echo "</table>\n";

  }

}

// PHP code about to end

 ?>



 </body>