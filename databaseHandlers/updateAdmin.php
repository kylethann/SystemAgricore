<?php
include('../config.php');
include('./audit_trailFunctions.php');

session_start();


if(isset($_POST['update'])){
  $admin_id = $_POST['admin_id'];
  $username = $_POST['username'];
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);

  if ($password == $cpassword){
    $statement = $pdo->prepare("SELECT * FROM `admin` WHERE email= ? ");
    $statement->execute([$email]);

    if (!$statement->rowCount() > 0) {
      try{
        $query = "UPDATE admin SET username=:username, fullName=:fullName, email=:email, password=:password WHERE id=:adm_id LIMIT 1";
        $statement = $pdo->prepare($query);
    
        $data = [
        
          ':username' => $username,
          ':fullName' => $fullName,
          ':email' => $email,
          ':password' => $password,
          ':adm_id' => $admin_id,
        
        ];
        $query_execute = $statement->execute($data);
        
        if($query_execute) {
          logAct($_SESSION['role'], $_SESSION['id'], "Updated information of Admin with ID #$admin_id from table", $pdo);
          
          $_SESSION['flash_message'] = "Account Updated Succesfully";
          $_SESSION['alert'] = 'success';
          header("Location: ../Admin/users.php");
          } else {
            $_SESSION['flash_message'] = "Something went wrong.!";
            $_SESSION['alert'] = 'danger';
            header("Location: ../Admin/users.php");
            }
      }catch (PDOException $e){
             echo $e->getMessage();
        }
    }else {
      $_SESSION['alert'] = 'danger';
      $_SESSION['flash_message'] = "Email already exists!";
      header("Location: ../Admin/users.php");
    }
  }else {
    $_SESSION['alert'] = 'danger';
    $_SESSION['flash_message'] = "Passwords did not match!";
    header("Location: ../Admin/users.php");
  }
} else {
  $folder = $_SESSION["folder"];
  $_SESSION["alert"] = "Something went wrong.";
  header("Location: ../Admin/users.php");
  exit;
}


