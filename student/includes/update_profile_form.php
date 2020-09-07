<?php
require 'core.inc.php';

 $user_name = get_profile_name();





if (isset($_POST['submit_update'])) {

  $fname = $_POST['fname'];
  $lname =$_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $religion = $_POST['religion'];
  $gender = $_POST['gender'];
  $expectation = $_POST['expectation'];
  $about = $_POST['about'];
  $tolerance = $_POST['tolerance'];
  $study =$_POST['study'];
  $belongings = $_POST['belongings'];
  $neatness = $_POST['neatness'];
  $sleep = $_POST['sleep'];



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
    $target_path = "../uploads/".$imagename;
  
  if(move_uploaded_file($temp_name, $target_path)) {
    require 'connect.php';
    $query_upload="UPDATE `students` SET `firstname`='".mysqli_real_escape_string($con,$fname)."', `lastname`='".mysqli_real_escape_string($con,$lname)."', `email`='".mysqli_real_escape_string($con,$email)."', `phone`='$phone', `religion` = '$religion', `gender`='".mysqli_real_escape_string($con,$gender)."', `expectation`='".mysqli_real_escape_string($con,$expectation)."', `descr`='".mysqli_real_escape_string($con,$about)."', `clearance` = '1', `photo` = '".mysqli_real_escape_string($con,$target_path)."', `tolerance`='".mysqli_real_escape_string($con,$tolerance)."', `study`='".mysqli_real_escape_string($con,$study)."', `belongings`='".mysqli_real_escape_string($con,$belongings)."', `neatness`='$neatness', `sleep` = '$sleep' WHERE `stu_id` = '".$_SESSION['stu_id']."'" ;
    if ($query_upload_run = mysqli_query($con,$query_upload)) { 
      ?>

        <script>
          window.alert('Profile Updated Successfully');
          window.location.href = "../my_profile.php";
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
  } 	
}
     

?>