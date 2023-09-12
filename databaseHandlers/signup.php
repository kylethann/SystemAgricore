<?php 
//  $username = $_POST['username'];
//  $fullName = $_POST['fullName'];
//  $email = $_POST['email'];
//  $password = md5($_POST['password']);
//  $cpassword = md5($_POST['cpassword']);

if(isset($_POST['username']) && 
   isset($_POST['fullName']) && 
   isset($_POST['email']) && 
   isset($_POST['password'])){

   //  include "../db_conn.php";
   include('../config.php');

   //  $fname = $_POST['fname'];
   //  $uname = $_POST['uname'];
   //  $pass = $_POST['pass'];

   $username = $_POST['username'];
   $fullName = $_POST['fullName'];
   $email = $_POST['email'];
   $password = md5($_POST['password']);
   $cpassword = md5($_POST['cpassword']);

   $data = "username=".$username."&fullName=".$fullName;

   //  $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($username)) {
    	$em = "Full name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($fullName)){
    	$em = "User name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($email)){
      $em = "User name is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
   }else if(empty($password)){
    	$em = "Password is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else {
      // hashing the password
      $pass = password_hash($password, PASSWORD_DEFAULT);

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
            $sql = "INSERT INTO admin (username, fullName, email, password, Profile_Photo)
            VALUES(?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username, $fullName, $email, $password, $new_img_name]);
            // header("Location: ../${_SESSION['folder']}/prof.php");
            header("Location: ../prof.php?success=Your account has been created successfully");
            exit;
        }else {
           $em = "You can't upload files of this type";
         //   header("Location: ../${_SESSION['folder']}/prof.php");
           header("Location: ../prof.php?error=$em&$data");
           exit;
        }
     }else {
        $em = "unknown error occurred!";
      //   header("Location: ../${_SESSION['folder']}/prof.php");
        header("Location: ../prof.php?error=$em&$data");
        exit;
     }
  }else {
      $sql = "INSERT INTO admin (username, fullName, email, password) VALUES(?,?,?,?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$username, $fullName, $email, $password]);
      // $stmt->execute([$fname, $uname, $pass]);
      header("Location: ../${_SESSION['folder']}/prof.php");
      header("Location: ../prof.php?success=Your account has been created successfully");
      exit;
  }
}


}else {
header("Location: ../index.php?error=error");
exit;
}
