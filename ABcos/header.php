<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ABCosmetics Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	
    <link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/chip.css" rel="stylesheet">
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
	include "connect.php";
    session_start();
    $isLogin =FALSE;
    if (isset($_SESSION["user"])){
        $isLogin = true;
    }else{
        header("location: login.php");
    }   
	$username = $_SESSION["user"];
?>
<body>
<div id="wrapper">
	        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <a class="navbar-brand" href="staff.php">ABCosmetics Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="img_avatar.png" alt="Person" width="30" height="30"> <?=$username?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-top:10px;">
                    <li>
                        <a href="staff.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="orders.php"><i class="fa fa-shopping-cart"></i> Manage Orders</a>
                    </li>
                    <li>
                        <a href="product.php"><i class="fa fa-fw fa-table"></i> Manage Products</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
	</body>
</html>