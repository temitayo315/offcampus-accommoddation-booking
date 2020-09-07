<?php
require 'core.inc.php';
require 'connect.php';

if (isset($_POST['close'])) {

	$closeID = $_POST['id'];

	$update = "UPDATE `open_property_details` SET `status` = '0' WHERE `prop_id`= $closeID";
	$update2 = mysqli_query($con,"UPDATE `property_details` SET `vacancy` = 0 WHERE `prop_id` = $closeID");
	$query = mysqli_query($con, $update);
	if ($query) {
		echo "Open House Closed, Users Can No Longer Schedule Visits For This Property";
		
	}else{
		echo "Something Went Wrong, House Not CLosed";
	}
}else if (isset($_POST['open'])) {

	$openID = $_POST['id'];

	$update3 = "UPDATE `open_property_details` SET `status` = 'open' WHERE `prop_id`= $openID";
	$update4 = mysqli_query($con,"UPDATE `property_details` SET `vacancy` = 1 WHERE `prop_id` = $openID");
	$query3 = mysqli_query($con, $update3);
	if ($query3) {
		echo "House Open, Users Can Now Schedule Visits For This Property";
		
	}else{
		echo "Something Went Wrong, House Not Open";
	}
}
?>