

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
    $sql = "SELECT * FROM rawscores WHERE SSN = ".$_POST["SSN"];

    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){

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

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";

                    echo "<td>" . $row['SSN'] . "</td>";

                    echo "<td>" . $row['FName'] . "</td>";

                    echo "<td>" . $row['LName'] . "</td>";
                    echo "<td>" . $row['Section'] . "</td>";

                    echo "<td>" . $row['HW1'] . "</td>";
                    echo "<td>" . $row['HW2a'] . "</td>";
                    echo "<td>" . $row['HW2b'] . "</td>";
                    echo "<td>" . $row['Midterm'] . "</td>";
                    echo "<td>" . $row['HW3'] . "</td>";
                    echo "<td>" . $row['FExam'] . "</td>";

                echo "</tr>";

            }

            echo "</table>";

            // Close result set

            mysqli_free_result($result);

        } else{

            echo "No records matching your query were found.";

        }

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }

     

    // Close connection

    mysqli_close($link);

    }
{
		echo "ERROR: Textbox values should have length of 4.";
	}
	}
	?>
    </body>

