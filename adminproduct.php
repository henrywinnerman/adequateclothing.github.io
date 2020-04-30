<?php 
$con = mysqli_connect('localhost', 'root', '', 'tutorials');

$sql = "SELECT * FROM products";
$req = mysqli_query($con, $sql);
$result = mysqli_fetch_all($req, MYSQLI_ASSOC);







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
			<div class="row">
				<div class="col-md-3">
					<h4 class="nav brand">Adequate Couture</h4>
					</div>
			</div>
		</div>
	</nav>

<div class="container">
	<div class="row">
			<table class="table">
				<tr>
					<thead>
						<th>Fabric Name</th>
						<th> Product Style</th>
						<th>Product Price</th>
						<th>Product Details</th>
						<th>Image</th>
					
					</thead>
				</tr>

				<?php foreach ($result as $results) 	{ ?>
				<tr>
					<thead>
						<td><?php echo $results['pro_name'] ?></td>
						<td><?php echo $results['pro_style'] ?></td>
						<td><?php echo $results['pro_price'] ?></td>
						<td><?php echo $results['pro_info'] ?></td>
						<td><?php echo "<img src='adminupload/".$results['img']."'>" ?></td>
						<td> <a href = "more.php?pro_id=<?php echo $results['pro_id'] ?>">More</a></td>
					</thead>
				</tr>

			<?php } ?>
			</table>
	
	
	</div>
</div>
	

	
 
 </body>
 </html>