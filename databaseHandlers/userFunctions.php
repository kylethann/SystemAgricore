<?php

function fetchUsers($table, $pdo)
{
  $stmt = $pdo->prepare("SELECT $table.id, $table.username, $table.fullName, $table.email, $table.dateCreated, $table.profile_photo, position.position_name as position FROM $table INNER JOIN position ON $table.position_id = position.id");
  if ($stmt->execute()) {
    return $stmt->fetchAll();
  }
}

function fetchAdmins($pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM admin");
  if ($stmt->execute()) {
    return $stmt->fetchAll();
  }
}

function fetchClients($pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM customer");
  if ($stmt->execute()) {
    return $stmt->fetchAll();
  }
}

function fetchFarmers($pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM farmer1");
  if ($stmt->execute()) {
    return $stmt->fetchAll();
  }
}

function fetchUser($table, $id, $pdo)
{
  $stmt = $pdo->prepare("SELECT $table.id, $table.username, $table.fullName, $table.email, $table.dateCreated, $table.profile_photo, position.position_name as position FROM $table INNER JOIN tbl_position ON $table.position_id = position.id where $table.id = ?");
  if ($stmt->execute([$id])) {
    return $stmt->fetch();
  }
}

function fetchClient($id, $pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM customer WHERE id = ?");
  if ($stmt->execute([$id])) {
    return $stmt->fetch();
  }
}

function getTotalUsers($pdo)
{
  $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM customer");
  $stmt->execute();
  $result = $stmt->fetch();
  $customerTotal = $result['total'];

  $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM admin");
  $stmt->execute();
  $result = $stmt->fetch();
  $adminTotal = $result['total'];

  $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM farmer1");
  $stmt->execute();
  $result = $stmt->fetch();
  $farmerTotal = $result['total']; 

  return $customerTotal + $adminTotal + $farmerTotal;
}


function getTotalClient($pdo)
{
  $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM customer");
  $stmt->execute();
  $result = $stmt->fetch();
  $customerTotal = $result['total'];

  return $customerTotal;
}

function getTotalFarmers($pdo)
{
  $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM farmer1");
  $stmt->execute();
  $result = $stmt->fetch();
  $farmerTotal = $result['total'];

  return $farmerTotal;
}

function getTotalAdmin($pdo)
{
  $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM admin");
  $stmt->execute();
  $result = $stmt->fetch();
  $adminTotal = $result['total'];

  return $adminTotal;
}

// COUNT TOTAL PENDING REQUEST FROM FARMER
function getTotalPending($pdo)
{
  $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM admin");
  $stmt->execute();
  $result = $stmt->fetch();
  $pendingTotal = $result['total'];

  return $pendingTotal;
}

// COUNT TOTAL APPROVE REQUEST FROM ADMIN
function getTotalApproved($pdo)
{
  $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM admin");
  $stmt->execute();
  $result = $stmt->fetch();
  $approvedTotal = $result['total'];

  return $approvedTotal;
}

// COUNT TOTAL APPROVE REQUEST FROM ADMIN
function getTotalEvent($pdo)
{
  $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM events");
  $stmt->execute();
  $result = $stmt->fetch();
  $eventsTotal = $result['total'];

  return $eventsTotal;
}

// function getTotalActiveUsers($pdo)
// {
//   $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM `client` WHERE last_activity > NOW() - INTERVAL 15 MINUTE");
//   $stmt->execute();
//   $result = $stmt->fetch();
//   $clientTotal = $result['total'];

//   $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM `admin` WHERE last_activity > NOW() - INTERVAL 15 MINUTE");
//   $stmt->execute();
//   $result = $stmt->fetch();
//   $adminTotal = $result['total'];

//   $stmt = $pdo->prepare("SELECT COUNT(id) as total FROM `superadmin` WHERE last_activity > NOW() - INTERVAL 15 MINUTE");
//   $stmt->execute();
//   $result = $stmt->fetch();
//   $superadminTotal = $result['total'];

//   return $clientTotal + $adminTotal + $superadminTotal;
// }

function getPositionList($pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM position");
  if ($stmt->execute()) {
    return $stmt->fetchAll();
  }
}

// function updateActivityTime($table, $userID, $pdo)
// {
//   $stmt = $pdo->prepare("UPDATE $table SET last_activity = CURRENT_TIMESTAMP() WHERE id = ?");

//   $stmt->execute([$userID]);
// }

// function shortString($string, $limit)
// {
//   if (strlen($string) > $limit) {
//     return substr($string, 0, $limit) . "...";
//   } else {
//     return $string;
//   }
// }


