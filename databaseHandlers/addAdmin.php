<?php
include('../config.php');
include('../databaseHandlers/audit_trailFunctions.php');

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  // $Profile_Photo = $_FILES['Profile_Photo'];
  
  if (isset($_FILES['Profile_Photo']['name']) AND !empty($_FILES['Profile_Photo']['name'])) {

    $img_name = $_FILES['Profile_Photo']['name'];
    $tmp_name = $_FILES['Profile_Photo']['tmp_name'];
    $error = $_FILES['Profile_Photo']['error'];
    
    if($error === 0){
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_to_lc = strtolower($img_ex);

      $allowed_exs = array('jpg', 'jpeg', 'png');
      if(in_array($img_ex_to_lc, $allowed_exs)){
        $new_img_name = uniqid($username, true).'.'.$img_ex_to_lc;
        $img_upload_path = '../upload/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        
        // Insert into Database
        $sql = "INSERT INTO admim(username, fullName, email, password, Profile_Photo)
          VALUES(?,?,?,?,?)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([$username, $fullName, $email, $password, $new_img_name]);

          if ($password == $cpassword) {
            $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE email= ? ");
            $stmt->execute([$email]);
            if (!$stmt->rowCount() > 0) {
              $sql = $pdo->prepare("INSERT INTO `admin` (username, fullName, email, password, Profile_Photo)
                VALUES (?, ?, ?, ?, ?)");
                $result = $sql->execute([$username, $fullName, $email, $password, $Profile_Photo]);
        
                if ($result) {
                  $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
                  $stmt->execute([$username]);
                  $res = $stmt->fetch();
                  $id = $res['id'];
          
                  logAct('Admin', $id, "New Admin: $username added to the system.", $pdo);
                  $username = "";
                  $fullName = "";
                  $email = "";
                  $_POST['password'] = "";
                  $_POST['cpassword'] = "";
                  $_FILES['Profile_Photo']= "";
          
                  $_SESSION['flash_message'] = "New Admin Account successfully created!";
                  $_SESSION['alert'] = 'success';
                  header("Location: ../${_SESSION['folder']}/prof.php");
                } else {
                  $_SESSION['alert'] = 'danger';
                  $_SESSION['flash_message'] = "Something went wrong!";
                  header("Location: ../${_SESSION['folder']}/prof.php");
                }
              } else {
              $_SESSION['alert'] = 'danger';
              $_SESSION['flash_message'] = "Email already exists!";
              header("Location: ../${_SESSION['folder']}/prof.php");
            }
          } else {
            $_SESSION['alert'] = 'danger';
            $_SESSION['flash_message'] = "Passwords did not match!";
            header("Location: ../${_SESSION['folder']}/prof.php");
          }
          // header("Location: ../${_SESSION['folder']}/users.php");
          // header("Location: ../index.php?success=Your account has been created successfully");
           exit;
    }else {
          // $em = "You can't upload files of this type";
          $_SESSION['alert'] = 'danger';
          $_SESSION['flash_message'] = "You can't upload files of this type";
          // header("Location: ../index.php?error=$em&$data");
          exit;
       }
}else {
      //  $em = "unknown error occurred!";
       $_SESSION['alert'] = 'danger';
      $_SESSION['flash_message'] = "unknown error occurred!";
      //  header("Location: ../index.php?error=$em&$data");
       exit;
    }

}
}

