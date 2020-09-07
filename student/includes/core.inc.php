<?php
session_start();
include "connect.php";

function checkInput($data) {
    include 'connect.php';
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($con, $data);
    $data = trim($data);

    return $data;
}

function loggedin() {
    require 'connect.php';
    if (isset($_SESSION['stu_id']) && !empty($_SESSION['stu_id'])) {
        // anything about logged in users homepage or original homepage for logged in users
        return true;
    } else {
        return false;	
    }
}

function get_profile_name() {
    require 'connect.php';
    $query = "SELECT `firstname`, `lastname` FROM `students` WHERE stu_id = '" . $_SESSION['stu_id'] . "' LIMIT 1";
    if ($query_run = mysqli_query($con, $query)) {
        if ($result = mysqli_fetch_assoc($query_run)) {
            return $result['firstname']." ".$result['lastname'];
        }
    }
}

function get_user_profile_pic() {
    require 'connect.php';
    $query = "SELECT `photo` FROM `students` WHERE stu_id = '" . $_SESSION['stu_id'] . "' LIMIT 1";
    if ($query_run = mysqli_query($con, $query)) {
        if ($result = mysqli_fetch_assoc($query_run)) {
            return $result['photo'];
        }
    }
}
function user_notexist($email) {
    require 'connect.php';
    $query = "SELECT `email` FROM `students` WHERE `email`= '" . mysqli_real_escape_string($con, $email) . "'";
    if ($query_run = mysqli_query($con, $query)) {
        $query_row = mysqli_num_rows($query_run);
        if ($query_row == 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function user_login($email, $pass) {
    require 'connect.php';
    //$pass = sha1($pass);
    $query = "SELECT `stu_id` FROM `students` WHERE `email`='" . mysqli_real_escape_string($con, $email) . "' AND `password`='" . mysqli_real_escape_string($con, $pass) . "' LIMIT 1 ";
    if ($query_run = mysqli_query($con, $query)) {
        $query_row = mysqli_num_rows($query_run);
        if ($query_row == 1) {
            if ($result = mysqli_fetch_assoc($query_run)) {
                $_SESSION['stu_id'] = $result['stu_id'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function stu_notifications(){
    require 'connect.php';

    $query_notify = mysqli_query($con, "SELECT * FROM students INNER JOIN stu_message ON students.stu_id = stu_message.sender_id WHERE stu_message.reciever_id = '".$_SESSION['stu_id']."'");

    $num_rows = mysqli_num_rows($query_notify);
    if ($num_rows == 0) {
        echo "<span>No Roommate Request Yet!</span>";
    }else{
        while ($row = mysqli_fetch_assoc($query_notify)) {
        ?>
    <tr>
        <td><img class="img-circle" src="<?php if($row['photo'] == 'profile_pic_goes_here'){echo '../images/icon_user.png';}else{echo 'uploads/'.$row['photo'];} ?>" width="100" height="100"></td>
        <td style="line-height:35px">
          <ul>
            <li><i class="fa fa-user"></i> <?php echo $row['firstname']." ".$row['lastname']; ?></li>
            <li><i class="fa fa-check"></i> <?php echo $row['gender']; ?></li>
            <li><i class="fa fa-building"></i> <?php echo $row['religion']; ?></li>
            <li><i class="fa fa-envelope"></i> <?php echo $row['email']; ?></li>
            <li><i class="fa fa-phone"></i> <?php echo $row['phone']; ?></li>
          </ul>
        </td>
        <td><?php echo $row['descr']; ?></td>
        <td><?php echo $row['message']; ?></td>
    </tr>
        <?php
        }
    }
}

?>