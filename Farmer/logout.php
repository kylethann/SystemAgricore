<?php
include '../config.php';

session_start();

include_once('../databaseHandlers/audit_trailFunctions.php');
logAct($_SESSION['role'], $_SESSION['id'], "Logout", $connection);
session_destroy();

header("Location: ./index.php");


