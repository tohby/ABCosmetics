	<!DOCTYPE html>
	<html lang="en">
	<head>
	  <title>ABCosmetics</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	   <link rel="stylesheet" href="css/card.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<style>
	body, html {
		height: 100%;
		background-repeat: no-repeat;
		background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
	}
	</style>
	<body>
	<div class="container">
			<div class="card card-container">
			
				<img id="profile-img" class="profile-img-card" src="img_avatar.png" />
				<p id="profile-name" class="profile-name-card"></p>
				<form class="form-signin" action="signup.php" method="POST">
					
					<span id="reauth-email" class="reauth-email"></span>
					<input type="text" name="fullName" class="form-control" placeholder="Full Name" required>
					<input type="email" name="email" class="form-control" placeholder="Email address" required>
					<input type="text" name="username" class="form-control" placeholder="Username" required>
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign Up</button>
				</form><!-- /form -->
				<a href="login.php" class="forgot-password">
					Already have an account? <strong>Login</strong>
				</a>
			</div><!-- /card-container -->
	</div><!-- /container -->
	<?php
			//error_reporting(E_ALL);
			//ini_set('display_errors', 1);
				require_once './connect.php';
			if (isset($_POST["username"])){
				$fullName = $_POST["fullName"];			
				$email = $_POST["email"];
				$username = $_POST["username"];
				$password = $_POST["password"];
				$password = hashAndSalt($password);
				$role = $_POST["role"];
				$result = $conn->query("SELECT * FROM staff WHERE username='$username'") or die($mysqli->error());
				if ( $result->num_rows > 0 ) {				
					echo "<div class=\"container\">
						  <div class=\"alert alert-danger alert-dismissable\">
						  <a href=\"login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
							<strong>Error!</strong> This username already exists, please use a different username or proceed to login.
						  </div>
						  </div>";
				}else{
					$sql = "insert into staff (fullname, email, username, password, roles) values(?,?,?,?,?)";
					$stmt = $conn->prepare($sql); 
					$stmt->bind_param("sssss",$namePara, $emailpara, $usernamepara, $passwordPara, $rolePara);  
					$namePara = $fullName;
					$emailpara = $email;
					$usernamepara = $username;
					$passwordPara= $password;
					$rolePara = $role;
					$stmt->execute();
					$stmt->close(); 
					echo "<div class=\"container\">
						  <div class=\"alert alert-success alert-dismissable\">
						  <a href=\"login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
							<strong>Success!</strong> Account created, please proceed to login.
						  </div>
						  </div>";
				}
			}
	?>
	</body>
	</html>