<?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "abcosmetics";
            //create connection
			date_default_timezone_set('America/New_York');
            $conn = new mysqli($servername, $username, $password, $dbname) or die($mysqli->error);
            //check connection
            if ($conn->connect_error) {
                //display a message to explain why failed to connect
                die("Connection failed: " . $conn->connect_error);
            }
			function hashAndSalt($password){
			return hash("sha256", "mysalt123".  $password . "salt321");
    }
?>