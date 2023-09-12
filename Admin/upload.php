<?php
include('../config.php');

if (isset($_POST['upload'])) {
    // Check if a file was uploaded
    if (isset($_FILES['Profile_Photo'])) {
        $file_name = $_FILES['Profile_Photo']['name'];
        $file_tmp = $_FILES['Profile_Photo']['tmp_name'];
        $file_size = $_FILES['Profile_Photo']['size'];
        $file_type = $_FILES['Profile_Photo']['type'];
        
        // Validate file type (you can add more validation if needed)
        if (strpos($file_type, 'image/') !== false) {
            // Move the uploaded file to a server directory
            $upload_dir = 'upload/';
            $target_file = $upload_dir . $file_name;

            if (move_uploaded_file($file_tmp, $target_file)) {
                // Insert the file path into the database
                $insert_query = "INSERT INTO farmer (username, fullName, gender, age, contactNumber, address, birthday, crops, email, password, profilePhoto) VALUES (:username, :fullName, :gender, :age, :contactNumber, :address, :birthday, :crops, :email, :password, :profilePhoto)";
                $stmt = $pdo->prepare($insert_query);
                $stmt->bindParam(':username', $_POST['username']);
                $stmt->bindParam(':fullName', $_POST['fullName']);
                $stmt->bindParam(':gender', $_POST['gender']);
                $stmt->bindParam(':age', $_POST['age']);
                $stmt->bindParam(':contactNumber', $_POST['contactNumber']);
                $stmt->bindParam(':address', $_POST['address']);
                $stmt->bindParam(':birthday', $_POST['birthday']);
                $stmt->bindParam(':crops', $_POST['crops']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':password', $_POST['password']);
                $stmt->bindParam(':profilePhoto', $target_file);
                
                if ($stmt->execute()) {
                    echo "Profile photo uploaded successfully!";
                } else {
                    echo "Failed to upload profile photo.";
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type. Only image files are allowed.";
        }
    }
}
?>
