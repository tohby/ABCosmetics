<!DOCTYPE html>
<html lang="en">
<?php include "header.php" ?>	
<body>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
	<div class="col-lg-12">
                        <h1 class="page-header">
                            Products <small>update</small>
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
                            <i class="fa fa-info-circle"></i>  <strong>Welcome  <?= $username ?>,set a new description or amount for a product</strong>
                        </div>
                    </div>
                </div>
</div>
<div class="container">
		  <h1><center/>Update Product</h1>
		  <form class="form-horizontal" action="updateproducts.php" method="POST">
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
			  <label class="control-label col-sm-2" for="desc">Description:</label>
			  <div class="col-sm-10">          
				<textarea class="form-control" rows="5" id="desc" placeholder="Enter product Description" name="desc" required/></textarea>
			  </div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="amount">Amount:</label>
			  <div class="col-sm-10">          
				<input type="number" class="form-control" rows="1" id="amount" placeholder="Enter product Amount" name="amount">
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
				require_once './connect.php';
				if (isset($_POST["product"])) { //check if user click on the submit
					$product = $_POST["product"];
					$desc = $_POST["desc"];
					$amount = $_POST["amount"];
					$result2 = mysqli_query($conn, "Update products set Description = '$desc',Amount = '$amount'
					where Id = '$product'");
					if($result2){
						echo "<br/>";
						echo "<div class=\"container\">
								  <div class=\"alert alert-success alert-dismissable\">
								  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
									<strong>Yessss!</strong> Product updated, that was easy right? .
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
</center>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
