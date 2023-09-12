<?php
include('../config.php');
include('./audit_trailFunctions.php');

session_start();

// UPDATING DATA
if(isset($_POST['update']))
{

  $farmer_id= $_POST["farmer_id"];
  $username= $_POST["username"];
  $email= $_POST["email"];
  $password = md5($_POST['password']);
  $name= $_POST["name"];
  $middleName= $_POST["middleName"];
  $surname= $_POST["surname"];
  $gender= $_POST["gender"];
  $age= $_POST["age"];
  $birthday= $_POST["birthday"];
  $address= $_POST["address"];
  $contactNumber= $_POST["contactNumber"];
    // $farmerCrops= $_POST["crops"];
  

        

  try{
    $query = "UPDATE farmer1 SET username=:username, email=:email, password =:password, 
    name=:name, middleName=:middleName, surname=:surname,gender=:gender, age=:age, birthday=:birthday, 
    address=:address, contactNumber=:contactNumber WHERE id=:far_id LIMIT 1";
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
    
    
}




// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   $username = $_POST['username'];
//   $fullName = $_POST['fullName'];
//   $email = $_POST['email'];
//   $password = md5($_POST['password']);
//   $cpassword = md5($_POST['cpassword']);
//   // $id = $_POST['id'];
//   // $position = isset($_POST['position_id']) ? $_POST['position_id'] : '';
//   // $role = $_POST['role'];
//   $admin_id = $_POST['admin_id'];

//   $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ? ");
//   $stmt->execute([$email]);
//   $res = $stmt->fetch();
//   if (!$stmt->rowCount() > 0 || $res['admin_id'] == $admin_id) {
//     if (!empty($position)) {
//       $sql = $pdo->prepare("UPDATE $role SET username = ?, fullName = ?, email = ?, password = ? WHERE admin_id = ?");
//       $result = $sql->execute([$username, $fullName, $email, $password, $admin_id]);

//       if ($result) {
//         logAct($_SESSION['role'], $_SESSION['id'], "Updated information of ID #$admin_id from $role table", $pdo);

//         $_SESSION['flash_message'] = "Account updated!";
//         $_SESSION['alert'] = 'success';
//         header("Location: ../${_SESSION['folder']}/users copy.php");
//       } else {
//         $_SESSION['alert'] = 'danger';
//         $_SESSION['flash_message'] = "Something went wrong!";
//         header("Location: ../${_SESSION['folder']}/users copy.php");
//       }
//     } else {
//       $sql = $pdo->prepare("UPDATE admin SET username = ?, fullName = ?, email = ? , password = ? WHERE admin_id = ?");
//       $result = $sql->execute([$username, $fullName, $email, $password, $admin_id]);

//       if ($result) {
//         logAct($_SESSION['role'], $_SESSION['id'], "Updated information of ID #$admin_id from $role table", $pdo);

//         $_SESSION['flash_message'] = "Account updated!";
//         $_SESSION['alert'] = 'success';
//         header("Location: ../${_SESSION['folder']}/flash_message.php");
//       } else {
//         $_SESSION['alert'] = 'danger';
//         $_SESSION['flash_message'] = "Something went wrong!";
//         header("Location: ../${_SESSION['folder']}/flash_message.php");
//       }
//     }
//   } else {
//     $_SESSION['flash_message'] = "Email already exists!";
//     $_SESSION['alert'] = 'danger';

//     header("Location: ../${_SESSION['folder']}/flash_message.php");
//   }
// }

