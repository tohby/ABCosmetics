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
                            <i class="fa fa-info-circle"></i>  <strong>Hey  <?= $username ?>, this is the list of all your staff, trust me they work really hard.
							</strong>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                
				
			</div>
        <!-- /#page-wrapper -->
			<div class="container-fluid">
	<?
			$result = mysqli_query($conn, "Select * FROM staff");
		?>
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Staffs</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>FUll Name</th>
                                                <th>Username</th>
												<th>E-mail</th>
                                            </tr>
                                        </thead>
										<?
										while ($row = mysqli_fetch_array($result)) {
										?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row["fullname"]; ?></td>
                                                <td><?php echo $row["username"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
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
