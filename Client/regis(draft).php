<?php
include ('../config.php');
include('includes/header.php');




?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../loginstyle.css">

		<title> REGISTRATION</title>
		
	</head>
	
	<body>
		<div class="container">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">REGISTER</p><br>
				<p style= "Color: Brown">Email:</p>
				<div class="input-group">
					<input type="email" placeholder="123@gmail.com" name="email" value="<?php echo $email; ?>" required>
				</div>
				<p style= "Color: Brown">Password:</p>
				<div class="input-group">
					<input type="password" placeholder="Enter Password" name="password" value="<?php echo $_POST['password']; ?>" required>
				</div><br>
				<div class="input-group">
					<button name="submit" class="btn">Login</button>
				</div>
				<p class="login-register-text">Don't have an account? <a href="index.php">Register Here</a>.</p>
				<!-- <p class="login-register-text">Create an account? <a href="reg.php">Regsiter Here</a></p> -->
				<div class="text-center p-t-90">
					<a class="txt1" href="#">
						Forgot Password?
					</a>
				</div>
			</form>
		</div>
	</body>
</html>