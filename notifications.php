<?php 
require "assets/includes/connect.php";
session_start();

	if (isset($_POST["view"])) {
		if ($_POST["view"] != '') {
			$query = "UPDATE `contact_details` SET `status`=1 where prop_owner = '" . $_SESSION['id'] . "' AND status ='" . 0 . "' ";
		echo $success = mysqli_query($con,$query);
		}
		    $query_run = mysqli_query($con, "select * from contact_details where prop_owner = '" . $_SESSION['id'] . "' AND status ='" . 0 . "' order by contact_id desc");
		    $count = mysqli_num_rows($query_run);
		    
		    if ($count > 0) {
		    	
		    echo json_encode($count);
			}
	
}

?>