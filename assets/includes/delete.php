<?php
require 'core.inc.php';
require 'connect.php';

if (isset($_POST['rem'])) {

	$removeID = $_POST['id'];

	$delete1 = "DELETE FROM `property_details` WHERE `prop_id`= $removeID";
	$delete2 = "DELETE FROM `images_table` WHERE `prop_id`= $removeID";
	$query1 = mysqli_query($con,$delete1);
	$query2 = mysqli_query($con, $delete2);
	if ($query1 && $query2) {
		echo "Property Deleted";
		
	}else{
		echo "Something Went Wrong";
	}
}
?>