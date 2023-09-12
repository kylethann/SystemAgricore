<?php 
include('../config.php');
include('includes/header.php');

 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <meta charset="UTF-8">
        <title>Account Set-Up</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'> -->
        <link rel="stylesheet" href="css/tblEdit.css">
        
    </head>

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
                                        <p>*Fill in the data below and Write N/A if not applicable.</p>
                                        <form method="POST" action="../databaseHandlers/addAdmin.php">
                                            <form class="requires-validation" novalidate><input type="hidden" name="id">
                                            <!-- <hr class="dashed "> -->
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
                                            </div><hr class="dashed ">
                                           <h2 class="text-center text-gray-900">Personal Information</h2>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Fullname</label>
                                                <input required type="fullName" name="fullName" class="form-control" id="fullName" placeholder="Enter Fullname">
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Address</label>
                                                <input required type="text" class="form-control" name="address" id="address" placeholder="Enter Complete Address">
                                            </div>
                                            <label for="Gender" class="form-label">Gender</label><br>
                                            <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input required type="radio" name="gender" id="female" value="Female">
                                                <label class="form-check-label" for="female">Female</label>&nbsp;&nbsp;&nbsp;
                                                <input required type="radio" name="gender" id="male" value="Male">
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contactNumber" class="form-label">Contact Number</label>
                                                <input required type="text" name="contactNumber" class="form-control" id="contactNumber" placeholder="Enter Contact Number">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <label for="full_name" class="form-label">Age</label>
                                                    <input required type="text" class="form-control" name="age" id="age" placeholder="Enter your Age">
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="form-column">
                                                        <label for="username" class="form-label">Birthday</label>
                                                        <input required type="date" class="form-control" name="birthday" id="birthday" placeholder="dd/mm/yyyy">
                                                    </div>
                                                </div>
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