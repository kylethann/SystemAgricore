<?php
require '../config.php';
include '../databaseHandlers/audit_trailFunctions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $websiteName = $_POST['websiteName'];
  $theme = explode("/", $_POST['theme']);
  $navBG = $theme[0];
  $navColorTheme = $theme[1];


  $stmt = $pdo->prepare("UPDATE `site_settings` SET `site_name`= ?, `nav_color`= ?, `nav_color_mode`= ? WHERE id = 1");
  if ($stmt->execute([$websiteName, $navBG, $navColorTheme])) {
    logAct($_SESSION['role'], $_SESSION['id'], "Updated site settings", $pdo);

    $_SESSION['alert'] = 'success';
    $_SESSION['flash_message'] = "Successfully updated Question content";
    header("Location: ../${_SESSION['folder']}/site_settings.php");
    exit;
  }
}
