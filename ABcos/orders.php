<!DOCTYPE html>
<html lang="en">
<?php include "header.php" ?>	
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Orders <small>management</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-shopping-cart"></i> Orders
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Hey  <?= $username ?>, did you know every order you add increases your salary 
							bonus? may the force be with you!!!
							</strong>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                
				
			</div>
        <!-- /#page-wrapper -->
			<div class="container">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">Add</a></li>
		<li><a data-toggle="tab" href="#menu1">View</a></li>
		<li><a data-toggle="tab" href="#menu2">Delete</a></li>
    </ul>
 <div class="tab-content">
	<div id="home" class="tab-pane fade in active">
		  <h1><center/>Add Orders</h1>
		  <form class="form-horizontal" action="orders.php" method="POST">
			<div class="form-group">
			  <label class="control-label col-sm-2" for="customer">Customer Name:</label>
			  <div class="col-sm-10">          
				<input type="text" class="form-control" id="customer" placeholder="Enter customer name" name="customer" required/>
			  </div>
			</div>
			<div class="form-group">        
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Submit</button>
			  </div>
			</div>
		  </form>
		<?php
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			require_once './connect.php';
			if (isset($_POST["customer"])) { //check if user click on the submit
			$date = date("Y/m/d");
			$time = date("h:i:sa");
			$staff = $_SESSION["user"];
			$customer = $_POST["customer"];
            $result = mysqli_query($conn, "INSERT INTO orders (Odate, Otime, username, CustName) 
			VALUES ('$date', '$time', '$staff', '$customer')");
			if($result){
				echo "<br/>";
				echo "<div class=\"container\">
						  <div class=\"alert alert-success alert-dismissable\">
						  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
							<strong>Yessss!</strong> Order added, that was easy right? 
							<a href=\"orderdetails.php\" class=\"forgot-password\">
							Proceed to add products to <strong>Order</strong>
						</a>.
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
				echo ("Error description: " . mysqli_error($conn));
			}
			}
		?>
	</div>
	<div id="menu1" class="tab-pane fade">
	<?
			$result = mysqli_query($conn, "Select * FROM orders");
		?>
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Orders Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
												<th>Order Time</th>
                                                <th>Customer</th>
                                            </tr>
                                        </thead>
										<?
										while ($row = mysqli_fetch_array($result)) {
										?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row["Id"]; ?></td>
                                                <td><?php echo $row["Odate"]; ?></td>
                                                <td><?php echo $row["Otime"]; ?></td>
												<td><?php echo $row["CustName"]; ?></td>
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
		
	</div>
</div>
</div>
		</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
