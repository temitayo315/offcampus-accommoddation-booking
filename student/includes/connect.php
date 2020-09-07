<?php
// the name of the host of the database
$host='localhost';
// username of the host subscriber nt users to be logged in
$user_db ='root';
//password of d mysql host username
$password = '';
// the name of the database
$db = 'properti_connect_db';
$connect_error = 'couldn\'t connect';
$con=mysqli_connect($host,$user_db,$password,$db);


if (mysqli_connect_errno()) {
	die($connect_error);
}









?> 