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
		<title>User Details</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">


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
				<li><a href="adminInventory.php">Admin Inventory</a></li>
        <ul><br>	
					<li><a href="currentstock.php">Current Stock</a></li>
					<li><a href="orderplaced.php">Order Placed</a></li>
					<li><a href="deadstock.php">Dead Stock</a></li>
					</ul>
              <li><a href="users.php">User Details</a></li>
					</ul>
			</ul>
		</div>

		
    <div class="container" id="main-area">
      <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Information</h3>

                <div class="card-tools">
                  <button class="btn btn-success" data-toggle="modal" 
                  data-target="#addNewModalLabel">Add New 
                  <i class="fa fa-user-plus fa-fw"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Modify</th>
                  </tr>
                  <tr>
                    <td>183</td>
                    <td>John Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td>
                        <a href="#">
                            <i class="fa fa-edit blue "></i>
                        </a>
                        /
                        <a href="#">
                            <i class="fa fa-trash red"></i>
                        </a>
                        
                    </td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div><!-- /.row -->
        <!-- modal -->
       
        <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
             <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addNewModalLabel">Add New</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            <form>
             <div class="modal-body">
                 <div class="form-group">
                     <input type="text" name="name"
                     placeholder="Name" class="form-control" >
                </div>

                <div class="form-group">
                    <input type="email" name="email"
                    placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password"  name="password"
                    placeholder="Password" class="form-control">
                </div>
                
                <div class="form-group">
                    <input type="text"  name="userid"
                    placeholder="User Id" class="form-control">
                </div>
            </div>
           
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Create</button>
              </div>
              </form>
             </div>
           
            </div>
        </div>
        
    </div>
	</body>

</html>

