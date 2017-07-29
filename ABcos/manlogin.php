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
            <p id="profile-name" class="profile-name-card"> This is a login form for MANAGERS only</p>
            <form class="form-signin" action="manlogin.php" method="POST">
				
                <span id="reauth-email" class="reauth-email"></span>
				<input type="text" name="username" class="form-control" placeholder="Username" required>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>
            </form><!-- /form -->
			<a href="mansignup.php" class="forgot-password">
                don't have an account yet?<strong>Signup</strong>
            </a>
        </div><!-- /card-container -->
</div><!-- /container -->
<?php
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
		session_start();
        require_once './connect.php';
        if (isset($_POST["username"])) { //check if user click on the submit
            $username = $_POST["username"];
            $password = $_POST["password"];           
            $password = hashAndSalt($password);          
            $sql = "select * from manager where username=? and password=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $namePara, $passwordPara);
            $namePara = $username;
            $passwordPara = $password;
            $stmt->execute();

            $stmt->store_result();

            $num_of_rows = $stmt->num_rows;
            $stmt->close();
            //$result = $conn->query($sql);
            if ($num_of_rows > 0) {
                $_SESSION["user"]  = "$username";
                $_SESSION["id"] = $row["id"];
                header("location: manager.php");
                exit;				    
            }else
                echo "<div class=\"container\">
						  <div class=\"alert alert-danger alert-dismissable\">
						  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
							<strong>Oops!</strong> username or password incorrect.
						  </div>
						  </div>";
        }
?>
</body>
</html>