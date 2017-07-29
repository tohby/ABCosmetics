<!DOCTYPE html>
<html lang="en">
<?php include "header.php" ?>	
<body>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
	<div class="col-lg-12">
                        <h1 class="page-header">
                            Products <small>overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-tags"></i> Products
                            </li>
                        </ol>
                    </div>
</div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Welcome  <?= $username ?>,use the tabs below to select the action to perform. Fill the form below to add a new product</strong>
                        </div>
                    </div>
                </div>
</div>
<div class="container">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">Add</a></li>
		<li><a data-toggle="tab" href="#menu1">View</a></li>
		<li><a data-toggle="tab" href="#menu2">Update</a></li>
    </ul>
 <div class="tab-content">
	<div id="home" class="tab-pane fade in active">
		  <h1><center/>Add Product</h1>
		  <form class="form-horizontal" action="product.php" method="POST">
			<div class="form-group">
			  <label class="control-label col-sm-2" for="text">Name:</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="name" placeholder="Enter product name" name="name" required/>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="desc">Description:</label>
			  <div class="col-sm-10">          
				<textarea class="form-control" rows="5" id="desc" placeholder="Enter product Description" name="desc" required/></textarea>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="amount">Amount:</label>
			  <div class="col-sm-10">          
				<input type="number" class="form-control" rows="1" id="amount" placeholder="Enter product Amount" name="amount" required/>
			  </div>
			</div>
			<div class="form-group">        
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Submit</button>
			  </div>
			</div>
		  </form>
		  <?php
				//error_reporting(E_ALL);
				//ini_set('display_errors', 1);
				//require_once './connect.php';
				if (isset($_POST["name"])) { //check if user click on the submit
					$name = $_POST["name"];
					$desc = $_POST["desc"];
					$amount = $_POST["amount"];
					$result = mysqli_query($conn, "INSERT INTO products (Pname, Description, Amount) VALUES ('$name', '$desc', '$amount')");
					if($result){
						echo "<br/>";
						echo "<div class=\"container\">
								  <div class=\"alert alert-success alert-dismissable\">
								  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
									<strong>Yessss!</strong> Product added, that was easy right? .
								  </div>
								  </div>";
					}else{
						echo "<br/>";
						echo "<div class=\"container\">
								  <div class=\"alert alert-danger alert-dismissable\">
								  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
									<strong>Oops!</strong> something went wrong, please try again don't panic, we've got this.
								  </div>
								  </div>"; 
						//echo ("Error description: " . mysqli_error($conn));
				}
				}
		?>
	</div>
	<div id="menu1" class="tab-pane fade">
		<?
			$result = mysqli_query($conn, "Select * FROM products");
		?>
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Products Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product #</th>
                                                <th>Product Name</th>
                                                <th>Description</th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
										<?
										while ($row = mysqli_fetch_array($result)) {
										?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row["Id"]; ?></td>
                                                <td><?php echo $row["Pname"]; ?></td>
                                                <td><?php echo $row["Description"]; ?></td>
                                                <td><?php echo $row["Amount"]; ?></td>
                                            </tr>
                                        </tbody>
										<?
										}
										?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	</div>
	<div id="menu2" class="tab-pane fade">
		<h1><center/>Update Products</h1>
		  <a href="updateproducts.php"> Go to update page </a>
	</div>
</div>
</div>
</center>

</div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
