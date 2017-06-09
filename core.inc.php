<?php
ob_start();
session_start();

function loggedin(){
	if (isset($_SESSION['User_Id']) && !empty($_SESSION['User_Id'])){
		return true;
	}
	else {
		return false;
	}
}

?>