<?php
include('../config.php');
include('./audit_trailFunctions.php');

session_start();

if(isset($_POST['update'])){
  $client_id= $_POST["client_id"];
  $username= $_POST["username"];
  $email= $_POST["email"];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  $full_name= $_POST["full_name"];
  $middle_name= $_POST["middle_name"];
  $last_name= $_POST["last_name"];
  // $gender= $_POST["gender"];
  $address= $_POST["address"];
  $contact_number= $_POST["contact_number"];

  if ($password == $cpassword){
    $statement = $pdo->prepare("SELECT * FROM `customer` WHERE email= ? ");
    $statement->execute([$email]);

    if (!$statement->rowCount() > 0) {
      try{
        $query = "UPDATE customer SET username=:username, email=:email, password =:password, 
        full_name=:full_name, middle_name=:middle_name, last_name=:last_name, 
        address=:address, contact_number=:contact_number WHERE id=:cus_id LIMIT 1";
        $statement = $pdo->prepare($query);
    
        $data = [
        
          ':username' => $username,
          ':email' => $email,
          ':password' => $password,
          ':full_name' => $full_name,
          ':middle_name' => $middle_name,
          ':last_name' => $last_name,
          // ':gender' => $gender,
          ':address' => $address,
          ':contact_number' => $contact_number,
          ':cus_id' => $client_id,
        
        ];
        $query_execute = $statement->execute($data);
        
        if($query_execute) {
          logAct($_SESSION['role'], $_SESSION['id'], "Updated information of Client User with ID#$client_id from table.", $pdo);
          
          $_SESSION['flash_message'] = "Account Updated Succesfully";
          $_SESSION['alert'] = 'success';
          header("Location: ../Admin/clientProfile.php");
          } else {
            $_SESSION['flash_message'] = "Something went wrong.!";
            $_SESSION['alert'] = 'danger';
            header("Location: ../Admin/clientProfile.php");
            }
      }catch (PDOException $e){
             echo $e->getMessage();
        }
    }else {
      $_SESSION['alert'] = 'danger';
      $_SESSION['flash_message'] = "Email already exists!";
      header("Location: ../Admin/clientProfile.php");
    }
  }else {
    $_SESSION['alert'] = 'danger';
    $_SESSION['flash_message'] = "Passwords did not match!";
    header("Location: ../Admin/clientProfile.php");
  }
} else {
  $folder = $_SESSION["folder"];
  $_SESSION["alert"] = "Something went wrong.";
  header("Location: ../Admin/users.php");
  exit;
}

