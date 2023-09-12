<?php 
include('../config.php');
include('includes/header.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is selected
    if ($_FILES["profile_picture"]["error"] == UPLOAD_ERR_OK) {
        // Get the temporary file location
        $tmp_file = $_FILES["profile_picture"]["tmp_name"];

        // Read the file content
        $profile_picture_data = file_get_contents($tmp_file);

        // Prepare and execute the SQL query
        $sql = "INSERT INTO admin (Profile_Photo) VALUES (:Profile_Photo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Profile_Photo', $profile_picture_data, PDO::PARAM_LOB);
        $stmt->execute();

       
    try {
      $stmt->execute();
      echo "Photo saved successfully!";
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <meta charset="UTF-8">
        <title>Account Set-Up</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'> -->
        <link rel="stylesheet" href="css/tblEdit.css">

        <style>
   

    .form-container {
      display: flex;
      flex-direction: column;
      align-items: left;
    }

    .form-container2 {
      display: flex;
      flex-direction: column;
      align-items: left;
    }

    .preview-container {
      width: 200px;
      height: 200px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: left;
      overflow: hidden;
    }

    .preview-image {
      max-width: 200%;
      max-height: 200%;
      border-radius: 50%;
    }
  </style>
        
    </head>
   <!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'><link rel="stylesheet" href="../css/style.css"> -->


    <body>
    <?php if (isset($_SESSION['flash_message'])) : ?>
        <div class="alert alert-<?= $_SESSION['alert'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['flash_message'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
          unset($_SESSION['flash_message']);
          unset($_SESSION['alert']);
        endif;
        ?>
        <div class="card mb-4 ">
        <h1 class="text-left text-gray-900">&nbsp Add New Admin</h1>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="form-body">
                        <div class="form-holder">
                            <div class="form-content">
                                <div class="form-items">
                                    <div class="container-fluid">
                                        <h2 class="text-center text-gray-900">Create Account</h2>
                                        
                                        
                                        <!-- <form action="upload2.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                            <input type="file" name="profile_photo" accept="image/*">
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="upload" value="Upload">
                                            </div>
                                        </form> -->
                                        <!-- <form action="upload3.php" method="POST" enctype="multipart/form-data">
                                            <input type="file" name="profile_photo" accept="image/*">
                                            <input type="submit" name="upload" value="Upload">
                                        </form> -->

                                        <p>*Fill in the data below and Write N/A if not applicable.</p>
                                        
                                         <hr class="dashed ">
                                        <form method="POST" action="../databaseHandlers/addAdmin.php">
                                            <form class="requires-validation" novalidate><input type="hidden" name="id">
                                            <!-- <hr class="dashed "> -->
                                            <div class="form-container">
                                                <div class="preview-container">
                                                <img id="preview" src="stock-photo.jpg" alt="Preview" class="preview-image">
                                            </div>

                                            <div class="form-container2">
                                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                                                </form>
                                                <br>
                                            <!-- <button class="remove-button" onclick="removeImage()">Remove Picture</button> -->
                                        
                                        <!-- </div> -->
                                            <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
                                                <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                                            </form> -->
                                            <!-- <div class="mb-3 text-center">
                                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                                    <img id="preview" src="stock-photo.jpg" alt="Preview" class="preview-image" style="width: 150px;"><br><br>
                                                    <input type="file" id="profile_photo" name="profile_photo" accept="image/*" onchange="previewImage(event)">
                                                </form>
                                            </div> -->
                                            <!-- <hr class="dashed "> -->
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input required type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Fullname</label>
                                                <input required type="fullName" name="fullName" class="form-control" id="fullName" placeholder="Enter Fullname">
                                            </div>
                                            <div class="mb-3 ">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input required type="email" name="email" class="form-control" id="email" placeholder="123@example.com">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input required type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                            </div>
                                            <div class="mb-3">
                                                <label for="cpassword" class="form-label">Repeat Password</label>
                                                <input required type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                                            </div>
                                            <div class="valid-feedback"></div>
                                            <div class="invalid-feedback">Please input Information</div>
                                                                
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"><a href="users.php"><i class="fas fa-angle-left fa-lg text-dark-100"></i></button>
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-lg text-dark-100"></i> Create Account</button>
                                            </div>
                                            </form>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <script src="js/script.js"></script>
        
        <script>
                        function previewImage(event) {
                          var reader = new FileReader();
                          reader.onload = function(){
                            var output = document.getElementById('preview');
                            output.style.display = 'block';
                            output.src = reader.result;
                          };
                          
                          if (event.target.files[0]) {
                            reader.readAsDataURL(event.target.files[0]);
                          } else {
                            var output = document.getElementById('preview');
                            output.style.display = 'block';
                            output.src = 'stock-photo.jpg'; // Placeholder image source
                          }
                        };
                        function removeImage() {
                          var output = document.getElementById('preview');
                          output.style.display = 'block';
                          output.src = 'stock-photo.jpg'; // Revert to the stock image
                          var fileInput = document.getElementById('profilePicture');
                          fileInput.value = ""; // Clear the file input value
                        }
                      </script>
    </body>
</html>

<?php
include('includes/footer.php')
?>

<!-- 

<div class="card-body text-right rounded-left  ">
                                                <img src="assets/profile-placeholder.jpg" alt="" class="rounded-circle img-fluid" style="width: 150px;">
                                                Photo modal
                                                <div class="justify-content-left mb-2">
                                                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                                                    <button type="file" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#profileModal">
                                                        Upload Profile Pic
                                                    </button>
                                                </div>
                                            </div> -->