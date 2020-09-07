<?php
include 'connect.php';
include 'core.inc.php';



$prpid=$_GET['propID'];

$_SESSION['redirect'] = "process_favourite2.php?propID=$prpid";

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
	$user = $_SESSION['id'];
	
	$prop_owner = $row['user_id'];

		$query = "INSERT INTO `favourite_table` VALUES (null,'".mysqli_real_escape_string($con,$prpid)."', '".mysqli_real_escape_string($con,$prop_owner)."', NOW())";
				if($query_run = mysqli_query($con,$query)){
					?><script>
                                window.alert('Favourite bookmarked successfully');
                                window.location.href='../../single_property_2.php?propID=<?php echo $prpid; ?>';
                                    </script>
                                <?php 
				}else{ ?>
					<script>
                                window.alert('Opps! Something Went');
                                //window.history.back();
                                    </script>
                                <?php 
				}
    


?>