<?php
include('../config.php');
include('./audit_trailFunctions.php');

session_start();

if(isset($_POST['deleteFarmer']))
{
    $farmer_id = $_POST['deleteFarmer'];

  try{

    $query = "DELETE FROM farmer1  WHERE id=:far_id";
    $statement = $pdo->prepare($query);

    $data = [
      
      ':far_id' => $farmer_id
  
  ]; 
    $query_execute = $statement->execute($data);

    if($query_execute)
    {
        logAct($_SESSION['role'], $_SESSION['id'], "Farmer with ID #$farmer_id was removed from the system.", $pdo);
           $_SESSION['flash_message'] = "Account succesfully deleted!";
           $_SESSION['alert'] = 'warning';
           header("Location: ../Admin/farmerProfile.php");
           exit(0);
        }
        else
        {
            $_SESSION['flash_message'] = "Something went wrong!";
            $_SESSION['alert'] = 'danger';
            header("Location: ../Admin/farmerProfile.php");
            exit(0);
    
    }

  }catch(PDOException $e){
     echo $e->getMessage();


  }

}


?>