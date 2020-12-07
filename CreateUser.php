<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "trieunguyen", "aiqu9paR", "trieunguyen");
	$user = $_POST["user"];
	$dupe = false;

	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}


	if($user == "")
	{
		echo "<center>Username field must be filled.</center>";
	}
	else
	{

		$query = "SELECT user_id FROM Users";
		if ($result = $mysqli->query($query)) {


		    while ($row = $result->fetch_assoc()) {
			if($row["user_id"]==$user)
			{
				$dupe = true;
			}
		    }

		    $result->free();
		}
		else
			echo "Error";
		
		if($dupe)
		{
			echo "<center>Username already taken.</center>";
		}
		else
		{
			$query = "INSERT INTO Users VALUES('" . $user . "');";

			if($result = $mysqli->query($query))
				echo "<center>User successfully created!</center>";
			else
				echo "<center>User creation failed!</center>";
		}
	}


	$mysqli->close();
?>
