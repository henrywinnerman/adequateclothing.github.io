<?php 

if (isset($_SESSION['uname'])) {
	unset($_SESSION['uname']);
	header('location:index.php');
} else 
	header('location:index.php')



 ?>