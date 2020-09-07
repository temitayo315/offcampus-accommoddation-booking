<?php
include 'connect.php';
include 'core.inc.php';



$prpid=$_GET['propID'];

$_SESSION['redirect'] = "process_favourite1.php?propID=$prpid";


		if(!loggedin()){
			header('LOCATION:../../sign_up.php?p_id='.$prpid);
		}else{
		    header('LOCATION:process_favourite2.php?p_id='.$prpid);
    
       }


?>