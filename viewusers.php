<?php 

$con = mysqli_connect('localhost', 'root', '', 'tutorials');

$sql = "SELECT * FROM reg";
$req = mysqli_query($con, $sql);
$result = mysqli_fetch_all($req, MYSQLI_ASSOC);

 ?>



 <!DOCTYPE html>
<html>
<head>
	<title>Welcome to Adequate Couture</title><meta charset="utf-8">
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
	<!-- begining of navbar -->
	<nav class="nav navbar" style="background: blue; color:white">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h4 class="nav brand">Adequate Couture</h4>
				</div>
			</div>
		</div>
	</nav>
<!-- end of nav bar -->

<div class="container">
	<div class="row">
		<div class="col-md-6">
			
			<table class="table">
				<tr>
					<thead>
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Phone number</th>
					</thead>
				</tr>

				
						<?php foreach ($result as $results) { ?>
				<tr>
					<tbody>
							<td><?php echo $results['name'] ?></td>
							<td><?php echo $results['uname'] ?></td>
							<td><?php echo $results['email'] ?></td>
							<td><?php echo $results['phone'] ?></td>
						
					</tbody>
				</tr>
						<?php } ?>
	
			</table>




		</div>
		<div class="col-md-6">
			
		</div>
	</div>
</div>

