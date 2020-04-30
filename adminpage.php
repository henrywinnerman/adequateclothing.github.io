<?php 

$con = mysqli_connect('localhost', 'root', '', 'tutorials');

if(isset($_POST['addpro'])) {

	$pro_name = $_POST['pro_name'];
	$pro_style = $_POST['pro_style'];
	$pro_price = $_POST['pro_price'];
	$pro_info = $_POST['pro_info'];

	
		$picname = $_FILES['img'] ['name'];
		$pictemp = $_FILES['img'] ['tmp_name'];		
		$loc = 'adminupload/' .$picname;
		move_uploaded_file($pictemp, $loc);




$sql = "INSERT INTO products (pro_name, pro_style, pro_price, pro_info, img) VALUES ('$pro_name', '$pro_style', '$pro_price', '$pro_info', '$picname')";
$req = mysqli_query($con, $sql);




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
					<h4 class="nav brand">Adequate Couture</h4>
					</div>
			</div>
		</div>
	</nav>
<!-- end of nav -->
	<div class="container">
		<div class="row">
			<div class = "col-md-4"></div>
			<div class = "col-md-4">
			<h4>Add Products</h4>
			<hr>

			<form class="form" action = adminpage.php method = 'POST' enctype = "multipart/form-data">
				<div class="input-form">
				<label>Enter Fabric Name</label>
				<input type="text" name="pro_name" class = "form-control">
				</div>

				<div class="input-form">
			<label>Enter Product Style</label>
				<input type="text" name="pro_style" class = "form-control">
				</div>


				<div class="input-form">
			<label>Enter Product Price</label>
				<input type="text" name="pro_price" class = "form-control">
				</div>

				

				<div class="input-form">
				<label>Enter Product Description</label>
				<textarea name = "pro_info" class = "form-control"></textarea>
				</div>

				<div class="input-form">
			<label>Choose Image</label>
				<input type="file" name="img" class = "form-control">
				</div>


				<br/>
				<div class="input-form">
					
					<input type="submit" name="addpro" value ="Add product "class="form-control btn btn-primary">
				</div>

			</form>

			</div>
		</div class = "col-md-4">
	</div>
</div>
</body>
</html>