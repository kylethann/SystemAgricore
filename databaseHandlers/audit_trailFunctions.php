<?php
function logAct($role, $user_id, $action, $pdo)
{
  $stmt = $pdo->prepare("INSERT INTO audit_trail (`role`, `user_id`, `action`) VALUES (?, ?, ?)");

  $stmt->execute([$role, $user_id, $action]);
}

function getLogs($pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM audit_trail ORDER BY id DESC");
  if ($stmt->execute()) {
    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll();
    }
  }
}

function getUserLogs($role, $user_id, $pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM audit_trail WHERE `role` = ? AND `user_id` = ? ORDER BY id DESC");
  if ($stmt->execute([$role, $user_id])) {
    if ($stmt->rowCount() > 0) {
      if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll();
      }
    }
  }
}

function getUserLogsLimited($role, $user_id, $limit, $pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM audit_trail WHERE `role` = ? AND `user_id` = ? ORDER BY id DESC LIMIT $limit");
  if ($stmt->execute([$role, $user_id])) {
    if ($stmt->rowCount() > 0) {
      return $stmt->fetchAll();
    }
  }
}