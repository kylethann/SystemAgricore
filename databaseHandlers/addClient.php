<?php
session_start();
include('../config.php');
include('../databaseHandlers/audit_trailFunctions.php');

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $full_name = $_POST["full_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $contact_number =$_POST["contact_number"];

    if ($password == $cpassword) {
      $stmt = $pdo->prepare("SELECT * FROM `customer` WHERE email= ? ");
      $stmt->execute([$email]);
      if (!$stmt->rowCount() > 0) {
        $sql = $pdo->prepare("INSERT INTO `customer` (username, email, password, full_name, middle_name, last_name, address, contact_number) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $sql->execute([$username, $email, $password, $full_name, $middle_name, $last_name, $address, $contact_number]);
    
        if ($result) {
          $stmt = $pdo->prepare("SELECT * FROM customer WHERE username = ?");
          $stmt->execute([$username]);
          $res = $stmt->fetch();
          $id = $res['id'];
    
          logAct('Admin', $id, "New Client: $username added to the system.", $pdo);
          $username = "";
          $email = "";
          $_POST['password'] = "";
          $_POST['cpassword'] = "";
          $full_name = "";
          $middle_name = "";
          $last_name = "";
          $address = "";
          $contact_number = "";
          
        
          $_SESSION['alert'] = 'success';
          $_SESSION['flash_message'] = "Client Account Succesfully Created!";
          header("Location: ../${_SESSION['folder']}/clientProfile.php");
          exit;
        } else {
          $_SESSION['alert'] = 'danger';
          $_SESSION['flash_message'] = "Oops! Something went wrong!";
          header("Location: ../${_SESSION['folder']}/clientProfile.php");
        }
      } else {
        $_SESSION['alert'] = 'danger';
        $_SESSION['flash_message'] = "Email already exists!";
        header("Location: ../${_SESSION['folder']}/addClient.php");
      }
    } else {
      $_SESSION['alert'] = 'danger';
      $_SESSION['flash_message'] = "Passwords did not match!";
      header("Location: ../${_SESSION['folder']}/addClient.php");
  }
}

    // if ($password == $cpassword) {
//   if (notEmpty($username) && notEmpty($email) && notEmpty($password) && notEmpty($full_name) && notEmpty($middle_name) && notEmpty($last_name) && notEmpty($address) && notEmpty($contact_number)){
//     $qry = "INSERT INTO `customer`(username, email, password, full_name, middle_name, last_name, address, contact_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

//     $stmt = $pdo->prepare($qry);
//     $param = array($username, $email, $password, $full_name, $middle_name, $last_name, $address, $contact_number);
//     // $stmt->execute([$username]);
//     $res = $stmt->fetch();
//     $id = $res['id'];

//     if ($stmt->execute($param)) {
//       logAct('Client', $id, "New Client: $username added to the system.", $pdo);
//       // logAction("New Client: $full_name $last_name added to the system.", $pdo);

//       // $folder = $_SESSION["folder"];
//       echo "<script>alert(Account succesfully created!'')</script>";
//     //   $_SESSION["alert"] = "New employee successfully added.";
//       // header("Location:../clientProfile.php");
//       header("Location: ../${_SESSION['folder']}/clientProfile.php");
//       // clearPostInputs(["username", "email", "password", "full_name",  "middle_name", "last_name", "address", "contact_number"]);
//       // exit;
//     } else {
//       // $folder = $_SESSION["folder"];
//       echo "<script>alert('Oops! Something went wrong!')</script>";
//       // $_SESSION["alert"] = "Something went wrong.";
//       // header("Location: ../clientProfile.php");
//       // exit;
//     }
//   } else {
//     // $folder = $_SESSION["folder"];
//     echo "<script>alert('Email Already Exists!')</script>";
//     // $_SESSION["alert"] = "Incomplete input";
//     // header("Location: ../clientProfile.php");
//     // exit;
//   }
// } else {
//   // $folder = $_SESSION["folder"];
//   echo "<script>alert('Password Not Matched.')</script>";
//   // $_SESSION["alert"] = "Something went wrong.";
//   // header("Location: ../addClientForm.php");
//   // exit;
// }





