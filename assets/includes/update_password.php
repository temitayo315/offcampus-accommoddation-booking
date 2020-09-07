<?php

require'connect.php';
require'core.inc.php';



$aq=mysqli_query($con,"select * from agents where id='".$_SESSION['id']."'");
        $arow=mysqli_fetch_array($aq);
	
	$curpass=sha1($_POST['curpass']);
	$newpass=sha1($_POST['newpass']);
	$repnewpass=sha1($_POST['repnewpass']);
	
	if($curpass == $arow['password'] && $newpass == $repnewpass ){
		
		mysqli_query($con,"update agents set password ='$newpass' where id='".$_SESSION['id']."'");
		?>
		<script>
			window.alert('Account updated successfully!');
			window.history.back();
		</script>
		<?php
	}else if($curpass!=$arow['password']){
		?>
		<script>
			window.alert('Current password did not match. Account not updated!');
			window.history.back();
		</script>
		<?php	
	}else if($newpass!=$repnewpass){
		?>
		<script>
			window.alert('New passwords did not match. Account not updated!');
			window.history.back();
		</script>
		<?php
	}
	
		
?>