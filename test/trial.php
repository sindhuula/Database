

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <title>Query (a)Print a Single Student's Raw Scores</title>

    </head>

    <body>

   

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    
	SSN:<br>
	<input type="text" name="SSN" size="4" maxlength="4" <?php echo isset($_POST['SSN']) ? $_POST['SSN'] : '' ?>>
	<br>
	<br>
	<input type="submit" value="Get Value" name="submit">
    </form>
    <?php
	if(isset($_POST["submit"]))
	{
	if(strlen($_POST["SSN"])==0)
	{
		echo "ERROR: Textbox cannot be empty.<br>";
	}
	else if (strlen($_POST["SSN"])!=4)
	{
		echo "<br>ERROR: Textbox values should have length of 4.<br>";
	}
	else if(!is_numeric($_POST["SSN"]))
    {
		echo "ERROR: Textbox values should be numeric.<br>";
	}
	else if($_POST["SSN"]=="0001"||$_POST["SSN"]=="0002")
	{
		echo "ERROR: These are not student SSNs.<br>";
	}
	else
	{
		    /* Attempt MySQL server connection. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */
	
    $link = mysqli_connect("localhost", "root", "", "grades");

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }  

    // Attempt select query execution
      echo "<table>";
			echo "<tr>";
			echo "<th>SSN</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Section</th>";
            echo "<th>Homework 1</th>";
            echo "<th>Homework 2a</th>";
            echo "<th>Homework 2b</th>";
            echo "<th>Midterm</th>";
            echo "<th>Homework 3</th>";
            echo "<th>Final Exams</th>";
            echo "</tr>";

	if ($link->multi_query("CALL test_select('".$_POST["SSN"]."');")) 
	{ 
	do 
		{ /* store first result set */ 
			if ($result = $link->store_result()) 
				{ while ($row = $result->fetch_row())
						{ 	                echo "<tr>";

                    echo "<td>" . $row[0] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[3] . "</td>";
                    echo "<td>" . $row[4] . "</td>";
                    echo "<td>" . $row[5] . "</td>";
                    echo "<td>" . $row[6] . "</td>";
                    echo "<td>" . $row[7] . "</td>";
                    echo "<td>" . $row[8] . "</td>";
                    echo "<td>" . $row[9] . "</td>";
					echo "</tr>";
						}
						$result->close(); }
						/* print divider */ 
				if ($link->more_results()) { printf("-----------------<br>"); }
				} 
				while ($link->next_result()); 
	} 
	else { printf("First Error: %s\n", $link->error); }  
	echo "</table>";
       // Close connection
    mysqli_close($link);

    }
	}
	?>
    </body>

