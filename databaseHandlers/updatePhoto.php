<?php
session_start();
require('../config.php'); 
include('./audit_trailFunctions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = $_SESSION['id'];
  $table = $_SESSION['role'];

  if (isset($_FILES['photo']['name']) and !empty($_FILES['photo']['name'])) {

    $image_name = $_FILES['photo']['name'];  
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];
    $croppedPhoto = $_POST['cropped-photo'];

    if ($error === 0) {
      
      $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array('jpg', 'jpeg', 'png');
      
      if (in_array($img_ex_lc, $allowed_exs)) {

        // Generate new filename
        $new_img_name = uniqid($username, true) . '.' . $img_ex_lc;
        $img_upload_path = '../Uploads/profile_photos/' . $croppedPhoto;       
        
        $oldPhoto = $pdo->prepare("SELECT Profile_Photo FROM $table WHERE id = ?");
        $oldPhoto -> execute([$id]);
        $deletedPhoto = $oldPhoto -> fetch(PDO::FETCH_OBJ);

        // Update database
        $stmt = $pdo->prepare("UPDATE $table SET Profile_Photo = ? WHERE id = ?");
        $stmt->execute([$img_upload_path, $id]);
        $role = $_SESSION['role'];
        
        // Delete old file
        if($deletedPhoto){
        unlink($deletedPhoto->Profile_Photo);
        }

        logAct($role, $_SESSION['id'], "Updated profile photo of ID #$id from $role table.", $pdo);
        // Redirect
        $_SESSION['flash_message'] = "Photo Uploaded";
        $_SESSION['alert'] = 'success';
        header("Location: ../${_SESSION['folder']}/profile.php");
        exit;

      } else {
        // Invalid file type
        $_SESSION['flash_message'] = "Invalid file type!";
        $_SESSION['alert'] = 'danger';
        header("Location: profile.php");
        exit;
      }

    } else {
      // Upload error
      $_SESSION['flash_message'] = "Upload error!";
      $_SESSION['alert'] = 'danger';
      header("Location: profile.php");
      exit; 
    }

  } else {
    // No image provided
    $_SESSION['flash_message'] = "No image uploaded!";
    $_SESSION['alert'] = 'danger';
    header("Location: profile.php");
    exit;
  }

}


$_SESSION['flash_message'] = "Something went wrong!";
$_SESSION['alert'] = 'danger';
header("Location: ../Admin/users.php");
// header("Location: ../${_SESSION['folder']}/users.php");
// header('Location: users.php');
exit(0);