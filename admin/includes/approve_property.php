
<?php 

	require 'connect.php';
	require 'core.inc.php';

	if (isset($_GET['status'])) {
		$status = $_GET['status'];
		
		$update = "UPDATE `property_details` SET `prop_status` = 'Approved' WHERE `prop_id` = '$status'";
		$query = mysqli_query($con, $update);
		if ($query) {
			echo "<script>alert('Property Approved')
			window.history.back()</script>";
		}else {
			echo "<script>alert('Unknown error occured');
			window.history.back();
			</script>";
		}
	}

?>