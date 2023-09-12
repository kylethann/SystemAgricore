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

	$sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
	$stmt = $pdo->query($sql);
	if ($stmt->rowCount() > 0) {
		$row = $stmt->fetch();
		$_SESSION['id'] = $row['id'];
		$_SESSION['role'] = 'Client';
		$_SESSION['folder'] = 'Client';
		// include_once('../database_handlers/audit_trailFunctions.php');
		logAct($_SESSION['role'], $_SESSION['id'], "Login", $pdo);

		if (isset($_SESSION['current'])) {
			$current = $_SESSION['current'];
			unset($_SESSION['current']);
			header("Location: $current");
		} else {
			header("Location: dashboard.php");
			exit;
		}
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

		<title> Client Login</title>
		
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
				<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
				<!-- <p class="login-register-text">Create an account? <a href="reg.php">Regsiter Here</a></p> -->
				<div class="text-center p-t-90">
					<a class="txt1" href="#">
						Forgot Password?
					</a>
				</div>
			</form>
		</div>

		<script>
			const alertDiv = document.getElementById('alert');
			const messageDiv = document.createElement('div');
			messageDiv.classList.add('alert');
			messageDiv.textContent = "<?= $_SESSION['flash_message'] ?>";
			<?php if (isset($_SESSION['flash_message'])) : ?>
				alertDiv.append(messageDiv);
				setTimeout(() => {
					alertDiv.innerHTML = '';
					<?php unset($_SESSION['flash_message'])
					?>
				}, 2000);
			<?php endif; ?>
		</script>
	
	</body>
</html>
