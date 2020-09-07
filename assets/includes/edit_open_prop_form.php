<?php
include 'connect.php';
include 'core.inc.php';

$prpid=$_GET['propertid'];

function checkInput($data){
	include 'connect.php';
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($con, $data);
	$data = trim($data);

	return $data;
}

if (isset($_POST['submit_open_property_form'])) {

	$days = checkInput($_POST['days']);
	$time_from = checkInput($_POST['time_from']);
	$time_to = checkInput($_POST['time_to']);

	$time = $time_from." - ".$time_to;

	$query = "UPDATE `open_property_details` SET `day`= '$days', `time`= '$time'  WHERE `prop_id` = $prpid ";
				if($query_run = mysqli_query($con,$query)){
					?><script>
                                window.alert('Open House Updated Successfully');
                                window.history.back();
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
