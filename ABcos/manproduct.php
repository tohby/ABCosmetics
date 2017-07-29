<!DOCTYPE html>
<html lang="en">
<?php include "manheader.php" ?>	
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
	</div>
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
	
</div>
</div>
</center>

</div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
