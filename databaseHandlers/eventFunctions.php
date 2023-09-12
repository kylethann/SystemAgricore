<?php

function getEvent($id, $pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
  $stmt->execute([$id]);

  if ($stmt->rowCount() > 0) {
    return $stmt->fetch();
  }
}

function getEventsToday($pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM events WHERE `start` <= NOW() AND `end` >= NOW()");
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    return $stmt->fetchAll();
  }
}

function getUpcomingEvents($pdo)
{
  $stmt = $pdo->prepare("SELECT * FROM events WHERE `start` >= NOW()");
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    return $stmt->fetchAll();
  }
}
