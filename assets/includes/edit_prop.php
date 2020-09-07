<?php
include 'connect.php';
include 'core.inc.php';

$prpid = $_GET['propertid'];

function checkInput($data) {
    include 'connect.php';
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($con, $data);
    $data = trim($data);

    return $data;
}

/* function extensionChecker($name,$extensionAcceptable){
  if(empty($name) && !is_null($name) && is_array($extensionAcceptable) && count($extensionAcceptable)>0){
  $ext = substr($name, strpos($name, '.')+1);
  if(in_array($ext, $extensionAcceptable)){
  return true;
  }else{
  return false;
  }
  }
  } */




if (isset($_POST['submit_update_property'])) {

        $title = checkInput($_POST['title']);
        $type = checkInput($_POST['type']);
        $price = checkInput($_POST['price']);
        $proximity = checkInput($_POST['proximity']);
        $description = checkInput($_POST['description']);
        $state = $_POST['state'];
        $rules = checkInput($_POST['rules']);
        $address = checkInput($_POST['address']);
        $check = isset($_POST['check']) ? $_POST['check']: false;
        $checkA = isset($_POST['checkA']) ? $_POST['checkA']: false;
        $status = "unApproved";
        $user = checkInput($_SESSION['id']);
    
        /* $valarr=explode(',', $row['others']);
          foreach ($vararr as $key) {
          echo $key;
          } */

        $query = "UPDATE `property_details` SET `prop_title` = '" . mysqli_real_escape_string($con, $title) . "', `prop_type` = '" . mysqli_real_escape_string($con, $type) . "',`prop_price` = '" . mysqli_real_escape_string($con, $price) . "', `proximity` = '" . mysqli_real_escape_string($con, $proximity) . "', `prop_desc` = '" . mysqli_real_escape_string($con, $description) . "',`location_id` = '" . mysqli_real_escape_string($con, $state) . "', `prop_address` = '" . mysqli_real_escape_string($con, $address) . "',`rules` = '" . mysqli_real_escape_string($con, $rules) . "' WHERE `prop_id` = $prpid ";
        if ($query_run = mysqli_query($con, $query)) {
          $insert_last = mysqli_insert_id($con);

                        foreach ($checkA as $key => $value) {
                        $insert_amenities = mysqli_query($con,"UPDATE  `prop_amenities`
                                                                 SET `prop_id` = $insert_last, `amenities_id` = $value WHERE `prop_id` = $prpid");
                             }
            ?><script>
                window.alert('Property Updated Successfully');
                window.location.href = "../../create_open_property.php";
            </script>
            <?php } else {
            ?>
            <script>
                window.alert('Opps! Something Went Wrong In Updating Property');
                window.history.back();
            </script>
            <?php
        }
}
?>