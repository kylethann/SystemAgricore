<?php

include '../config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['id'])) {
	header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['Username'];
	$email = $_POST['Email'];
	$fullName = $_POST['Full_Name'];
	$password = md5($_POST['Password']);
	$cpassword = md5($_POST['cpassword']);


	if ($password == $cpassword) {
		$stmt = $pdo->prepare("SELECT * FROM client WHERE Email= ? ");
		$stmt->execute([$email]);
		if (!$stmt->rowCount() > 0) {
			$sql = $pdo->prepare("INSERT INTO client (Username, Full_Name, Email, Password)
					VALUES (?, ?, ?, ?)");
			$result = $sql->execute([$username, $fullName, $email, $password]);

			if ($result) {
				$stmt = $pdo->prepare("SELECT * FROM client WHERE Username = ?");
				$stmt->execute([$username]);
				$res = $stmt->fetch();
				$id = $res['id'];

				logAct('client', $id, "New client: $username added to the system.", $pdo);
				$username = "";
				$fullName = "";
				$email = "";
				$_POST['Password'] = "";
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
