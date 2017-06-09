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
			<legend>Please login here</legend>
			<form method="POST" action="login.php">
				<table class="table table-primary">
					<tr>
						<td><label>Username</label></td>
						<td><input type="text" class="form-control" name="username" placeholder="Username" required></td>
					</tr>
					<tr>
						<td><label>Password</label></td>
						<td><input type="password" class="form-control" name="password" placeholder="password" required></td>
					</tr>
					<tr>
						<td><input type="submit" class="btn btn-primary" value="Sign in ..."></td>
						<td><a href="register.php">Register</a></td>
					</tr>
				</table>
			</form>
		</fieldset>
	</body>
</html>