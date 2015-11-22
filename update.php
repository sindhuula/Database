	if(isset($_POST["submit"]))
	{
	if(strlen($_POST["SSN"])==0 || strlen($_POST["password"])==0 || strlen($_POST["AssignmentName"])==0 || strlen($_POST["NewScore"]) == 0)
	{
		echo "ERROR: Textbox cannot be empty.<br>";
	}
	else if (strlen($_POST["SSN"])!=4)
	{
		echo "<br>ERROR: Textbox values should have length of 4.<br>";
	}
	else if(!is_numeric($_POST["SSN"]))
    {
		echo "ERROR: SSN Textbox values should be numeric.<br>";
	}
	else if(!is_numeric($_POST["NewScore"]))
    {
		echo "ERROR: New Score Textbox values should be numeric.<br>";
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
    $sql = "CALL ChangeScoresPhP('".$_POST["password"]."','".$_POST["SSN"]."','".$_POST["NewScore"]."')";
            // Close result set
		if($result = mysqli_query($link, $sql)){
         if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);

			if(mysqli_num_fields($result)>1)
			{
			printf("The updated record is:");	
			   echo "<table>";

                echo "<tr>";

                	echo "<th>Result</th>";
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
				                echo "<tr>";

                    echo "<td>" . $row[10] . "</td>";
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
				echo "</table>";
			
				
			}
			else
			{
				printd ("There was an error: %s",$row[0]);
			}//echo $result;
        } else{
			echo "No records matching your query were found.";
        }
    
    mysqli_close($link);
    }
	else
		echo "Unable to query database";
	
    // Close connection
    }
	}
	
	?>
    </body>
