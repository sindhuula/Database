

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
		die("ERROR: Textbox cannot be empty.<br>");
	}
	else if (strlen($_POST["SSN"])!=4)
	{
		die("<br>ERROR: Textbox values should have length of 4.<br>");
	}
	else if(!is_numeric($_POST["SSN"]))
    {
		die("ERROR: Textbox values should be numeric.<br>");
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
	
    
    // Attempt select query execution
	echo "CALL show('".$_POST["SSN"]."');";
    if($result = mysqli_query($link, "CALL show('".$_POST["SSN"]."');")){
		do {
			if ($result = $mysqli->store_result()) {
				while ($row = $result->fetch_row()) {
				printf("%s, %s, %s<br>", $row[0], $row[1], $row[2]);
				}
			$result->close();
			}
		if ($mysqli->more_results()) {
			printf("-----------------\n");
			}
			} while ($mysqli->next_result());
		}

	else{

        echo "ERROR: Could not execute. " . mysqli_error($link);


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

