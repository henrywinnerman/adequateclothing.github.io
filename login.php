<?php 

session_start();

$con = mysqli_connect('localhost', 'root', '', 'tutorials');

$errors  = array('uname' => '', 'pwd' => '');
$uname = $pwd = '';

if(isset($_POST["login"])) {

if (empty($_POST['uname']) || empty($_POST['pwd'])) {

			$errors['uname'] = $errors['pwd'] ="Please fill in the empty field";

		} else {
			$uname = $_POST['uname'];
			$pwd = $_POST['pwd'];

	$sql = mysqli_query($con, "SELECT * FROM reg WHERE uname = '".$_POST['uname']."' && pwd = '".$_POST['pwd']."' " );

	if (mysqli_num_rows($sql) > 0) {
		$_SESSION['uname']= $_POST['uname'];
		echo "Login Succesful";
		header('location:userspage.php');
	
			
			// $sql = mysqli_query($con, "SELECT * FROM reg WHERE uname = '$uname' and pwd = '$pwd'";

			// $req = mysqli_query($con, $sql);

			// if(mysqli_fetch_assoc($req)) {
			// 	header('location:userspage.php');

			  }  else  {
			$errors['uname'] =$errors['pwd'] = "Username or password does not exist";
			
		 }


	}
}











 ?>






<!DOCTYPE html>
<html>
<head>
	<title>Registration page</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<meta http-equiv="x-ua-compactible" content="ie-edge">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font4.7/css/font-awesome.css">
	<scrip-t type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.innerfade.js"></script>


</head>
<body style="background: url(images/tolu2.png);">
	<nav class="nav navbar" style = "background: blue; color: white;">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h3 class="nav brand">Adequate Couture</h3>
					</div>
					<div class = col-md-5></div>
					<div class = "col-md-4">
						<ul class ="nav navbar-nav" style=" float: left;">
							<li><a href="index.php" style = "color: white;">Home</a></li>
							<li><a href="reg.php" style = "color: white;">Register</a></li>
							<li><a href="#" style = "color: white;">Login</a></li>
							<li><a href="userspage.php" style = "color: white">Products</a></li>
						</ul>

					</div>
			</div>
		</div>
	</nav>
		<div class="container">
	<div class="row">
		<div class="col-md-4"></div>

		<div class="col-md-4">
			
			<h4>Log in !</h4>
			<hr>

			<form class="form" action="login.php" method="POST">
				
				
				<div class="input-form">
					<label>Enter Username</label>
					<input type="text" name="uname" class="form-control" value = "<?php echo $uname ?>">
					<div style = "color: red;"><?php echo $errors['uname'] ?></div>
				</div>

				
				<div class="input-form">
					<label>Enter Password</label>
					<input type="password" name="pwd" class="form-control" value = "<?php echo $pwd ?>">
					<div style = "color: red;"> <?php echo $errors['pwd'] ?></div>
				</div>

			<br>

				<div class="input-form">

					<input type="submit" name = "login" value= "log in" class ="form-control btn btn-primary">
				</div>

			</form>
		</div>
	<div class="col-md-4"></div>
</div>
</div>

