  
<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "trieunguyen", "aiqu9paR", "trieunguyen");
	if(!empty($_POST['postsToDelete']))
	{

		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}

		foreach($_POST['postsToDelete'] as $post)
		{
		
			$query = 'DELETE FROM Posts WHERE post_id="' . $post . '";';

			if($result = $mysqli->query($query))
			{
				echo "<center>Post with ID " . $post . " successfully deleted!</center>";
					$result->free();
			}
			else {
				echo "<center>Post with ID " . $post . " Failed to delete!</center>";
			}
		}
	}
	else
		echo "Must choose a post to delete.";

	$mysqli->close();
?>