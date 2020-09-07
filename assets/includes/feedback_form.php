<?php
include 'connect.php';
include 'core.inc.php';


function checkInput($data){
	include 'connect.php';
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($con, $data);
	$data = trim($data);

	return $data;
}
	
	if (isset($_POST['submit_feedback'])) {

		$fname = checkInput($_POST['fname']);
		$lname = checkInput($_POST['lname']);
		$email = checkInput($_POST['email']);
		$location = checkInput($_POST['location']);
		$reaction = checkInput($_POST['reaction']);
		$comment = checkInput($_POST['comment']);

		$query = "INSERT INTO `users_feedback` VALUES (null,'".mysqli_real_escape_string($con,$fname)."', '".mysqli_real_escape_string($con,$lname)."', '".mysqli_real_escape_string($con,$email)."', '".mysqli_real_escape_string($con,$location)."', '".mysqli_real_escape_string($con,$reaction)."', '".mysqli_real_escape_string($con,$comment)."', NOW(), '0')";
				if($query_run = mysqli_query($con,$query)){
					?><script>
                                window.alert('Feedback Submitted! Thank you for your respose');
                                window.location.href = "../../index.php";
                                    </script>
                                <?php 
				}else{ ?>
					<script>
                                window.alert('Opps! Something Went Wrong Feedback Not Submitted');
                                window.history.back();
                                    </script>
                                <?php 
				}
    


	} 
?>