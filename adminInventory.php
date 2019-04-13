<?php
	include('session.php');
    $sql = 'SELECT * FROM sales';
	$result = mysqli_query($db,$sql); 
	$rows = array();
	
	while($row = mysqli_fetch_array($result)){
    	$rows[] = $row;	
	}
	include('inventoryAction.php');
?>

<html>

	<head>
		<title>Admin Inventory</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="css/sales.css">
		<script type="text/javascript">
			var products = <?php echo json_encode( $rows ) ?>;
		</script>
		<script src="js/dashboard.js"></script>
		<script src="js/sales.js"></script>
	</head>

	<body>
		<div id="top-bar">
			<nav>
				<ul>
					<li><a href="dashboard.php">Home</a></li>
					<li><a href="comment.php">Message</a></li>
					<li><a href="reference.php" target="_blank">About</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>	
		<div id = "side-navagate-bar">
			<div class = "toggle-btn" onclick="toggleSideBar()">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<ul>
				<li><h2 id="logo">Lab Stock Management</h2></li>
				<li><a href="sales.php">Sales</a></li>
				<li><a href="inventory1.php">Inventory</a></li>
					<ul><br>	
					<li><a href="inventory.php">Current Stock</a></li>
					<li><a href="inventory.php">Order Placed</a></li>
					<li><a href="inventory.php">Deprecated Stock</a></li>
					</ul>
			</ul>
		</div>

		<div id="block">

		<div id="main-area">
			<div id="welcome">
				<h1 class="fonthead text-dark">Welcome <?php echo $login_session; ?></h1>
					

					<div class="row">						
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
						  <div class="shadow p-4 mb-4 rounded-lg">
						  <!-- small box -->
							<div class="info-box bg-info text-body img-rounded">
							<h1><a href="inventory.php" ><span class="info-box-icon"><img src="img/available.png"></i></span></a></h1>
								<div class="info-box-content">
									<h1> 
										<a href="inventory.php" class="text-light fontsub box">Current Stock</a>
									</h1>
								</div>
							</div>
						  </div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
						  <div class="shadow p-4 mb-4 rounded-lg">
						  <!-- small box -->
							<div class="info-box bg-warning text-body img-rounded">
							<h1><a href="inventory.php" ><span class="info-box-icon"><img src="img/order.png"></i></span></a></h1>
								<div class="info-box-content">
									<h1> 
										<a href="inventory.php" class="text-light fontsub box">Order Placed</a>
									</h1>
								</div>
							</div>
						  </div>
						</div>
						
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
						  <div class="shadow p-4 mb-4 rounded-lg">
						  <!-- small box -->
							<div class="info-box bg-danger text-body img-rounded">
							<h1><a href="inventory.php" ><span class="info-box-icon centre-block font" ><img src="img/deprecated.png"></span></a></h1>
								<div class="info-box-content">
									<h1> 
										<a href="inventory.php" class="text-light fontsub box">Deprecated Stock</a>
									</h1>
								</div>
							</div>
						  </div>
						</div>
						
						
					<!-- ./col -->
					</div>
					<br>
				</div>
			</div>
		</div>
	</body>

</html>

