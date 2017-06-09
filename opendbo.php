<?php
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$dbname = "staff_register";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
	echo "Connection Successful!";
}

?>