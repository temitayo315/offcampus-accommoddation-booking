<?php
include 'connect.php';
include 'core.inc.php';

$agent_id=$_GET['usr_iD'];

function checkInput($data){
	include 'connect.php';
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($con, $data);
	$data = trim($data);

	return $data;
}

	
	if (isset($_POST['submit_contact_form'])) {

		$fname = checkInput($_POST['fname']);
        $lname = checkInput($_POST['lname']);
		$email = checkInput($_POST['email']);
		$phone = checkInput($_POST['phone']);
		$comment = checkInput($_POST['comment']);

		$query = "INSERT INTO `contact_details`(`contact_id`, `firstname`, `lastname`, `email`, `phone`, `comment`, `prop_owner`,`date`) VALUES ('','$fname','$lname','$email','$phone','$comment','$agent_id',NOW())";
				if($query_run = mysqli_query($con,$query)){
					?><script>
                                window.alert('Contact Submitted Successfully, Agent Will Contact You Shortly');
                               window.location.href = "../single_property_2.php";
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

