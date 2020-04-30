<?php 
session_start();


$con = mysqli_connect('localhost', 'root', '', 'tutorials');
if(!isset($_SESSION['uname'])) {
	echo "<script>alert ('Please log in!')</script>";
	header ('location = index.php');

}
// } else {

// 	$query =  "SELECT * FROM reg WHERE $uname = '".$_SESSION['uname']."'";

// 	$result = mysqli_query($con, $query);

// 		}



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
					<div class="col-md-6"></div>
					<div class="col-md-3">
						<ul>
							<li><?php echo $_SESSION['uname'];?></li>
							<li><a href="logout.php" class="btn btn-success">Logout</a></li>
							</ul>
					</div>
			</div>
		</div>
	</nav>

<div class="container">
	<div class="row">

		<table class="table">
				<tr>
					<thead>
						<th>Product</th>
						
					</thead>
				</tr>
				<tr>
					<thead>
				<?php foreach ($result as $results) { ?>
				
						<td> <?php echo "<img src='adminupload/".$results['img']."'>" ?>
						<p><?php echo $results['pro_style'] ?></p><p> <?php echo $results['pro_price'] ?></p><p><?php echo $results['pro_info'] ?></p><p><?php echo $results['pro_name'] ?> </p></td>
		
					
			<?php } ?>
			</thead>
				</tr>
			</table>
	</div>
</div>

	

	
 
 </body>
 </html>