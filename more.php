<?php

$con = mysqli_connect('localhost','root','','tutorials');

if (isset($_GET['pro_id'])) {
	$pro_id = mysqli_real_escape_string($con, $_GET['pro_id']);

	$sql = "SELECT pro_name, pro_style, pro_price, pro_info, pro_id FROM products WHERE pro_id = '$pro_id'";

	$req = mysqli_query($con, $sql);

	$result = mysqli_fetch_assoc($req);
	}

//for delete

if (isset($_POST['delete'])) {

	$id_delete = mysqli_real_escape_string($con, $_POST['id_delete']);

	$sql1 = "DELETE FROM products WHERE pro_id = '$id_delete'";
	$req1 = mysqli_query($con, $sql1);

	echo "successful";
}








// $con = mysqli_connect('localhost', 'root', '', 'tutorials');

// if(isset($_GET['pro_id'])) {
// $pro_id = mysqli_real_escape_string($con, $_GET['pro_id']);

// $sql = "SELECT pro_name, pro_style, pro_price, pro_info FROM products WHERE pro_id = '$pro_id'";

// $req = mysqli_query($con, $sql);

// $result = mysqli_fetch_assoc($req);

// 	}
	


// if(isset($_POST['delete'])) {
// $id_delete = mysqli_real_escape_string($con, $_POST['id_delete']);

// $sql1 = "DELETE FROM products WHERE pro_id = '$id_delete'";

// $req1 = mysqli_query($con, $sql1);

// echo "Deleted";

// }




 ?>





 <!DOCTYPE html>
 <html>
 <head>
 	<title>elcome to Adequate Couture</title>
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
 	<nav class="nav navbar" style = "background: blue; color:white;">
 		<div class = "container">
 			<div class = "row">
 				<div class = col-md-3>
 				<h4 class = "nav brand">Adequate Couture</h4>
 				</div>
		</div>
 	<div>
 </nav>

 <div class="container">
	<div class="row">
		<div class="col-md-9">
			
			<table class="table">
				<tr>
					<thead>
						<th>Fabric Name</th>
						<th>Product Style</th>
						<th>Product Price</th>
						<th>Product Description</th>
						<th>Image</th>
				
					</thead>
				</tr>

				
						<?php if($result){ ?>
				<tr>
					<tbody>
							<td><?php echo $result['pro_name'] ?></td>
							<td><?php echo $result['pro_style'] ?></td>
							<td><?php echo $result['pro_price'] ?></td>
							<td><?php echo $result['pro_info'] ?></td>
							<td><?php echo $result ['img'] ?></td>
					
								<form class="form" action = "more.php" method = "POST" >
									<input type="hidden" name="id_delete" value = "<?php echo $result['pro_id'] ?>">
									<input type="submit" name="delete" value= "Delete" class = "from-control btn btn-danger">
								</form>
							</td>
							<td><a href="update.php?pro_id=<?php echo $result['pro_id']?>" class = "btn btn-primary">Update</a></td>
					</tbody>
				</tr>
						<?php } ?>
			</table>
		</div>
	<div class = "col-md-3"></div>
</div>
</div>
</body>
</html>