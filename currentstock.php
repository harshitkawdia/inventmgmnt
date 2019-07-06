<?php
	include('session.php');
    $sql = 'SELECT * FROM product';
	$result = mysqli_query($db,$sql); 
	$rows = array();
	
	while($row = mysqli_fetch_array($result)){
    	$rows[] = $row;	
	}
	include('inventoryAction.php');
?>

<html>

	<head>
		<title>Inventory</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="css/inventory.css">
		<script type="text/javascript">
			var products = <?php echo json_encode( $rows ) ?>;
		</script>
		<script src="js/dashboard.js"></script>
		<script src="js/inventory.js"></script>
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

				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="adminInventory.php">Admin Inventory</a>
					<ul><br>	

					<li><a href="currentstock.php">Current Stock</a></li>
					<li><a href="orderplaced.php">Order Placed</a></li>
					<li><a href="deadstock.php">Dead Stock</a></li>
					</ul>
         </li>
         <li><a href="users.php">User Details</a></li>
			</ul>
		</div>

	<div id="block">	
    <div id="main-area">
			<div id="welcome">
				<h1>Welcome <?php echo $login_session; ?></h1>
				
        <div class="container">
				<!-- /.row -->
				  <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">User Details</h3>

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
                <div class="card-body table-responsive ">
                  <table class="table table-hover">
                    <tr>
                      <th>UserID</th>
                      <th>User Name</th>
                      <th>User Type</th>
                      <th>User Email</th>
                      <th>Department</th>        
                      <th>More</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>admin</td>
                      <td>admin</td>
                      <td>admin@gmail.com</td>
                      <td>admin</td>
                      <td>
                        <button type="button" class="btn btn-primary">
                          More
                        </button>
                    
                      <td>
                    </tr>
                    <tr>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
				</div><!-- /.row -->
  </div>
	<br>		
  <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNew">
 	        Add New
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNew">
 	        Edit
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNew">
 	        Delete
        </button>
  </div> 
</div>
</div>
          <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"id="exampleModalLabel">New User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <form action="" method="post">
                
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="userid">UserId</label>
                            <input type="text" name="userid" id="userid"
                             placeholder="UserId" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="username">UserName</label>
                            <input type="text" name="username" id="username"
                             placeholder="UserName" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                             placeholder="example@example.com" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="usertype">UserType</label>
                            <select name="usertype" id="usertype" class="form-control">
                              <option value="">Select User Role</option>
                              <option value="1">Admin</option>
                              <option value="2">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

             </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
	</body>
</html>

