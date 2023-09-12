<?php
session_start();
require('../config.php');
include('./audit_trailFunctions.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_SESSION['id'];
  $table = $_SESSION['role'];
  $oldPhoto = $_POST['oldPhoto'];

  if (isset($_FILES['photo']['name']) and !empty($_FILES['photo']['name'])) {
    $image_name = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];

    if ($error === 0) {
      $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
      $img_ex_to_lc = strtolower($img_ex);

      $allowed_exs = array('jpg', 'jpeg', 'png');

      if (in_array($img_ex_to_lc, $allowed_exs)) {
        $new_img_name = uniqid($username, true) . "." . $img_ex_to_lc;
        $img_upload_path = '../upload/profile_photos/' . $new_img_name;

        $old_pp_des = $oldPhoto;

        if (unlink($old_pp_des)) {
          move_uploaded_file($tmp_name, $img_upload_path);
        } else {
          move_uploaded_file($tmp_name, $img_upload_path);
        }

        $stmt = $pdo->prepare("UPDATE $table SET Profile_Photo = ? WHERE id = ?");
        $stmt->execute([$img_upload_path, $id]);

        $role = $_SESSION['role'];

        logAct($role, $_SESSION['id'], "Updated profile photo of ID #$id from $role table.", $pdo);

        $_SESSION['flash_message'] = "Profile Photo updated!";
        $_SESSION['alert'] = 'success';
        header("Location: ../${_SESSION['folder']}/profile.php");
        exit;
      } else {
        $_SESSION['alert'] = 'danger';
        $_SESSION['flash_message'] = "Unsupported File Type!";
        header("Location: ../${_SESSION['folder']}/profile.php");
        exit;
      }
    }
  } else {
    $_SESSION['alert'] = 'danger';
    $_SESSION['flash_message'] = "Something went wrong!";
    header("Location: ../${_SESSION['folder']}/profile.php");
    exit;
  }
}
