<?php
	echo "<html><body><table>";

	$mysqli = new mysqli("mysql.eecs.ku.edu", "trieunguyen", "aiqu9paR", "trieunguyen");
	$user = $_POST["user"];

	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	
	echo "<tr><th>Posts by " . $user . "</th></tr>";
	
	$query = 'SELECT content FROM Posts WHERE author_id="' . $user . '";';

	if($result = $mysqli->query($query))
	{
			while ($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["content"] . "</td></tr>";
			}
			$result->free();
	}
	else
		echo "<tr><td>This user has no posts.</td></tr>";
	$mysqli->close();
	
	echo "</table></body></html>";
?>