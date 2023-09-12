<?php

function fetchUsers($table, $pdo)
{
  $stmt = $pdo->prepare("SELECT $table.id, $table.username, $table.fullName, $table.email, $table.dateCreated, $table.profile_photo, position.position_name as position FROM $table INNER JOIN position ON $table.position_id = position.id");
  if ($stmt->execute()) {
    return $stmt->fetchAll();
  }
}

function getPositionList($pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM tbl_position");
  if ($stmt->execute()) {
    return $stmt->fetchAll();
  }
}

function updateActivityTime($table, $userID, $pdo)
{
  $stmt = $pdo->prepare("UPDATE $table SET last_activity = CURRENT_TIMESTAMP() WHERE id = ?");

  $stmt->execute([$userID]);
}