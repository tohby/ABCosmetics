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
                            <i class="fa fa-info-circle"></i>  <strong>Hey  <?= $username ?>, you can add as many products as possible, no restrictions 
							</strong>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                
				
			</div>
        <!-- /#page-wrapper -->
<div class="container-fluid">
	<div id="home" class="tab-pane fade in active">
		  <h1><center/>Add Orders</h1>
		  <form class="form-horizontal" action="orderdetails.php" method="POST">
			  <?
				$result = mysqli_query($conn, "Select * FROM orders");
			  ?>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="orderId">Customer's order:</label>
			  <div class="col-sm-10">          
				<select class="form-control" name="orderId">
					<?php
					if ($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()){
						echo "<option value='". $row["Id"] . "'>"
						. $row["CustName"] . "</option>";
						}
					}
					//$conn->close();
					?>
				  </select>
			  </div>
			</div>
			<div class="form-group">
			<?
				$result = mysqli_query($conn, "Select * FROM products");
			?>
			  <label class="control-label col-sm-2" for="product">Product:</label>
			  <div class="col-sm-10">          
				<select class="form-control" name="product">
					<?php
					if ($result -> num_rows > 0) {
						while ($row = $result -> fetch_assoc()){
						echo "<option value='". $row["Id"] . "'>"
						. $row["Pname"] . "</option>";
						}
					}
					//$conn->close();
					?>
				  </select>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="amount">Amount:</label>
			  <div class="col-sm-10">          
				<input type="number" class="form-control" id="amount" placeholder="Enter Cost per item" name="amount" required/>
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
			if (isset($_POST["orderId"])) { //check if user click on the submit
			$orderId = $_POST["orderId"];
			$product = $_POST["product"];
			$amount = $_POST["amount"];
            $result = mysqli_query($conn, "INSERT INTO orderDetails (Id, PId, cost) 
			VALUES ('$orderId', '$product', '$amount')");
			if($result){
				echo "<br/>";
				echo "<div class=\"container\">
						  <div class=\"alert alert-success alert-dismissable\">
						  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
							<strong>Yessss!</strong> Order added, that was easy right? .
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
</div>
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
