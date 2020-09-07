<?php
include 'connect.php';
include 'core.inc.php';

$prpid=$_GET['propeID'];

function checkInput($data){
	include 'connect.php';
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($con, $data);
	$data = trim($data);

	return $data;
}


	
	$query = "SELECT * FROM `property_details` WHERE `prop_id` = $prpid LIMIT 1";
	$run = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($run);
	$property = $row['prop_id'];
	
	$prop_owner = $row['agent_id'];
	
	if (isset($_POST['submit_open_house_contact_form'])) {
		$date = checkInput($_POST['date']);
		$time = checkInput($_POST['time']);
		$fname = checkInput($_POST['fname']);
		$lname = checkInput($_POST['lname']);
		$contact = checkInput($_POST['contact']);
		$message = checkInput($_POST['message']);

		$schedule = $date." : ".$time;


		$query = "INSERT INTO `booking` VALUES (null, '".mysqli_real_escape_string($con,$property)."', '".mysqli_real_escape_string($con,$prop_owner)."', '".mysqli_real_escape_string($con,$date)."','".mysqli_real_escape_string($con,$time)."', '".mysqli_real_escape_string($con,$fname)."', '".mysqli_real_escape_string($con,$lname)."', '".mysqli_real_escape_string($con,$contact)."', '".mysqli_real_escape_string($con,$message)."', NOW())";
				if($query_run = mysqli_query($con,$query)){
					?><script>
                                window.alert('House Schedule Request Submitted Successfully, Agent/Seller Will Contact You Shortly');
                                window.history.back();
                                    </script>
                                <?php 
				}else{ ?>
					<script>
                                window.alert('Opps! Something Went Wrong Contact Not Submitted');
                                window.history.back();
                                    </script>
                                <?php 
				}
    


	} 
?>