<?php
include('../config.php');
include('../databaseHandlers/audit_trailFunctions.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $stmt = $pdo->prepare("DELETE FROM events WHERE id = ? ");
  if ($stmt->execute([$id])) {
    logAct($_SESSION['role'], $_SESSION['id'], "ID #$id deleted from events table", $pdo);
    $_SESSION['flash_message'] = "Event succesfully deleted!";
    $_SESSION['alert'] = 'warning';
    header("Location: ../${_SESSION['folder']}/dashboard.php");
  } else {
    $_SESSION['flash_message'] = "Something went wrong!";
    $_SESSION['alert'] = 'danger';
    header("Location: ../${_SESSION['folder']}/dashboard.php");
  };
}
