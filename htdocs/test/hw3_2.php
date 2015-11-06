

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

     
	$flag1 = 0;$flag2=0;$flag3=0;
    // Attempt select query execution
	if (!mysqli_query($link,"DROP VIEW IF EXISTS TotalPoints")||!$total_view = mysqli_query($link,"CREATE VIEW TotalPoints AS SELECT * FROM Rawscores WHERE SSN = 0001"))
	{
		echo "view1";
	}
	if (!mysqli_query($link,"DROP VIEW IF EXISTS Weights")||!$weight_view = mysqli_query($link,"CREATE VIEW Weights AS SELECT * FROM Rawscores WHERE SSN = 0002"))
	{
		echo "view2";
		$flag2=1;
	}
	if (!mysqli_query($link,"DROP VIEW IF EXISTS WtdPts")||!$wtdpts_view = mysqli_query($link,"CREATE VIEW WtdPts AS SELECT ((1/totpts.HW1)*weight.HW1),((1/totpts.HW2a)*weight.HW2a),((1/totpts.HW2b)*weight.HW2b),
	((1/totpts.Midterm)*weight.Midterm),((1/totpts.HW3)*weight.HW3),((1/totpts.FExam)*weight.FExam)
	FROM TotalPoints AS totpts, Weights AS weight"))
	{
		echo "view3";
		$flag3 = 1;
	}
	if($flag1==1||$flag2==1||$flag3==1)
	{
		echo "ERROR views creation not successful.";
	}
	else
	{
    $sql = "SELECT * FROM rawscores WHERE SSN = ".$_POST["SSN"];

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

    } 
    mysqli_close($link);

    }

    // Close connection


    }
	
	?>
    </body>

