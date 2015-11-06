<!--(a)Print a single student's raw scores-->
<!DOCTYPE html>
<html>

    <?php

    /* Attempt MySQL server connection. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */
	
    $link = mysqli_connect("localhost", "root", "", "grades");

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

     

    // Attempt select query execution
	$form_value = $_POST['submit'] 
    $sql = "SELECT * FROM rawscores";

    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){

            echo "<table>";

                echo "<tr>";

                    echo "<th>SSN</th>";

                    echo "<th>FName</th>";

                    echo "<th>LName</th>";

                    echo "<th>HW1</th>";

                echo "</tr>";

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";

                    echo "<td>" . $row['SSN'] . "</td>";

                    echo "<td>" . $row['FName'] . "</td>";

                    echo "<td>" . $row['LName'] . "</td>";

                    echo "<td>" . $row['HW1'] . "</td>";

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

    ?>


</body>
</html> 