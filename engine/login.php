
<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="../css/login.css">
		</head>
		<body>
			<div class="box">
				<h2>Admin</h2>
				<h2>Login</h2>
				<form method="POST" action="verify.php" >
					<div class="inputBox">
						<input type="text" name="username" required="">
						<label>Username</label>
					</div>
					<div class="inputBox">
						<input type="password" name="password" required="">
						<label>Password</label>
					</div>
					<input type="submit" name="login_btn" value="Login">
				</form>
			</div>
		</body>
</html>