<?php
require 'core.inc.php';
require 'opendbo.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password_hash = md5($password);

if (empty($username) || empty($password)){
	echo "Supply Values!";
}
else {
	$query = "SELECT Staff_Id FROM staff_members WHERE 
		Username = '".mysqli_real_escape_string($conn, $username)."' AND 
		Password = '".mysqli_real_escape_string($conn, $password_hash)."'";
	$query_run = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($query_run)){
		while ($row = mysqli_fetch_array($query_run)) {
			$_SESSION['Staff_Id'] = $row['Staff_Id'];
		}
		
		echo "Login Successful!";
		header('Location: register_product.html');
	} else {
		echo "Invalid Username/Password Combination!";
	}
}

?>