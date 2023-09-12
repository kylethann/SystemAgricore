<?php
include('../config.php');
include('./audit_trailFunctions.php');

session_start();

if(isset($_POST['update'])){
  $farmer_id= $_POST["farmer_id"];
  $username= $_POST["username"];
  $email= $_POST["email"];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  $name= $_POST["name"];
  $middleName= $_POST["middleName"];
  $surname= $_POST["surname"];
  $gender= $_POST["gender"];
  $age= $_POST["age"];
  $birthday= $_POST["birthday"];
  $address= $_POST["address"];
  $contactNumber= $_POST["contactNumber"];
  $crops= $_POST["crops"];

    if ($password == $cpassword){
      $statement = $pdo->prepare("SELECT * FROM `farmer1` WHERE email= ? ");
      $statement->execute([$email]);

      if (!$statement->rowCount() > 0) {
        try{
          $query = "UPDATE farmer1 SET username=:username, email=:email, password =:password, 
          name=:name, middleName=:middleName, surname=:surname,gender=:gender, age=:age, birthday=:birthday, 
          address=:address, contactNumber=:contactNumber, crops=:crops WHERE id=:far_id LIMIT 1";
          $statement = $pdo->prepare($query);
      
          $data = [
          
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':name' => $name,
            ':middleName' => $middleName,
            ':surname' => $surname,
            ':gender' => $gender,
            ':age' => $age,
            ':birthday' => $birthday,
            ':address' => $address,
            ':contactNumber' => $contactNumber,
            ':crops' => $crops,
            ':far_id' => $farmer_id,
          
          ];
          $query_execute = $statement->execute($data);
          
          if($query_execute) {
            logAct($_SESSION['role'], $_SESSION['id'], "Updated information of Farmer with ID #$farmer_id from table", $pdo);
            
            $_SESSION['flash_message'] = "Account Updated Succesfully";
            $_SESSION['alert'] = 'success';
            header("Location: ../Admin/farmerProfile.php");
            } else {
              $_SESSION['flash_message'] = "Something went wrong.!";
              $_SESSION['alert'] = 'danger';
              header("Location: ../Admin/farmerProfile.php");
              }
        }catch (PDOException $e){
               echo $e->getMessage();
          }
      }else {
      $_SESSION['alert'] = 'danger';
      $_SESSION['flash_message'] = "Email already exists!";
      header("Location: ../Admin/farmerProfile.php");
    }
    }else {
      $_SESSION['alert'] = 'danger';
      $_SESSION['flash_message'] = "Passwords did not match!";
      header("Location: ../Admin/farmerProfile.php");
    }

} else {
  $_SESSION["alert"] = "Something went wrong.";
  header("Location: ../Admin/farmerProfile.php");
  exit;
}


?>