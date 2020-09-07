<?php
require 'core.inc.php';

 $user_name = get_profile_name();





if (isset($_POST['submit_update'])) {

  $fname = $_POST['fname'];
  $lname =$_POST['lname'];
  $title = $_POST['title'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $tweet = $_POST['tweet'];
  $fbk = $_POST['facebook'];
  $about = $_POST['about'];



  function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;
    switch($imagetype)
    {
     case 'image/bmp': return '.bmp';
     case 'image/gif': return '.gif';
     case 'image/jpeg': return '.jpg';
     case 'image/png': return '.png';
     default: return false;
   }
 }	  

if (!empty($_FILES["profile_picture"]["name"])) {

    $file_name=$_FILES["profile_picture"]["name"];
    $temp_name=$_FILES["profile_picture"]["tmp_name"];
    $imgtype=$_FILES["profile_picture"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=date("d-m-Y")."-".time()."_".$user_name."-profile-picture".$ext;
    $target_path = "../uploads/user_profile_pics/".$imagename;
  
  if(move_uploaded_file($temp_name, $target_path)) {
    require 'connect.php';
    $query_upload="UPDATE `agents` SET `fname`='".mysqli_real_escape_string($con,$fname)."', `lname`='".mysqli_real_escape_string($con,$lname)."', `businessName`='".mysqli_real_escape_string($con,$title)."', `phone`='$phone', `address` = '$address', `about`='".mysqli_real_escape_string($con,$about)."', `twitter`='".mysqli_real_escape_string($con,$tweet)."', `facebook`='".mysqli_real_escape_string($con,$fbk)."', `clearance` = '1', `profile_pic` = '".mysqli_real_escape_string($con,$target_path)."' WHERE `id` = '".$_SESSION['id']."'" ;
    if ($query_upload_run = mysqli_query($con,$query_upload)) { 
      ?>

        <script>
          window.alert('Profile Updated Successfully');
          window.location.href = "../../submit_property.php";
        </script>
        <?php
      }else{ ?>

        <script>
          window.alert('Failed To Update Profile');
          window.history.back();
        </script>
        <?php
      } 	            

    }else{

      ?><script> 
        window.alert('Error While uploading image on the server');
        window.history.back()</script>
    <?php
  } 	

} else{
   require 'connect.php';
    $query_upload="UPDATE `agents` SET `businessName`='".mysqli_real_escape_string($con,$title)."', `phone`='$phone', `address` = '$address', `about`='".mysqli_real_escape_string($con,$about)."', `twitter`='".mysqli_real_escape_string($con,$tweet)."', `facebook`='".mysqli_real_escape_string($con,$fbk)."', `clearance` = '1' WHERE `id` = '".$_SESSION['id']."'" ;
    if ($query_upload_run = mysqli_query($con,$query_upload)) { 
      ?>

        <script>
          window.alert('Profile Updated Successfully');
          window.history.back();
        </script>
        <?php
      }else{ ?>

        <script>
          window.alert('Failed To Update Profile');
          window.history.back();
        </script>
        <?php
      }               

}

}



?>