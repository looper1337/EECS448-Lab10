<?php
        echo "<html><body>";
	$mysqli = new mysqli("mysql.eecs.ku.edu", "trieunguyen", "aiqu9paR", "trieunguyen");

	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	
	echo "<ul>";
	
        $query = 'SELECT user_id FROM Users';

        if($result = $mysqli->query($query))
        {
      
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["user_id"] . "</li>";
            }

     
            $result->free();
        }
        else
            echo "Bad Query";

	$mysqli->close();
	
	echo "</ul></body></html>";
?>