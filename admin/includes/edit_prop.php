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



	include 'connect.php';
	if (isset($_POST['submit_update_property'])) {

		$title = checkInput($_POST['title']);
		$type = checkInput($_POST['type']);
		$offer = checkInput($_POST['offer']);
		$price = checkInput($_POST['price']);
		$pArea = checkInput($_POST['pArea']);
		$room = checkInput($_POST['room']);
		$description = checkInput($_POST['description']);
		$state = $_POST['state'];
		$city = checkInput($_POST['city']);
		$address = checkInput($_POST['address']);
		$build_year = checkInput($_POST['build_year']);
		$bedrooms = checkInput($_POST['bedrooms']);
		$bathrooms = checkInput($_POST['bathrooms']);
		$check = $_POST['check'];
		$status = "unApproved";
		$user= checkInput($_SESSION['id']);

		

		if (!empty($_FILES["feat_image"]["name"])){
			$feat_file_name=$_FILES["feat_image"]["name"];
			$feat_temp_name=$_FILES["feat_image"]["tmp_name"];
			$feat_imgtype=$_FILES["feat_image"]["type"];
			$feat_ext= GetImageExtension($feat_imgtype);
			$feat_imagename= $title.$feat_ext;
			$targetPathFeatImg = "../images/uploads/".$feat_imagename;

			if(move_uploaded_file($feat_temp_name, $targetPathFeatImg)) {
					//die($check);
				$valArray = implode(',', $check);
				
				/*$valarr=explode(',', $row['others']);
				foreach ($vararr as $key) {
					echo $key;
				}*/

				$query = "UPDATE SET `prop_title` = '".mysqli_real_escape_string($con,$title)."', `prop_type` = '".mysqli_real_escape_string($con,$type)."', `prop_area` = '".mysqli_real_escape_string($con,$offer)."', `prop_price` = '".mysqli_real_escape_string($con,$price)."', `prop_area` = '".mysqli_real_escape_string($con,$pArea)."', `prop_room` = '".mysqli_real_escape_string($con,$room)."', `prop_desc` = '".mysqli_real_escape_string($con,$description)."', `featured_img` = '".mysqli_real_escape_string($con,$targetPathFeatImg)."', `state_id` = '".mysqli_real_escape_string($con,$state)."', `city` = '".mysqli_real_escape_string($con,$city)."', `prop_address` = '".mysqli_real_escape_string($con,$address)."', `bld_year` = '".mysqli_real_escape_string($con,$build_year)."', `bedroom` = '".mysqli_real_escape_string($con,$bedrooms)."', `bathroom` = '".mysqli_real_escape_string($con,$bathrooms)."', `others` = '".mysqli_real_escape_string($con,$valArray)."' ";
				if($query_run = mysqli_query($con,$query)){
					?><script>
                                window.alert('Property Updated Successfully');
                                window.history.back();
                                    </script>
                                <?php 
				}else{ ?>
					<script>
                                window.alert('Opps! Something Went Wrong In Updating Property');
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
		}else{
			$query = "UPDATE SET `prop_title` = '".mysqli_real_escape_string($con,$title)."', `prop_type` = '".mysqli_real_escape_string($con,$type)."', `prop_area` = '".mysqli_real_escape_string($con,$offer)."', `prop_price` = '".mysqli_real_escape_string($con,$price)."', `prop_area` = '".mysqli_real_escape_string($con,$pArea)."', `prop_room` = '".mysqli_real_escape_string($con,$room)."', `prop_desc` = '".mysqli_real_escape_string($con,$description)."', `state_id` = '".mysqli_real_escape_string($con,$state)."', `city` = '".mysqli_real_escape_string($con,$city)."', `prop_address` = '".mysqli_real_escape_string($con,$address)."', `bld_year` = '".mysqli_real_escape_string($con,$build_year)."', `bedroom` = '".mysqli_real_escape_string($con,$bedrooms)."', `bathroom` = '".mysqli_real_escape_string($con,$bathrooms)."', `others` = '".mysqli_real_escape_string($con,$valArray)."' ";
				if($query_run = mysqli_query($con,$query)){
					?><script>
                                window.alert('Property Updated Successfully');
                                window.history.back();
                                    </script>
                                <?php 
				}else{ ?>
					<script>
                                window.alert('Opps! Something Went Wrong In Updating Property');
                                window.history.back();
                                    </script>
                                <?php 
				}
		}


		$query = "SELECT * FROM `property_details` WHERE `user_id`=$user ORDER BY `prop_id` DESC LIMIT 1";
		$run = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($run);
		$propId = $row['prop_id'];
		


		if (!empty($_FILES["images"]["name"])){
            for ($i=0; $i < count($file_name=$_FILES["images"]["name"]); $i++) { 


                $temp_name=$_FILES["images"]["tmp_name"][$i];
                $file_name=$_FILES["images"]["name"][$i];
                $imgtype=$_FILES["images"]["type"][$i];
                $ext= GetImageExtension($imgtype);
                $imagename= $title."_".$file_name;
                $target_path = "../images/uploads/".$imagename;

                    if(move_uploaded_file($temp_name, $target_path)) {
                        $insert = "INSERT INTO `images_table` VALUES(null,'$propId','$target_path')";
                        $query = mysqli_query($con, $insert);
                }else{
                     ?>
                    <script>
                                window.alert('Opps! Something Went Wrong in Moving Multiple Images');
                                window.history.back();
                                    </script>
                                <?php 
                }



            }
        }else{
			$query = "UPDATE SET `prop_title` = '".mysqli_real_escape_string($con,$title)."', `prop_type` = '".mysqli_real_escape_string($con,$type)."', `prop_area` = '".mysqli_real_escape_string($con,$offer)."', `prop_price` = '".mysqli_real_escape_string($con,$price)."', `prop_area` = '".mysqli_real_escape_string($con,$pArea)."', `prop_room` = '".mysqli_real_escape_string($con,$room)."', `prop_desc` = '".mysqli_real_escape_string($con,$description)."', `state_id` = '".mysqli_real_escape_string($con,$state)."', `city` = '".mysqli_real_escape_string($con,$city)."', `prop_address` = '".mysqli_real_escape_string($con,$address)."', `bld_year` = '".mysqli_real_escape_string($con,$build_year)."', `bedroom` = '".mysqli_real_escape_string($con,$bedrooms)."', `bathroom` = '".mysqli_real_escape_string($con,$bathrooms)."', `others` = '".mysqli_real_escape_string($con,$valArray)."' ";
				if($query_run = mysqli_query($con,$query)){
					?><script>
                                window.alert('Property Updated Successfully');
                                window.history.back();
                                    </script>
                                <?php 
				}else{ ?>
					<script>
                                window.alert('Opps! Something Went Wrong In Updating Property');
                                window.history.back();
                                    </script>
                                <?php 
				}
		}
	}
?>