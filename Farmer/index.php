<?php

include '../config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['id'])) {
	header("Location: dashboard.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	// $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password' ";
	$stmt = $pdo->query($sql);
	if ($stmt->rowCount() > 0) {
		$row = $stmt->fetch();
		$_SESSION['id'] = $row['id'];
		$_SESSION['role'] = 'Farmer';
		$_SESSION['folder'] = 'Farmer';
		include_once('../database_handlers/audit_trailFunctions.php');
		logAct($_SESSION['role'], $_SESSION['id'], "Login", $pdo);
		header("Location: dashboard.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../loginstyle.css">

		<title> Farmer Login</title>
		
	</head>
	
	<body>
		<div class="container">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">LOGIN</p><br>
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
				<div class="text-center p-t-90">
					<a class="txt1" href="#">
						Forgot Password?
					</a>
				</div>
			</form>
		</div>
	</body>
</html>
