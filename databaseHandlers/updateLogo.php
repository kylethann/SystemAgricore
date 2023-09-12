<?php
session_start();
require('../config.php');
include('./audit_trailFunctions.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_FILES['logo']['name']) and !empty($_FILES['logo']['name'])) {
    $image_name = $_FILES['logo']['name'];
    $tmp_name = $_FILES['logo']['tmp_name'];
    $error = $_FILES['logo']['error'];

    if ($error === 0) {
      $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
      $img_ex_to_lc = strtolower($img_ex);

      $allowed_exs = array('png');

      if (in_array($img_ex_to_lc, $allowed_exs)) {
        $img_upload_path = '../icon.png';

        $old_pp_des = '../icon.png';

        if (unlink($old_pp_des)) {
          move_uploaded_file($tmp_name, $img_upload_path);
        } else {
          move_uploaded_file($tmp_name, $img_upload_path);
        }

        logAct($_SESSION['role'], $_SESSION['id'], "Updated Website Logo", $pdo);

        $_SESSION['flash_message'] = "Website Logo updated!";
        $_SESSION['alert'] = 'success';
        header("Location: ../${_SESSION['folder']}/site_settings.php");
        exit;
      } else {
        $_SESSION['alert'] = 'danger';
        $_SESSION['flash_message'] = "Unsupported File Type!";
        header("Location: ../${_SESSION['folder']}/site_settings.php");
        exit;
      }
    }
  } else {
    $_SESSION['alert'] = 'danger';
    $_SESSION['flash_message'] = "Something went wrong!";
    header("Location: ../${_SESSION['folder']}/site_settings.php");
    exit;
  }
}
