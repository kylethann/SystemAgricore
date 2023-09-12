<?php
include('../config.php');
include('./audit_trailFunctions.php');

session_start();

if(isset($_POST['delete_id']))
{
    $admin_id = $_POST['delete_id'];

  try{

    $query = "DELETE FROM admin  WHERE id=:adm_id";
    $statement = $pdo->prepare($query);

    $data = [
      
      ':adm_id' => $admin_id
  
  ];
    $query_execute = $statement->execute($data);

    if($query_execute)
    {
        logAct($_SESSION['role'], $_SESSION['admin_id'], "Admin with ID #$admin_id was removed from the system.", $pdo);
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
            exit(0);
    
    }

  }catch(PDOException $e){
     echo $e->getMessage();


  }

}


?>

<!-- <?php
include 'config.php';

if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];

    // Perform the delete operation
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$deleteId]);

    // Log the delete action
    $action = "Deleted product with ID: $deleteId";
    $logStmt = $pdo->prepare("INSERT INTO activity_log (action) VALUES (?)");
    $logStmt->execute([$action]);

    // Redirect or update page as needed
    // header("Location: products.php");
}
?> -->