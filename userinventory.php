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
		<title>User Inventory</title>
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
				<li><h6 class="fontsub text-light">Welcome <?php echo $login_session; ?></h6></li>
				<li><a href="userinventory.php">User Inventory</a></li>
			</ul>
		</div>
		<div id="block">
			<div id="main-area">
			<div>
				<h1 class="card-title fonthead text-light" style="text-align:center ">Current Stock</h1>
			</div>				
				
			
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					

					<!--<div class="card-tools">
						<button id="addBtn" class="btn btn-success" data-toggle="modal" 
                  				data-target="#addNewModal">Add 
                  				<i class="fa fa-user-plus fa-fw"></i>
						</button>
	

						<button class="btn btn-success" data-toggle="modal" 
                  				data-target="#updateNewModal">Update 
                  				<i class="fa fa-user-plus fa-fw"></i>
						</button>

						<button class="btn btn-danger" data-toggle="modal" 
                  				data-target="#deleteNewModal">Delete 
                  				<i class="fa fa-user-plus fa-fw"></i>
						</button>

						<button class="btn btn-primary " style="margin-left:72%" data-toggle="modal" 
                  				data-target="#updateNewModal">Submit 
                  				<i class="fa fa-user-plus fa-fw"></i>
						</button>

					</div>-->
				</div>
				<!-- /.card-header -->
				<div class="card-body table-responsive p-0">
					<table class="table table-hover center-block">
						<tr>
							<th>User ID</th>
							<th>User Name</th>
							<th>Eq. Id</th>
							<th>Eq. Details</th>
							<th>Issued By</th>
							<th>Assigned on</th>
							<th>Issues Raised</th>
						</tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th><button type="button" class="btn btn-success" onclick="feedback.php">Feedback</button></th>
						<tr>
							
						<tr>
				
						</table>
						</div>
						<!-- /.card-body -->
						</div>
						<!-- /.card -->
						</div>
						</div><!-- /.row -->
						</div>
				
				
				<script>
					// Get the modal
					var modal = document.getElementsByClassName("modal");
					
					// Get the button that opens the modal
					var btn = document.getElementsByClassName("Btn");
					
					// Get the <span> element that closes the modal
					var span = document.getElementsByClassName("close");
					
					// When the user clicks the button, open the modal 
					btn[0].onclick = function() {
					    modal[0].style.display = "block";
					}
					
					btn[1].onclick = function() {
					    modal[1].style.display = "block";
					}
					
					btn[2].onclick = function() {
					    modal[2].style.display = "block";
					}
					
					
					// When the user clicks on <span> (x), close the modal
					span[0].onclick = function() {
					    modal[0].style.display = "none";
					}
					
					span[1].onclick = function() {
					    modal[1].style.display = "none";
					}
					
					span[2].onclick = function() {
					    modal[2].style.display = "none";
					}
					
					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
					    if (event.target == modal) {
					        modal.style.display = "none";
					    }
					}
				</script>
			</div>

			</div>
		</div>
				
			</div>
		</div>
	</body>

</html>