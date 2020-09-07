<?php
include "core.inc.php";

$stu_details = $_GET['more'];

if (isset($_POST['submit_request'])) {
  
  $sender = checkInput($_POST['sender']);
  $reciever = checkInput($_POST['reciever']);
  $message = checkInput($_POST['message']);
  $insert = mysqli_query($con, "INSERT INTO `stu_message` VALUES (null,'$sender', '$reciever', '$message')");
  if($insert){
          ?><script>
              window.alert('Message Sent! Roommate will be notified');
              window.location.href ="../roommate_search.php";
            </script>
          <?php 
    }else{ ?>
      <script>
              window.alert('Opps! Something Went Wrong');
             window.history.back();
      </script>
  <?php 
        echo mysqli_error($con);}
}




 ?>