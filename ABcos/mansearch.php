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
                                    <form class="form-inline">
									  <div class="form-group">
									    <label for="startdate">From:</label>
									    <select class="form-control" name="product">
										<?php
										if ($result -> num_rows > 0) {
											while ($row = $result -> fetch_assoc()){
											echo "<option value='". $row["Odate"] . "'>"
											. $row["Odate"] . "</option>";
											}
										}
										//$conn->close();
										?>
										</select>
									  </div>
									  <div class="form-group">
									    <label for="enddate">To:</label>
									    <?php
										if ($result -> num_rows > 0) {
											while ($row = $result -> fetch_assoc()){
											echo "<option value='". $row["Odate"] . "'>"
											. $row["Odate"] . "</option>";
											}
										}
										//$conn->close();
										?>
									  </div>
									  <button type="submit" class="btn btn-default">Submit</button>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
require_once './mysql_login.php';
$start = $_POST["startdatate"];
$end = $_POST["enddate"];
    if($start != NULL && $end != NULL){
    $sql = "select * from orders where Odate between '$start' and '$end'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<center>";
            echo "<table border = 1>";
                echo "<tr>";
                echo "<td>customer</td>";
                echo "<td>product</td>";
                echo "<td>quantity</td>";
                echo "<td>order date</td>";
                echo "<td>pay date</td>";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["customer"] . "</td>";
                    echo "<td>" . $row["product"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["orderDate"] . "</td>";
                    echo "<td>" . $row["payDate"] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        echo "</center>";
    } else {
        echo "0 results";
        echo $sql;
    }
    }
    $conn->close();
    ?>
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
