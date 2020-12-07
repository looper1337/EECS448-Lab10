<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "trieunguyen", "aiqu9paR", "trieunguyen");
	$user = $_POST["user"];
	$content = $_POST["postContent"];

	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}

	if($user == ""||$content == "")
	{
		echo "<center>Username and text box must be filled.</center>";
	}
	
	else
	{
		
                $query = 'INSERT INTO Posts (author_id, content) VALUES("' . $user . '","' . $content . '");';

                if($result = $mysqli->query($query))
                        echo "<center>Post successfully created!</center>";
                else
                        echo "<center>Username invalid! Please choose an existing username!</center>";
	}

	$mysqli->close();
?>