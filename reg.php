<?php 


$con = mysqli_connect('localhost', 'root', '', 'tutorials');

$name = $uname = $email = $pwd = $phone = $img = $ch ='';
$errors = array('name' => '', 'uname' => '', 'email' => '', 'pwd'=> '', 'phone'=> '');


if (isset($_POST['reg'])) {

// name
	if(empty($_POST['name'])) {
		$errors['name'] = "Enter name";

	}else {
		$name = $_POST['name'];
		if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
		$errors['name'] = "No special character needed";
		}

	}

	// uname
	if (empty($_POST['uname'])) {
		$errors['uname'] = "Enter username";

	}else {
		$uname = $_POST['uname'];
		if (!preg_match("/^[a-zA-Z\s]+$/", $uname)) {
		$errors['uname'] = "No special character needed";
		}

	}

	// email
	if(empty($_POST['email'])) {
		$errors['email'] = "Enter email";
	}else { 
		$email =$_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Invalid email";
		}
	}
	// pwd
	if(empty($_POST['pwd'])){
		$errors['pwd'] = "Enter password";
	}else {
		$pwd = $_POST['pwd'];
		$lowercase = preg_match('@[a-z]@', $pwd);
		$digit = preg_match('@[0-9]@', $pwd);
		$chars = preg_match('@[^\w]@', $pwd);
		
		if (!$lowercase || !$digit || !$chars || strlen($pwd)  < 8){
		$errors['pwd'] = "Password must contain a number, a character and must not be less than 8";
		
		}
	}



	// phone number validation
	if(empty($_POST['phone'])) {
		$errors['phone'] = "Enter Phone number";
			
			}


			$picname = $_FILES['img'] ['name'];
			$pictemp = $_FILES['img'] ['tmp_name'];		
			$loc = 'upload/' .$picname;
			move_uploaded_file($pictemp, $loc);


		
		//check if username already exists

		$usercheck = "SELECT * FROM reg WHERE uname = '$uname'";

		$recheck = mysqli_query($con, $usercheck);

		if (mysqli_num_rows($recheck) > 0) {

			$errors['uname'] = "Username already exists";

		}

		// check if email already exists

		// $emailcheck = "SELECT * FROM reg WHERE email ='$email'";
		// $emailrecheck = mysqli_query($con, $emailcheck);
		// if(mysqli_num_rows($emailrecheck) > 0) {
		// 	$errors['email'] = "Email already exists";

		// 	}

			//  Insert information to database

	if (!array_filter($errors)) {
		$sql = "INSERT INTO reg (name, uname, email, pwd, phone, img) VALUES ('$name', '$uname', '$email', '$pwd', '$phone', '$picname')";
		$req =mysqli_query($con, $sql);

		header('location:login.php');
	

			}

		}



?>











<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Adequate Couture</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<meta http-equiv="x-ua-compactible" content="ie-edge">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font4.7/css/font-awesome.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.innerfade.js"></script>


</head>
<body>
	<nav class="nav navbar" style = "background: blue; color: white;">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h3 class="nav brand">Adequate Couture</h3>
					</div>
					<div class = "col-md-5"></div>
					<div class = "col-md-4">
						<ul class ="nav navbar-nav" style=" float: left;">
							<li><a href="index.php" style = "color: white;">Home</a></li>
							<li><a href="#" style = "color: white;">Register</a></li>
							<li><a href="login.php" style = "color:white;">Login</a></li>
							<li><a href="userspage.php" style = "color:white;">Products</a></li>
						</ul>
						</div>
			</div>
		</div>
	</nav>
		<div class="container">
	<div class="row">
		<div class= "col-md-6" style = "background: url(images/tolu.png); height: 570px; padding-right:4em;">
		</div>

		<div class="col-md-6">
			
			<h4>Register Here !</h4>
			<hr>

			<form class="form" action="reg.php" method="POST" enctype="multipart/form-data">

				
				<div class="input-form">
					<label>Enter First Name</label>
					<input type="text" name="name" class="form-control" value = "<?php echo $name ?>">
					<div style="color: red"> <?php echo $errors['name'] ?></div>
				</div>

				<div class="input-form">
					<label>Enter Username</label>
					<input type="text" name="uname" class="form-control" value = "<?php echo $uname ?>">
					<div style="color: red"> <?php echo $errors['uname'] ?></div>
				</div>

				<div class="input-form">
					<label>Enter email</label>
					<input type="text" name="email" class="form-control" value = "<?php echo $email ?>">
					<div style = "color:red"> <?php echo $errors['email'] ?></div>
				</div>

				<div class="input-form">
					<label>Enter Password</label>
					<input type="password" name="pwd" class="form-control" value = "<?php echo $pwd ?>">
				<div style = "color:red"> <?php echo $errors['pwd'] ?></div>
				</div>

				<div class="input-form">
					<label>Enter Phone number</label>
					<input type="number" name="phone" class="form-control" value = "<?php echo $phone ?>">
					<div style ="color:red"> <?php echo $errors['phone'] ?></div>
					</div>

					<div class="input-form">
					<label>Choose image</label>
					<input type="file" name="img" class="form-control">
					</div>
				
				<br>

				<div class="input-form">

					<input type="submit" name = "reg" value= "Register" class ="form-control btn btn-primary">
				</div>

			</form>
		</div>
		<div class = "col-nd-4"></div>
</div>
</div>

</body>
</html>