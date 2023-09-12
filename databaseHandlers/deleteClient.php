<?php
include('../config.php');
include('./audit_trailFunctions.php');

session_start();

if(isset($_POST['deleteClient']))
{
    $client_id = $_POST['deleteClient'];

  try{

    $query = "DELETE FROM customer  WHERE id=:cus_id";
    $statement = $pdo->prepare($query);

    $data = [
      
      ':cus_id' => $client_id
  
  ];
    $query_execute = $statement->execute($data);

    if($query_execute)
    {
        logAct($_SESSION['role'], $_SESSION['id'], "Client with ID#$client_id was removed from the system.", $pdo);
           $_SESSION['flash_message'] = "Account succesfully deleted!";
           $_SESSION['alert'] = 'warning';
           header("Location: ../Admin/clientProfile.php");
           exit(0);
        }
        else
        {
            $_SESSION['flash_message'] = "Something went wrong!";
            $_SESSION['alert'] = 'danger';
            header("Location: ../Admin/clientProfile.php");
            exit(0);
    
    }

  }catch(PDOException $e){
     echo $e->getMessage();


  }

}


?>


