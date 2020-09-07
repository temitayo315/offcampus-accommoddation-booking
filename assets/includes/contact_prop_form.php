<?php
//include 'connect.php';
include 'core.inc.php';

$prpid=$_GET['prpID'];

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
	
	if (isset($_POST['submit_contact_form'])) {

		$fname = checkInput($_POST['fname']);
		$lname = checkInput($_POST['lname']);
		$email = checkInput($_POST['email']);
		$phone = checkInput($_POST['phone_number']);
		$comment = checkInput($_POST['comment']);

		$query = "INSERT INTO `contact_details` VALUES (null,'".mysqli_real_escape_string($con,$fname)."','".mysqli_real_escape_string($con,$lname)."', '".mysqli_real_escape_string($con,$email)."', '".mysqli_real_escape_string($con,$phone)."', '".mysqli_real_escape_string($con,$comment)."', '".mysqli_real_escape_string($con,$prop_owner)."', '".mysqli_real_escape_string($con,$property)."', NOW())";
				if($query_run = mysqli_query($con,$query)){
					?><script>
                                window.alert('Contact Submitted Successfully, Agent/Seller Will Contact You Shortly');
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