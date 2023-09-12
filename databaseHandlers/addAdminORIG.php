<?php
include('../config.php');
include('../databaseHandlers/audit_trailFunctions.php');

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);

  if ($password == $cpassword) {
    $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE email= ? ");
    $stmt->execute([$email]);
    if (!$stmt->rowCount() > 0) {
      $sql = $pdo->prepare("INSERT INTO `admin` (username, fullName, email, password)
					VALUES (?, ?, ?, ?)");
      $result = $sql->execute([$username, $fullName, $email, $password]);

      if ($result) {
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
				$stmt->execute([$username]);
				$res = $stmt->fetch();
				$id = $res['id'];

        logAct('Admin', $id, "New Admin: $username added to the system.", $pdo);
        $username = "";
				$fullName = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";

        $_SESSION['flash_message'] = "New Admin Account successfully created!";
        $_SESSION['alert'] = 'success';
        header("Location: ../${_SESSION['folder']}/users.php");
      } else {
        $_SESSION['alert'] = 'danger';
        $_SESSION['flash_message'] = "Something went wrong!";
        header("Location: ../${_SESSION['folder']}/users.php");
      }
    } else {
      $_SESSION['alert'] = 'danger';
      $_SESSION['flash_message'] = "Email already exists!";
      header("Location: ../${_SESSION['folder']}/addAdmin.php");
    }
  } else {
    $_SESSION['alert'] = 'danger';
    $_SESSION['flash_message'] = "Passwords did not match!";
    header("Location: ../${_SESSION['folder']}/addAdmin.php");
  }
}

