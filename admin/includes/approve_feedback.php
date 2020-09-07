
<?php 

	require 'connect.php';
	require 'core.inc.php';

	if (isset($_GET['id'])) {
		$feedback = $_GET['id'];
		
		$update = "UPDATE `users_feedback` SET `posted` = 1 WHERE `feedback_id` = '$feedback'";
		$query = mysqli_query($con, $update);
		if ($query) {
			echo 'Users Review Approved';
			
				}
		else {
			echo 'Unknown error occured';
		
				}
	}

?>