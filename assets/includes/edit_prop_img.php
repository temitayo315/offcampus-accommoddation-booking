<?php
include 'connect.php';
include 'core.inc.php';

$imgpropid=$_GET['getid'];

function checkInput($data){
	include 'connect.php';
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($con, $data);
	$data = trim($data);

	return $data;
}

function GetImageExtension($imagetype) {
	if(empty($imagetype)) return false;
	switch($imagetype)
	{
		case 'image/bmp': return '.bmp';
		case 'image/gif': return '.gif';
		case 'image/jpeg': return '.jpg';
		case 'image/png': return '.png';
		case 'video/mp4': return '.mp4';
     	# code...
		break;
		default: return false;
	}
}
function extensionChecker($name,$extensionAcceptable){
	if(empty($name) && !is_null($name) && is_array($extensionAcceptable) && count($extensionAcceptable)>0){
		$ext = substr($name, strpos($name, '.')+1);
		if(in_array($ext, $extensionAcceptable)){
			return true;
		}else{
			return false;
		}
	}
}


$user= checkInput($_SESSION['id']);

$query = "SELECT * FROM `property_details` WHERE `user_id`=$user AND `prop_id` = $imgpropid";
$run = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($run);
$propId = $row['prop_id'];

$title = $row['prop_title'];


if (isset($_POST['submit_update_feat_img'])) {

	




	if (!empty($_FILES["feat_image"]["name"])){
		$feat_file_name=$_FILES["feat_image"]["name"];
		$feat_temp_name=$_FILES["feat_image"]["tmp_name"];
		$feat_imgtype=$_FILES["feat_image"]["type"];
		$feat_ext= GetImageExtension($feat_imgtype);
		$feat_imagename= $title."_".$feat_file_name;
		$targetPathFeatImg = "../images/uploads/".$feat_imagename;

		if(move_uploaded_file($feat_temp_name, $targetPathFeatImg)) {

			

				/*$valarr=explode(',', $row['others']);
				foreach ($vararr as $key) {
					echo $key;
				}*/

				$query = "UPDATE `property_details` SET `featured_img` = '".mysqli_real_escape_string($con,$targetPathFeatImg)."' WHERE `user_id` = $user AND `prop_id` = $imgpropid ";
				if($query_run = mysqli_query($con,$query)){
					?><script>
						window.alert('Property Featured Image Updated Successfully');
						window.history.back();
					</script>
					<?php 
				}else{ ?>
					<script>
						window.alert('Opps! Something Went Wrong In Updating Featured Image');
						window.history.back();
					</script>
					<?php 
				}

			}else{
				?>
				<script>
					window.alert('Opps! Something Went Wrong In Uploading Image to Server');
					window.history.back();
				</script>
				<?php
			}

		}
	}

	if (isset($_POST['submit_update_other_img'])) {
		if (!empty($_FILES["images"]["name"])){
			for ($i=0; $i < count($file_name=$_FILES["images"]["name"]); $i++) { 


				$temp_name=$_FILES["images"]["tmp_name"][$i];
				$file_name=$_FILES["images"]["name"][$i];
				$imgtype=$_FILES["images"]["type"][$i];
				$ext= GetImageExtension($imgtype);
				$imagename= $title."_".$file_name;
				$target_path = "../images/uploads/".$imagename;
				$qr_true=false;
				if(move_uploaded_file($temp_name, $target_path)) {
					$insert = "INSERT INTO `images_table` VALUES(null,'$propId','$target_path')";
					if($query = mysqli_query($con,$insert)){
						$qr_true = true;
					}else{ 
						$qr_true=false;
					}
				}else{
					?>
					<script>
						window.alert('Opps! Something Went Wrong in Moving Multiple Image(s)');
						
					</script>
					<?php 
				}



			}

			if($qr_true == true){
				?><script>
							window.alert('Property Image(s) Updated Successfully');
							window.history.back();
						</script>
						<?php 
			}else{
					?>
						<script>
							window.alert('Opps! Something Went Wrong In Updating Image(s)');
							window.history.back();
						</script>
						<?php 
			}
		}
	}
	?>