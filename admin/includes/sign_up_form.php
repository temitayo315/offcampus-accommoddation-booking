 <?php
 require'connect.php';
 require'core.inc.php';



    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['pass2'];
    $terms = $_POST['checked_terms'];


    if(user_notexist($email)){
        if (register($name,$email,$pass,$terms)) { ?>
            <script>
                window.alert('User Added Successfully!');
                window.history.back();
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