<?php
require 'core.inc.php';
require 'connect.php';

if (isset($_POST['remv'])) {

	 $removeID = $_POST['id'];

	$delete1 = "DELETE FROM `open_property_details` WHERE `open_prop_id`= $removeID";
	//$update = "UPDATE `property_details` SET `vacancy` = '0'  WHERE `vacancy`= $removeID ";
	$query1 = mysqli_query($con,$delete1);
	//$query2 = mysqli_query($con,$update);
	if ($query1) {
		echo "Open House Deleted";
		
	}else{
		echo "Something Went wrong";
	}
}
?>