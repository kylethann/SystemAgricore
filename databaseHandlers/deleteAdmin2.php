<?php
session_start();
require_once('../config.php');
require_once('./audit_trailFunctions.php');


if ($_SERVER["REQUEST_METHOD"] == 'POST') {

  $admin_id= $_POST["adm_id"];
  $firstName = $_POST["firsName"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  



  if (notEmpty($admin_id)) {
    $stmt = $pdo->prepare("DELETE FROM `admin` WHERE id = ?");

    $params = [$admin_id];

    if ($stmt->execute($params)) {

      logAct($_SESSION['role'], $_SESSION['id'], "Admin with ID #$admin_id Deleted from table.", $pdo);


      $folder = $_SESSION["folder"];
      $_SESSION["alert"] = "User successfuly deleted.";
      header("Location: ../Admin/users.php");
      clearPostInputs(["username", "firstName ", "email", "password"]);
      exit;
    } else {
      $folder = $_SESSION["folder"];
      $_SESSION["alert"] = "Something went wrong.";
      header("Location: ../Admin/users.php");
      exit;
    }
  } else {
    $folder = $_SESSION["folder"];
    $_SESSION["alert"] = "Incomplete input";
    header("Location: ../Admin/users.php");
    exit;
  }
} else {
  $folder = $_SESSION["folder"];
  $_SESSION["alert"] = "Something went wrong.";
  header("Location: ../Admin/users.php");
  // header("Location: ../$folder/manage_users.php");
  exit;
}
