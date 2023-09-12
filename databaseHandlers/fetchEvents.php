<?php

require_once('../config.php');


// Filter events by calendar date
$where_sql = '';
if (!empty($_GET['start']) && !empty($_GET['end'])) {
  $where_sql .= " WHERE start BETWEEN '" . $_GET['start'] . "' AND '" . $_GET['end'] . "' ";
}

// Fetch events from database
$sql = "SELECT * FROM events $where_sql";
$result = $pdo->query($sql);

$eventsArr = array();
if ($result->rowCount() > 0) {
  while ($row = $result->fetch()) {
    array_push($eventsArr, $row);
  }
}

echo json_encode($eventsArr);
