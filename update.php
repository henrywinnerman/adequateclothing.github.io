<?php 
$con = mysqli_connect('localhost', 'root', '', 'tutorials');


if (isset($_POST['update'])) {

	$pro_name = $_POST['pro_name'];
	$pro_style = $_POST['pro_style'];
	$pro_price = $_POST['pro_price'];
	$pro_info = $_POST['pro_info'];




		$picname = $_FILES['img'] ['name'];
		$pictemp = $_FILES['img'] ['tmp_name'];		
		$loc = 'adminupload/' .$picname;
		move_uploaded_file($pictemp, $loc);



	$sql = "UPDATE products SET pro_name = '$pro_name', pro_style = '$pro_style', pro_price = '$pro_price', pro_info = '$pro_info', img ='$picname'";
	$req = mysqli_query($con, $sql);

	echo $req;
}


if (isset($_GET['pro_id'])) {
	$pro_id = mysqli_real_escape_string($con, $_GET['pro_id']);

	$sql = "SELECT pro_name, pro_style, pro_price, pro_info, pro_id, img FROM products WHERE pro_id = '$pro_id'";

	$req = mysqli_query($con, $sql);

	$result = mysqli_fetch_assoc($req);
}




// if(isset($_POST['update'])); {

// 	$pro_name = $_POST['pro_name'];
// 	$pro_style = $_POST['pro_style'];
// 	$pro_price = $_POST['pro_price'];
// 	$pro_info = $_POST['pro_info'];

// 	$sql = "UPDATE products SET pro_name = '$pro_name', pro_style ='$pro_style', pro_price = $pro_price, pro_info = $pro_info";

// 	$req = mysqli_query($con, $sql);

// 	echo $req;
// 		}




// if(isset($_GET['pro_id'])); {

// $pro_id = mysqli_real_escape_string($con, $_GET['pro_id']);

// $sql = "SELECT pro_name, pro_style, pro_price, pro_info, pro_id FROM products WHERE pro_id = '$pro_id'";

// $req = mysqli_query($con, $sql);

// $result = mysqli_fetch_assoc($req);

	



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
	<scrip-t type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.innerfade.js"></script>

</head>
<body>
<nav class="nav navbar" style = "background: blue; color: white;">
	<div class="container">
		<div class = "row">
			<div class = "col-md-3">
				<h4 class = "nav brand">Adequate Coture</h4>
				</div>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class = "row">
			<div class = "col-md-9">
			<table>
					<tr>
					<thead>
						<th>Fabric Name</th>
						<th>Product Style</th>
						<th>Product Price</th>
						<th>Product Info</th>
						<th>Image</th>
						</thead>
						</tr>

						<?php if($result) { ?>
							<tr>
								<tbody>
									<td><?php echo $result['pro_name'] ?></td>
									<td><?php echo $result['pro_style'] ?></td>
									<td><?php echo $result['pro_price'] ?></td>
									<td><?php echo $result['pro_info'] ?></td>
									<td><?php echo "<img src='adminupload/".$result['img']."'>" ?></td>
								</tbody>
							</tr>

						<?php } ?>
				</table>
			</div>
			<div class = "col-md-3">
				<h4>Update Products</h4>
			<hr>

			<form class="form" action = update.php method = 'POST'>
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
				<input type="file" name = "img" class = "form-control">
				</div>


				<br/>
				<div class="input-form">
					
					<input type="submit" name="update" value ="Update" class="form-control btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</body>
</html>































































	
				

		</div>
		

	</div>




</body>
</html>







