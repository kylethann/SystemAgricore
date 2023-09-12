

<?php
include('../config.php');
include('./audit_trailFunctions.php');

session_start();

if(isset($_POST['update']))
{
  $user = $_POST['id'];
  $username = $_POST['username'];
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];

  try{
    $query = "UPDATE admin SET username=:username, fullName=:fullName, email=:email WHERE id=:user LIMIT 1";
    $statement = $pdo->prepare($query);

    $data = [
    
      ':username' => $username,
      ':fullName' => $fullName,
      ':email' => $email,
      ':user' => $user,
    
    ];
    $query_execute = $statement->execute($data);
    
    
    if($query_execute) {
      logAct($_SESSION['role'], $_SESSION['id'], "Admin user with ID#$user has updated its account.", $pdo);

      $_SESSION['flash_message'] = "Account Updated Succesfully";
      $_SESSION['alert'] = 'success';
      header("Location: ../Admin/profile.php");
      } else {
        $_SESSION['flash_message'] = "Something went wrong.!";
        $_SESSION['alert'] = 'danger';
        header("Location: ../Admin/profile.php");
        }
  }catch (PDOException $e){
         echo $e->getMessage();
    }
}