
<?php 

	require 'connect.php';
	require 'core.inc.php';

	if (isset($_GET['disapprove'])) {
		$unapprove = $_GET['disapprove'];
		
		$update = "UPDATE `property_details` SET `prop_status` = 'unApproved' WHERE `prop_id` = '$unapprove'";
		$query = mysqli_query($con, $update);
		if ($query) {
			echo "<script>alert('Property immediately Dis-Approved')
			window.history.back()</script>";
		}else {
			echo "<script>alert('Unknown error occured');
			window.history.back();
			</script>";
		}
	}

?>