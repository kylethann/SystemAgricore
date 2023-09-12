<?php
    require_once '../config.php';
    if(isset($_POST['submit'])){
        $userid=intval($_GET['id']);

        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];

        $location="upload/".$file_name;

        if($file_size < 514880){
            if(move_uploaded_file($file_tmp,$location)){
                try{
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERR_MODE_EXCEPTION);
                    $sql="UPDATE admin SET Profile_Photo='$location' WHERE id='$userid'";
                    $pdo->exec($sql);
                }catch(PDOEexception $e){
                    echo $e->getMessage();
                }
                $pdo= null;
                header('location: users.php');
            }
        }else{
            echo "<script>alert('File size is too large to upload');</script>";
        }
    }
?>