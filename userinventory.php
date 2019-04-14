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
				<li><a href="sales.php">Sales</a></li>
				<li><a href="userinventory.php">User Inventory</a></li>
			</ul>
		</div>
		<div id="block">
			<div id="main-area">
				<div id="welcome">
					<h1 class="fonthead text-light">Welcome <?php echo $login_session; ?></h1>
				</div>
	
				<div>
				<div class="row">
				<div class="col-12">
				<div class="card">
				<div class="card-header">
				<h3 class="card-title">User Inventory Table</h3>

				<div class="card-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
				<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

				<div class="input-group-append">
				<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				</div>
				</div>
				</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body table-responsive p-0">
				<table class="table table-hover">
				<tr>
				<th>ID</th>
				<th>User</th>
				<th>Date</th>
				<th>Status</th>
				<th>Reason</th>
				</tr>
				<tr>
				<td>183</td>
				<td>John Doe</td>
				<td>11-7-2014</td>
				<td><span class="tag tag-success">Approved</span></td>
				<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
				</tr>
				<tr>
				<td>219</td>
				<td>Alexander Pierce</td>
				<td>11-7-2014</td>
				<td><span class="tag tag-warning">Pending</span></td>
				<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
				</tr>
				<tr>
				<td>657</td>
				<td>Bob Doe</td>
				<td>11-7-2014</td>
				<td><span class="tag tag-primary">Approved</span></td>
				<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
				</tr>
				<tr>
				<td>175</td>
				<td>Mike Doe</td>
				<td>11-7-2014</td>
				<td><span class="tag tag-danger">Denied</span></td>
				<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
				</tr>
				</table>
				</div>
				<!-- /.card-body -->
				</div>
				<!-- /.card -->
				</div>
				</div><!-- /.row -->
				</div>
				
				
				<div id="addItem">
					<button id="editBtn" onclick="edit()">Edit</button>
					<button id="addBtn" class="Btn">Add Item</button>
					<button id="addBtn" class="Btn">Delete Item</button>
					<button id="updateBtn" class="Btn">Update Sale</button>
					<form id="submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<div id="addModal" onclick="model()" class="modal">
							<div class="modal-content">
    							<span class="close">&times;</span>
								<div class="modal-body">
									<table>	
										<tr><td>Item Name: </td><td><input type="text" placeholder="itemName" name="item"></td></tr>
										<tr><td>#In-Stock: </td><td><input type="text" placeholder="storage" name="storage"></td></tr>
										<tr><td>Unit Price: </td><td><input type="text" placeholder="unitPrice" name="unitPrice"></td></tr>
										<tr><td>Sell Price: </td><td><input type="text" placeholder="sellPrice" name="sellPrice"></td></tr>
										<tr><td>Date: </td><td><input type="date" placeholder="date" name="date"></td></tr>
									</table>
									<br>
									<button id="addBtn" name="add">Add</button>
								</div>
							</div>
						</div>
						<div>
							<?php echo $message; ?>
						</div>
						<div id="deleteModal" onclick="model()" class="modal">
							<div class="modal-content">
    							<span class="close">&times;</span>
								<div class="modal-body">
									<table>	
										<tr><td>Item ID: </td><td><input type="text" placeholder="itemId" name="itemId"></td></tr>
									</table>
									<br>
									<button id="addBtn" name="delete">Delete</button>
								</div>
							</div>
						</div>
						<div>
						</div>
					</form>
				</div>
				
				<br>
				
				<form id="submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div id="Product_Panel">
						<button name="edit" id="editBtn">Submit Change</button>
						<div id="updateModal" onclick="model()" class="modal">
							<div class="modal-content">
								<span class="close">&times;</span>
								<div class="modal-body">
									<table>
										<tr><td>Item Id: </td><td><input type="text" placeholder="itemId" name="itemId"></td></tr>
										<tr><td>Item Name: </td><td><input type="text" placeholder="itemName" name="item"></td></tr>
										<tr><td>Quantity: </td><td><input type="text" placeholder="quantity" name="quantity"></td></tr>
										<tr><td>Date: </td><td><input type="date" placeholder="date" name="date"></td></tr>
									</table>
									<br>
									<button id="editBtn" name="updateSale">Update Sale</button>
								</div>
							</div>
						</div>
						<div>
						</div>
						<br>
					</div>	
				</form>
				
				
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
	</body>

</html>