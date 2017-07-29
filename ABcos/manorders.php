<!DOCTYPE html>
<html lang="en">
<?php include "manheader.php" ?>	
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
                            <i class="fa fa-info-circle"></i>  <strong>Hey  <?= $username ?>, you can view all orders including staffs who made the order,
							you're the boss!!!
							</strong>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                
				
			</div>
        <!-- /#page-wrapper -->
			<div class="container-fluid">
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
												<th>Staff</th>
                                                <th>Order Date</th>
												<th>Order Time</th>
                                                <th>Quantity</th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
										<?
										while ($row = mysqli_fetch_array($result)) {
										?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row["Id"]; ?></td>
												<td><?php echo $row["username"]; ?></td>
                                                <td><?php echo $row["Odate"]; ?></td>
                                                <td><?php echo $row["Otime"]; ?></td>
												<td><?php echo $row["Qty"]; ?></td>
                                                <td>$<?php echo $row["Amount"]; ?></td>
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
</div>
</div>
		</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
