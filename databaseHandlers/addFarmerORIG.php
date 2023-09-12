<?php
include('../config.php');
include('../databaseHandlers/audit_trailFunctions.php');

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  $name = $_POST['name'];
  $middleName = $_POST['middleName'];
  $surname = $_POST['surname'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $birthday = $_POST['birthday'];
  $contactNumber = $_POST['contactNumber'];
  // $crops = $_POST['crops'];
 

  if ($password == $cpassword) {
    $stmt = $pdo->prepare("SELECT * FROM `farmer1` WHERE email= ? ");
    $stmt->execute([$email]);
    if (!$stmt->rowCount() > 0) {
      $sql = $pdo->prepare("INSERT INTO `farmer1` (username, email, `password`, name, middleName, surname, gender, age, `address`, birthday, contactNumber)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $result = $sql->execute([$username, $email, $password, $name, $middleName, $surname, $gender, $age, $address, $birthday, $contactNumber]);

      if ($result) {
        $stmt = $pdo->prepare("SELECT * FROM farmer1 WHERE username = ?");
				$stmt->execute([$username]);
				$res = $stmt->fetch();
				$id = $res['id'];

				logAct('Admin', $id, "New Farmer: $username added to the system.", $pdo);
				$username = "";
        $email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				$name = "";
        $middleName = "";
        $surname = "";
        $gender = "";
        $age = "";
        $address = "";
        $birthday = "";
        $contactNumber = "";
				// $crops = "";
				
        
        $_SESSION['alert'] = 'success';
        $_SESSION['flash_message'] = "Farmer Account succesfully created!";
        header("Location: ../${_SESSION['folder']}/farmerProfile.php");
				exit;
			} else {
        $_SESSION['alert'] = 'danger';
				$_SESSION['flash_message'] = "Oops! Something went wrong!";
        header("Location: ../${_SESSION['folder']}/farmerProfile.php");
			}
		} else {
			$_SESSION['alert'] = 'danger';
      $_SESSION['flash_message'] = "Email already exists!";
      header("Location: ../${_SESSION['folder']}/addFarmer.php");
		}
	} else {
    $_SESSION['alert'] = 'danger';
    $_SESSION['flash_message'] = "Passwords did not match!";
    header("Location: ../${_SESSION['folder']}/addFarmer.php");
	}
}
