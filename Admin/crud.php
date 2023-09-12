<?php
// session_start();
include('../config.php');
include('includes/header.php');


// Delete MIS Account


if(isset($_POST['mis_delete']))
{

  $id = $_POST['misdelete_id'];

  $select = $conn->prepare("SELECT * FROM mis WHERE id = ?");
  $select->execute([$id]);

  $row = $select->fetch(PDO::FETCH_ASSOC);
  if($select->rowCount() > 0){

  
    $mis_email = $row['email'];
  }



//Delete Audit Trail
        
date_default_timezone_set("Asia/Manila"); 
                   
$time = date("h:i:s a");
$date = date("m/d/Y");
$act = "Deleted The MIS Account:  ".$id;



$DATEE = $date;
$TIMEE = $time;
$email = $_SESSION['email'];
$action = $act;
$access_level = $_SESSION['access_level'];

/*          name Of table                  Rows                               target names */
$query1 = "INSERT INTO activitylogs (date,time,email,access_level,action) VALUES (:date, :time, :email, :access_level, :action)";
$query_run = $conn->prepare($query1);


/* Getting The Values */

$data1 = [
    ':date' => $DATEE,
    ':time' => $TIMEE,
    ':email' => $email,
    ':access_level' => $access_level,
    ':action' => $act,



];

  /* Executing the command */
$query_execute = $query_run->execute($data1);

//Deleting to Active List
$query2 = "DELETE FROM actives WHERE email=:mis_email";
    $statement2 = $conn->prepare($query2);
    $data2 = [

     ':mis_email' => $mis_email

    ];

    $query_execute = $statement2->execute($data2);


  try {
    
    $query = "DELETE FROM mis WHERE id=:id";
    $statement = $conn->prepare($query);
    $data = [

     ':id' => $id

    ];

    $query_execute = $statement->execute($data);

    if($query_execute)
  {

    $_SESSION['status'] = "MIS Account : $id has been Deleted Succesfully";
    $_SESSION['status_code'] = "success";
    header('Location: ../miss.php');
    exit(0);

  }
  else
  {

    $_SESSION['delete'] = "Deleting Error";
    $_SESSION['delete_code'] = "success";
    header('Location: ../miss.php');
    exit(0);
     
  }

  } catch (PDOException $e) {
    echo $e->getMessage();
  }



}


















//Edit MIS Office

if(isset($_POST['misedit_btn']))
{

  $id = $_POST['id'];
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $mis_email = $_POST['mis_email'];
  $password = $_POST['password'];


  //Update Audit Trail
                   
date_default_timezone_set("Asia/Manila"); 
                   
$time = date("h:i:s a");
$date = date("m/d/Y");
$act = "Updated The MIS Account:  ".$mis_email;



$DATEE = $date;
$TIMEE = $time;
$email = $_SESSION['email'];
$access_level = $_SESSION['access_level'];
$action = $act;

/*          name Of table                  Rows                               target names */
$query1 = "INSERT INTO activitylogs (date,time,email,access_level,action) VALUES (:date, :time, :email, :access_level, :action)";
$query_run = $conn->prepare($query1);


/* Getting The Values */

$data1 = [
    ':date' => $DATEE,
    ':time' => $TIMEE,
    ':email' => $email,
    ':access_level' => $access_level,
    ':action' => $act,



];

  /* Executing the command */
$query_execute = $query_run->execute($data1);

/* For Actives */

$query2 = "UPDATE actives SET name=:name WHERE email=:mis_email LIMIT 1";
$query_run2 = $conn->prepare($query2);


/* Getting The Values */

$data2 = [
  

':name' => $name,
':mis_email' => $mis_email,


];

/* Executing the command */
$query_execute = $query_run2->execute($data2);


 try {

  $query = "UPDATE mis SET name=:name, contact=:contact, age=:age, address=:address, email=:mis_email, password=:password WHERE id=:id LIMIT 1";
  $statement = $conn->prepare($query);

  $data = [

    ':id' => $id,
    ':name' => $name,
    ':contact' => $contact,
    ':age' => $age,
    ':address' => $address,
    ':mis_email' => $mis_email,
    ':password' => $password,
    
  ];
  $query_execute = $statement->execute($data);


  if($query_execute)
  {
  
    $_SESSION['status'] = "MIS Office : $name has been Updated Succesfully";
    $_SESSION['status_code'] = "success";
    header('Location: ../miss.php');
    exit(0);
  
  }
  else
  {
  
    $_SESSION['delete'] = "Updating Error";
    $_SESSION['delete_code'] = "success";
    header('Location: ../miss.php');
    exit(0);
     
  }
  

 } catch (PDOException $e) {
  echo $e->getMessage();
 }

}

















//Add MIS Account

if(isset($_POST['misadd_btn']))

{

  $mis_password = "";
  $charCount = readline("How many characters should the password be : ");
  $capitalChars = readline("How many capital characters : ");
  $specialChars = readline("How many special characters : ");
  $numericChars = readline("How many numeric characters : ");
  
  function validateInput($input){
      $input == '0'? $input = -5 : $input = intval($input); 
  
      if($input == 0){
          echo 'ERROR: input error, all entries must be numbers.';
          die();
      }
      return $input;
  }
  
  $charCount = validateInput($charCount);
  $capitalChars = validateInput($capitalChars);
  $specialChars = validateInput($specialChars);
  $numericChars = validateInput($numericChars);
  
  if($charCount < ($specialChars + $capitalChars + $numericChars)){
      echo 'ERROR: input error, the sum of all the types of characters, must be less than the total character count';
      die();
  }
  
  function generatePassword($chars, $charType){
      $mis_password = "";
      $charList = array(
          'regular'=>array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"),
          'capital' =>array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"),
          'numeric' => array('1','2','3','4','5','6','7','8'.'9'.'0'),
          'special' => array("!", "?", ".")
      );
      
      $randomNumbers = array_rand($charList[$charType], $chars);
      if(gettype($randomNumbers) == 'array'){
      foreach ($randomNumbers as $randomNumber => $value) {
      $mis_password .= $charList[$charType][$value];
      }
      }
      else{
          $mis_password .= $charList[$charType][$randomNumbers];
      }
      return $mis_password;
  }
  if($capitalChars > 0)
      $mis_password .= generatePassword($capitalChars, 'capital', $mis_password);
  
  if($specialChars > 0)
      $mis_password .= generatePassword($specialChars, 'special', $mis_password);
  
  if($numericChars > 0)
      $mis_password .= generatePassword($numericChars, 'numeric', $mis_password);
  $regularChars = $charCount - ($specialChars + $capitalChars + $numericChars);
  if($regularChars > 0)
      $mis_password .= generatePassword($regularChars, 'regular', $mis_password);
  
  $mis_password = str_shuffle($mis_password);
  

  //End of Random Password


  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $mis_email = $_POST['mis_email'];
  $images = "dhvsu.png";
  $bio = "No bio yet";
  $mis_level = "Admin";
  $purpose = "ojt";



  //Users database
  $select = $conn->prepare("SELECT * FROM coordinators WHERE email = ?");
  $select->execute([$mis_email]);
  
  $select2 = $conn->prepare("SELECT * FROM employers WHERE email = ?");
  $select2->execute([$mis_email]);
  
  $select3 = $conn->prepare("SELECT * FROM interns WHERE email = ?");
  $select3->execute([$mis_email]);
  
  $select4 = $conn->prepare("SELECT * FROM mis WHERE email = ?");
  $select4->execute([$mis_email]);
  
  $select5 = $conn->prepare("SELECT * FROM faculty WHERE email = ?");
  $select5->execute([$mis_email]);
  
  
  if($select->rowCount() > 0 || $select2->rowCount() > 0 || $select3->rowCount() > 0 || $select4->rowCount() > 0 || $select5->rowCount() > 0 ){
    $_SESSION['error'] = "Adding Error";
    $_SESSION['error_code'] = "warning";
    header('Location: ../miss.php');
    exit(0);
  
   
    }else{


$id = $_POST['id'];


try {

  $query = "INSERT INTO mis (id, name, contact, age, address, email, password, image, bio, access_level, purpose) VALUES (:id, :name, :contact, :age, :address, :mis_email, :password, :image, :bio, :mis_level, :purpose)";
  $query_run = $conn->prepare($query);
  
  $data = [
  
      ':id' => $id,
      ':name' => $name,
      ':contact' => $contact,
      ':age' => $age,
      ':address' => $address,
      ':mis_email' => $mis_email,
      ':password' => $password,
      ':image' => $images,
      ':bio' => $bio,
      ':mis_level' => $mis_level,
      ':purpose' => $purpose,
  
          ];
  
  $query_execute = $query_run->execute($data);
  
  $subject = "Your Account Was Successfully Added to Our System!";
          
  // Email Script
  
  
  try {
  
      $url = "https://script.google.com/macros/s/AKfycbyrlUym7jf_SzGqhstmmAYC_HUys8OC3mJZ-hrOkrLX-fRXweZNhepFO5sGCRMqrkg/exec";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_POSTFIELDS => http_build_query([
              "recipient" =>  $mis_email,
              "subject"   => $subject,
              "body"      => "Hey There, ".$name."
              
Your Account Was Successfully Added to Our System as a ".$mis_level." Please Use This Password Temporarily to Login your Account and Kindly Change it after.
  
              
Your password now is: ".$mis_password
           ])
        ]);
  
        $result = curl_exec($ch);
  
      } catch (PDOException $e) {
        echo $e->getMessage();
       }
  

  //Add Audit Trail
             
  date_default_timezone_set("Asia/Manila"); 
                   
  $time = date("h:i:s a");
  $date = date("m/d/Y");
  $act = "Added new MIS Account:  ".$mis_email;
  
  
  
  $DATEE = $date;
  $TIMEE = $time;
  $email = $_SESSION['email'];
  $action = $act;
  $access_level = $_SESSION['access_level'];
  
  /*          name Of table                  Rows                               target names */
  $query1 = "INSERT INTO activitylogs (date,time,email,access_level,action) VALUES (:date, :time, :email, :access_level, :action)";
  $query_run = $conn->prepare($query1);
  
  
  /* Getting The Values */
  
  $data1 = [
      ':date' => $DATEE,
      ':time' => $TIMEE,
      ':email' => $email,
      ':access_level' => $access_level,
      ':action' => $act,
  
  
  
  ];

   /* Executing the command */
  $query_execute = $query_run->execute($data1);

  $status = "Offline";

  //Add Actives Table
/*          name Of table                  Rows                               target names */
  $query2 = "INSERT INTO actives (email,name,access_level,status) VALUES (:mis_email, :name, :mis_level, :status)";
  $query_run2 = $conn->prepare($query2);

  
/* Getting The Values */

$data2 = [
    
  ':mis_email' => $mis_email,
  ':name' => $name,
  ':mis_level' => $mis_level,
  ':status' => $status,



];

/* Executing the command */
$query_execute = $query_run2->execute($data2);


if($query_execute)
{

  $_SESSION['status'] = "MIS Office : $name has been Added Succesfully";
  $_SESSION['status_code'] = "success";
  header('Location: ../miss.php');
  exit(0);

}
else
{

  $_SESSION['delete'] = "Adding Error";
  $_SESSION['delete_code'] = "success";
  header('Location: ../miss.php');
  exit(0);
   
}


 } catch (PDOException $e) {
  echo $e->getMessage();
 }
    }
}

?>