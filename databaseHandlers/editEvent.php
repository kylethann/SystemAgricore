<?php
include('../config.php');
include('../databaseHandlers/audit_trailFunctions.php');

session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $eventId = $_POST['eventId'];
  $eventTitle = $_POST['eventTitle'];
  $eventDesc = $_POST['eventDesc'];
  $startDate = $_POST['startDate'];
  $color = $_POST['color'];
  $endDate = $_POST['endDate'];

  if (!empty($eventTitle) && !empty($eventDesc) && !empty($startDate) && !empty($endDate)) {
    $stmt = $pdo->prepare("UPDATE events SET title = ?, `description` = ?, `start` = ?, `end` = ?, color = ? WHERE id = ?");
    if ($stmt->execute([$eventTitle, $eventDesc, $startDate, $endDate, $color, $eventId])) {
      logAct($_SESSION['role'], $_SESSION['id'], "Successfully updated Event: $eventTitle.", $pdo);
      $_SESSION['alert'] = 'success';
      $_SESSION['flash_message'] = "Event updated!";
      header("Location: ../${_SESSION['folder']}/dashboard.php");
    }
  } else {
    $_SESSION['alert'] = 'danger';
    $_SESSION['flash_message'] = "Something went wrong!";
    header("Location: ../${_SESSION['folder']}/dashboard.php");
  }
}
