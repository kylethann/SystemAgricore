<?php
include('../config.php');
include('./audit_trailFunctions.php');

session_start();

if(isset($_POST['deleteAdmin']))
{
    $admin_id = $_POST['deleteAdmin'];

  try{

    $query = "DELETE FROM admin  WHERE id=:adm_id";
    $statement = $pdo->prepare($query);

    $data = [
      
      ':adm_id' => $admin_id
  
  ];
    $query_execute = $statement->execute($data);

    if($query_execute)
    {
        logAct($_SESSION['role'], $_SESSION['id'], "Admin with ID #$admin_id Deleted from table.", $pdo);
           $_SESSION['flash_message'] = "Account succesfully deleted!";
           $_SESSION['alert'] = 'warning';
           header("Location: ../Admin/users.php");
           exit(0);
        }
        else
        {
            $_SESSION['flash_message'] = "Something went wrong!";
            $_SESSION['alert'] = 'danger';
            header("Location: ../Admin/users.php");
            // header("Location: ../${_SESSION['folder']}/users.php");
            // header('Location: users.php');
            exit(0);
    
    }

  }catch(PDOException $e){
     echo $e->getMessage();


  }

}


?>