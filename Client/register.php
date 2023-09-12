<?php

include '../config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['id'])) {
	header("Location: index.php");
}


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$fullName = $_POST['fullName'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);


	if ($password == $cpassword) {
		$stmt = $pdo->prepare("SELECT * FROM client WHERE email= ? ");
		$stmt->execute([$email]);
		if (!$stmt->rowCount() > 0) {
			$sql = $pdo->prepare("INSERT INTO client (username, fullName, email, password)
					VALUES (?, ?, ?, ?)");
			$result = $sql->execute([$username, $fullName, $email, $password]);

			if ($result) {
				$stmt = $pdo->prepare("SELECT * FROM client WHERE username = ?");
				$stmt->execute([$username]);
				$res = $stmt->fetch();
				$id = $res['id'];

				logAct('client', $id, "New client: $username added to the system.", $pdo);
				$username = "";
				$fullName = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";

				echo "<script>alert('User Registration Completed.')</script>";
				// $_SESSION['flash_message'] = "Account succesfully created!";
				header("Location: ./index.php");
				exit;
			} else {
				echo "<script>alert('Oops! Something went wrong!')</script>";
				// $_SESSION['flash_message'] = "Oops! Something went wrong!";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
			// $_SESSION['flash_message'] = "Email already exists!";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
		// $_SESSION['flash_message'] = "Password did not match";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../regstyle.css">

		<title> REGISTRATION</title>
		
	</head>
	
	<body>
		<div class="container">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">SIGN-UP ACCOUNT</p><br>
				<p style= "Color: Brown">Username:</p>
				<div class="input-group">
					<input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>
				</div>
				<p style= "Color: Brown">Full Name:</p>
				<div class="input-group">
					<input type="text" placeholder="Enter Complete Name" name="fullName" value="<?php echo $fullName; ?>" required>
				</div>
				<p style= "Color: Brown">Email:</p>
				<div class="input-group">
					<input type="email" placeholder="123@gmail.com" name="email" value="<?php echo $email; ?>" required>
				</div>
				<p style= "Color: Brown">Password:</p>
				<div class="input-group">
					<input type="password" placeholder="Enter Password" name="password" value="<?php echo $_POST['password']; ?>" required>
				</div>
				<p style= "Color: Brown">Confirm Password:</p>
				<div class="input-group">
					<input type="password" placeholder="Confirm Paswword" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				</div><br>
				<div class="input-group">
					<button name="submit" class="btn">Register</button>
				</div>
				<p class="login-register-text ">Have an account?  <a href="index.php">Login Here</a>.</p>
			</form>
		</div>
		<script>
		const alertDiv = document.getElementById('alert');
		const messageDiv = document.createElement('div');
		messageDiv.classList.add('alert');
		messageDiv.classList.add('warning');
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
