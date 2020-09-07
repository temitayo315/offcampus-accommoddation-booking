<?php
include 'connect.php';
include 'core.inc.php';

function checkInput($data) {
    include 'connect.php';
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($con, $data);
    $data = trim($data);

    return $data;
}

function GetImageExtension($imagetype) {
    if (empty($imagetype))
        return false;
    switch ($imagetype) {
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

function extensionChecker($name, $extensionAcceptable) {
    if (empty($name) && !is_null($name) && is_array($extensionAcceptable) && count($extensionAcceptable) > 0) {
        $ext = substr($name, strpos($name, '.') + 1);
        if (in_array($ext, $extensionAcceptable)) {
            return true;
        } else {
            return false;
        }
    }
}

if (isset($_POST['submit_property'])) {

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


        $checkLat = isset($_POST['lat']) ? $_POST['lat']: false;
        $checkLong = isset($_POST['long']) ? $_POST['long']: false;



        if (!empty($_FILES["feat_image"]["name"])) {
            $feat_file_name = $_FILES["feat_image"]["name"];
            $feat_temp_name = $_FILES["feat_image"]["tmp_name"];
            $feat_imgtype = $_FILES["feat_image"]["type"];
            $feat_ext = GetImageExtension($feat_imgtype);
            $feat_imagename = $title . $feat_ext;
            $targetPathFeatImg = "../images/uploads/" . $feat_imagename;

            if (move_uploaded_file($feat_temp_name, $targetPathFeatImg)) {
                //die($check);
                //$valArray = $check ? implode(',', $check):"None";
                $checkArray = 'Water,Electricity,'. ($checkA ? implode(',', $checkA) :"");
                /* $valarr=explode(',', $row['others']);
                  foreach ($vararr as $key) {
                  echo $key;
                  } */

                  $lat = $checkLat ? $checkLat :"None";
                  $long = $checkLong ? $checkLong :"None";

                $query = "INSERT INTO `property_details` VALUES (null,'" . mysqli_real_escape_string($con, $title) . "', '" . mysqli_real_escape_string($con, $type) . "', '" . mysqli_real_escape_string($con, $price) . "', '" . mysqli_real_escape_string($con, $proximity) . "', '" . mysqli_real_escape_string($con, $description) . "', '" . mysqli_real_escape_string($con, $targetPathFeatImg) . "', '" . mysqli_real_escape_string($con, $state) . "', '" . mysqli_real_escape_string($con, $address) . "', '" . mysqli_real_escape_string($con, $rules) . "', '0', NOW(), '" . mysqli_real_escape_string($con, $status) . "', '" . mysqli_real_escape_string($con, $user) . "')";

                    if ($query_run = mysqli_query($con, $query)) {
                        $insert_last = mysqli_insert_id($con);

                        foreach ($checkA as $key => $value) {
                        $insert_amenities = mysqli_query($con,"INSERT INTO `prop_amenities`
                                                                 VALUES(null, '$insert_last', '$value')");
                             }
                            ?><script>
                                window.alert('Property Submitted Successfully, Wait For Approval');
                                window.location.href = "../../create_open_property.php";
                            </script>
                            <?php } else {
                            ?>
                            <script>
                                window.alert('Opps! Something Went Wrong');
                                window.history.back();
                            </script>
                            <?php
                        }
                    } else {
                        ?>
                        <script>
                            window.alert('Opps! Something Went Wrong In Uploading Image to Server');
                            window.history.back();
                        </script>
                        <?php
                    }
                }


        $query = "SELECT * FROM `property_details` WHERE `agent_id`=$user ORDER BY `prop_id` DESC LIMIT 1";
        $run = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($run);
        $propId = $row['prop_id'];



        if (!empty($_FILES["images"]["name"])) {
            for ($i = 0; $i < count($file_name = $_FILES["images"]["name"]); $i++) {


                $temp_name = $_FILES["images"]["tmp_name"][$i];
                $file_name = $_FILES["images"]["name"][$i];
                $imgtype = $_FILES["images"]["type"][$i];
                $ext = GetImageExtension($imgtype);
                $imagename = $title . "_" . $file_name;
                $target_path = "../images/uploads/" . $imagename;

                if (move_uploaded_file($temp_name, $target_path)) {
                    $insert = "INSERT INTO `images_table` VALUES(null,'$propId','$target_path')";
                    $query = mysqli_query($con, $insert);
                    $query;
                } else {
                    ?>
                    <script>
                        window.alert('Opps! Something Went Wrong in Moving Multiple Images');
                        window.history.back();
                    </script>
                    <?php
                }
            }
        }
    }

?>