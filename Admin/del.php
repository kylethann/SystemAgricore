<?php

if(isset($_POST['employers_delete']))
{

  $id = $_POST['employersdelete_id'];

  $select = $conn->prepare("SELECT * FROM employers WHERE id = ?");
  $select->execute([$id]);

  $row = $select->fetch(PDO::FETCH_ASSOC);
  if($select->rowCount() > 0){

  
    $emp_email = $row['email'];
}
}