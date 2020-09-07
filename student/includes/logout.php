<?php 
require 'core.inc.php';
session_destroy();
header('LOCATION:../login.php');
?>