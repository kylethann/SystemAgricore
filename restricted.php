
<?php
session_start();
// require_once '../config.php';
include '../config.php';

if(isset($_SESSION['id']) || trim($_SESSION['id'])== ''){
    header("location: index.php");
}
$sql= "SELECT * from admin where id= '".$_SESSION['id']."'";
$query=$pdo->prepare($sql);
$query->execute();
$row=$query->fetch(PDO::FETCH_OBJ);

if($query->rowCount() > 0){
    foreach($row as $adminResult);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=3, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Warning!</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="restricted.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <div class="card" style="width: 40rem;">
      <img class="card-img-top" src="res4.png" alt="warning">
        <div class="card-body">
          <h1 class="card-title">Oops! You shouldn't be here!</h1>
          <h4 class="card-text">You are not authorized to access this page.</h4>
        <a href="./<?= $_SESSION['role'] ?>/dashboard.php" class="btn btn-danger">Dashboard</a>
      </div>
    </div>
  </body>
</html>