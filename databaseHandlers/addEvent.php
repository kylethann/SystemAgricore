<?php
include('../config.php');
include('../databaseHandlers/audit_trailFunctions.php');

session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $eventTitle = $_POST['eventTitle'];
  $eventDesc = $_POST['eventDesc'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $color = $_POST['color'];

  if (!empty($eventTitle) && !empty($eventDesc) && !empty($startDate) && !empty($endDate)) {
    $stmt = $pdo->prepare("INSERT INTO events (title, `description`, `start`, `end`, color) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$eventTitle, $eventDesc, $startDate, $endDate, $color])) {
      $stmt = $pdo->query("SELECT * FROM events ORDER BY id DESC LIMIT 1");
      $res = $stmt->fetch();
      $id = $res['id'];
      $url = "./dashboard.php?eventid=$id";
 
      if (!empty($id)) {
        $stmt = $pdo->prepare("UPDATE events SET `url` = ? WHERE id = ?");
        $stmt->execute([$url, $id]);
      }


      logAct($_SESSION['role'], $_SESSION['id'], "New event: $eventTitle added to the events table.", $pdo);
      $_SESSION['alert'] = 'success';
      $_SESSION['flash_message'] = "New Event Added";
      header("Location: ../${_SESSION['folder']}/dashboard.php");
    }
  } else {
    $_SESSION['alert'] = 'danger';
    $_SESSION['flash_message'] = "Something went wrong!";
    header("Location: ../${_SESSION['folder']}/dashboard.php");
  }
}
