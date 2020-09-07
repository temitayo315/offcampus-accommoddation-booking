 <?php
 require'connect.php';
 require'core.inc.php';



    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass2'];
    //$terms = $_POST['checked_terms'];


    if(user_notexist($email)){
        if (register($fname, $lname, $email,$pass)) { ?>
            <script>
                window.alert('User Added Successfully!');
                window.location.href= "../../sign_in.php";
            </script>
            <?php 
            // header('LOCATION:index.php');
        } else { ?>
            <script>
                window.alert('Adding New User Failed!');
                window.history.back();
            </script>
            <?php  }




    }else{ ?>
            <script>
                window.alert('Adding New User Failed, Email Already Exists!');
                window.history.back();
            </script>
            <?php 

} ?>