<?php
// require'connect.php';
 require'core.inc.php';

if (isset($_POST['stu_login'])) {

    $email = checkInput($_POST['email']);
    $pass = checkInput($_POST['password']);

    $query = "SELECT `stu_id` FROM `students` WHERE `email`='$email' AND `password` = '$pass' LIMIT 1";
    if ($query_run = mysqli_query($con, $query)) {
        $query_row = mysqli_num_rows($query_run);
        if ($query_row == 1) {
        $result = mysqli_fetch_assoc($query_run);
        $_SESSION['stu_id'] = $result['stu_id'];
        header('location:../profile.php');
        
    }else{ ?>               
        <script>
            window.alert('Wrong Details, Try Logging in Again');
            window.history.back();
        </script>
     <?php  }
    }else{
        echo "<script>alert('Unknown Error Occur!')</script>";
     }
}

?>