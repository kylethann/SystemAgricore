<?php
include('../config.php');
include('./audit_trailFunctions.php');
session_start();

if(isset($_POST['deleteClient']))
{
    $id = $_POST['id'];
    // $username = $_POST["username"];
    // $email = $_POST["email"];
    // $password = md5($_POST['password']);
    // $cpassword = md5($_POST['cpassword']);
    // $full_name = $_POST["full_name"];
    // $middle_name = $_POST["middle_name"];
    // $last_name = $_POST["last_name"];
    // $address = $_POST["address"];
    // $contact_number =$_POST["contact_number"];

    // function fetchClients($pdo)
    // {
    //   $stmt = $pdo->prepare("SELECT * FROM customer");
    //   if ($stmt->execute()) {
    //     return $stmt->fetchAll();
    //   }
    // }

    try{

        $query ="DELETE FROM customer WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $data =[':id'=>$id];
        $query_execute = $stmt ->execute($data);

        if($query_execute)
        {
            echo '<script> alert("Deleted Successfully") </script>';
            // header('location: copyClientProf.php');
            // exit(0);
        }
        else{
            echo '<script> alert("Not Deleted") </script>';
            // $_SESSION['message'] = "Not Deleted";
            // header('location: copyClientProf.php');
            // exit(0);
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>