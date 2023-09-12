<?php

include '../config.php';

// error_reporting(0);

session_start();

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

				$_SESSION['flash_message'] = "Account succesfully created!";
				header("Location: ./index.php");
				exit;
			} else {
				$_SESSION['flash_message'] = "Oops! Something went wrong!";
			}
		} else {
			$_SESSION['flash_message'] = "Email already exists!";
		}
	} else {
		$_SESSION['flash_message'] = "Password did not match";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<link rel="stylesheet" type="text/css" href="../loginstyle.css">

	<title>REGISTRATION FORM</title>
</head>

</head>

<body>

	<div id="alert"></div>
	<!-- <div class="image">
		<img src="./undraw_community_re_cyrm.svg" alt="" class="welcome-img">
	</div> -->

	<div class="reg">
	<p class="login-text" style="font-size: 2rem; font-weight: 650;">REGISTRATION FORM</p>
		<form action="" method="POST" class="login-email">
		
		<!-- <fieldset id= "acc"> -->
			<!-- <legend><b> Sign-In Account </b></legend> -->
			<!-- <fieldset id= "acc2"> -->
			<div class="input-group">
			<p style= "Color: Black">Username:</p>
				<input type="text" placeholder="Enter Username" name="Username" value="<?php echo $username; ?>" required>
			</div>
			<p style= "Color: Black">Full Name:</p>
			<div class="input-group">
				<input type="text" placeholder="Enter Complete Name" name="Full_Name" value="<?php echo $FullName; ?>" required>
			</div>
			<p style= "Color: Black">Email:</p>
			<div class="input-group">
				<input type="email" placeholder="123@gmail.com" name="Email" value="<?php echo $email; ?>" required>
			</div>
			<p style= "Color: Black">Password:</p>
			<div class="input-group">
				<input type="password" placeholder="Enter Password" name="Password" value="<?php echo $_POST['Password']; ?>" required>
			</div>
			<p style= "Color: Black">Confirm Password:</p>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<br>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
<!-- </fieldset> -->
	<!-- </fieldset> -->
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