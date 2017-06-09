<?php
require 'core.inc.php';
require 'opendbo.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Supermarket System</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<style>
			.heading{
				color: green;
				font-weight: bold;
				font-family: fantasy;
				text-align: center;
				text-decoration: underline;
			}

			.fieldset{
					width: 60%;
					margin: auto;
			}

			.table{
			padding: 4px;
			width: 90%;
			margin: auto;
			}
 		</style>
	</head>

	<body>
		<fieldset class='fieldset'>
			<legend>Please Register here</legend>
			<form method="POST">
				<?php
				if (loggedin()) {
					echo "You are already registered and logged in";
				} else {
					echo "Please register!";
					
					if (isset($_POST['register'])) {
						$full_name = $_POST['fullname'];
						$gender = $_POST['gender'];
						$age = $_POST['age'];
						$username = $_POST['username'];
						$password = $_POST['password'];
						$password2 = $_POST['password2'];
						$password_hash = md5($password);
						
						
						if ($password != $password2) {
							echo "Passwords don't match!";
						}
						
						else {
							$query = "SELECT Username FROM staff_members WHERE Username='$username'";
							$query_run = mysqli_query($conn, $query);
							
							if (mysqli_num_rows($query_run)) {
								echo "User already exists!";
							}
							
							else {
								$insert_query = "INSERT INTO staff_members "
											. "(`Full_Name`, `Gender`, `Age`, `Username`, `Password`) "
											. "VALUES ('".$full_name."', '".$gender."', '".$age."', '".$username."', '".$password_hash."')";
								$insert_query_run = mysqli_query($conn, $insert_query);
								
								if ($insert_query_run) {
									echo "Successfully registered";
									header('Location: index.php');
								}
								else{
									echo "Failed!";
								}
							}
						}
					}
				}
				?>
				
				<table class="table table-primary">
					<tr>
						<td><label>Full Name</label></td>
						<td>
						<input type="text" class="form-control" name="fullname" placeholder="Full Name" required></td>
					</tr>
					<tr>
						<td><label>Gender</label></td>
						<td>
							<select name="gender">
								<option value="" selected>--select--</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Age</label></td>
						<td><input type="number" min=0 class="form-control" name="age" placeholder="Age" required></td>
					</tr>
					<tr>
						<td><label>Username</label></td>
						<td><input type="text" class="form-control" name="username" placeholder="Username" required></td>
					</tr>
					<tr>
						<td><label>Password</label></td>
						<td><input type="password" class="form-control" name="password" placeholder="Password" required></td>
					</tr>
					<tr>
						<td><label>Confirm Password</label></td>
						<td><input type="password" class="form-control" name="password2" placeholder="Confirm Password" required></td>
					</tr>
					<tr>
						<td><input type="submit" class="btn btn-primary" name="register" value="Register"></td>
					</tr>
				</table>
			</form>
		</fieldset>
	</body>
</html>