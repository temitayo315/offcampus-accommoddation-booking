<?php
 require'connect.php';
 require'core.inc.php';

if (isset($_POST['submit-login-form'])) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if(user_login($email,$pass)){
        if ($_SESSION['redirect']) {
            $link =$_SESSION['redirect'];
            header("LOCATION:$link");

        }else{
            header('LOCATION:../../my_profile.php');
        }
    }else{ ?>               
        <script>
            window.alert('Wrong Username or Password');
            window.history.back();
        </script>
     <?php  }
}


?>