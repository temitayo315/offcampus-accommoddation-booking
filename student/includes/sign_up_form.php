 <?php
 require'connect.php';
 require'core.inc.php';

    if (isset($_POST['signUp'])) {
        # code...

    $fname = checkInput($_POST['fname']);
    $lname = checkInput($_POST['lname']);
    $email = checkInput($_POST['email']);
    $passw = checkInput($_POST['pass']);
    $confirm_pass = checkInput($_POST['password_confirm']);

    if ($passw != $confirm_pass) {
          ?>
            <script>
                window.alert('Your password do not match');
                window.history.back();
            </script>
 <?php 
    }elseif(user_notexist($email)){
        $insert = "INSERT INTO `students`(`stu_id`, `firstname`, `lastname`, `email`, `password`, `gender`, `religion`, `phone`, `descr`, `expectation`, `photo`, `clearance`, `date`,`tolerance`,`study`,`belongings`,`neatness`,`sleep`) VALUES ('','$fname','$lname','$email','$passw','m','religion','070xxxxxxxx','Hello, write about yourself','Hey, I am looking for..write expectation','profile_pic_goes_here','0',NOW(),'','','','','')";
        $query = mysqli_query($con, $insert);
        if ($query) { ?>
            <script>
                window.alert('Sign up completed');
                window.location.href= "../login.php";
            </script>
            <?php 
            // header('LOCATION:index.php');
        } else { ?>
            <script>
                window.alert('Failed! Error occur');
                window.history.back();
            </script>
            <?php  }
        }else { ?>
            <script>
                window.alert('Oops! Email Already Exist.');
                window.history.back();
            </script>
            <?php  }
} ?>