<?php
include 'connect.php';
include 'core.inc.php';

//$prpid=$_GET['propertid'];

function checkInput($data){
	include 'connect.php';
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($con, $data);
	$data = trim($data);

	return $data;
}

if (isset($_POST['submit_open_property_form'])) {

	$property = checkInput($_POST['property']);
	$days = checkInput($_POST['days']);
	$time_from = checkInput($_POST['time_from']);
	$time_to = checkInput($_POST['time_to']);
	$status = "open";

	$time = $time_from." - ".$time_to;

	$query = "INSERT INTO `open_property_details` VALUES (null,'".mysqli_real_escape_string($con,$property)."', '".mysqli_real_escape_string($con,$days)."', '".mysqli_real_escape_string($con,$time)."', '".mysqli_real_escape_string($con,$status)."', NOW())";
				if($query_run = mysqli_query($con,$query)){

					$qr = "SELECT * FROM `open_property_details` LEFT JOIN `property_details` on `property_details`.`prop_id` = `open_property_details`.`prop_id` WHERE `agent_id` = '".$_SESSION['id']."' ";
					$qu_run=mysqli_query($con,$qr);
					$qr_row=mysqli_fetch_array($qu_run);

					$open_house_id = $qr_row['open_prop_id'];

					$query2 = "UPDATE `property_details` SET `vacancy` = $open_house_id WHERE `prop_id` = $property ";
				    $query_run2 = mysqli_query($con,$query2);


					?><script>
                                window.alert('Open House Submitted Successfully');
                                window.location.href = "../../open_property.php";
                                    </script>
                                <?php 
				}else{ ?>
					<script>
                                window.alert('Opps! Something Went Wrong');
                                window.history.back();
                                    </script>
                                <?php 
				}
}
?>
