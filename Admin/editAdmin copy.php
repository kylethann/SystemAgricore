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
        <div class="card mb-4 ">
            <div class="card-body">
            <h2 class="text-left text-gray-900">Admin: Edit Information</h2>
                <div class="card mb-4">
                    <div class="form-body">
                        <div class="form-holder">
                            <div class="form-content">
                                <div class="form-items">
                                    <div class="container-fluid">
                                        
                                            <?php
                                                if(isset($_GET['id']))
                                                    
                                                {
                                                    $admin_id = $_GET['id'];

                                                    $query = "SELECT * FROM admin WHERE id=:adm_id LIMIT 1";
                                                    $statement = $pdo->prepare($query);
                                                    $data = [

                                                        ':adm_id' => $admin_id

                                                    ];

                                                    $statement->execute($data);
                                                    $result = $statement->fetch(PDO::FETCH_OBJ);
                                                }

                                            ?>
                                            <form method="POST" action="../databaseHandlers/updateAdmin.php">
                                                <form class="requires-validation" novalidate> <input type="hidden" name="admin_id"  value="<?=$result->id?>">
                                                <br>
                                                <!-- <hr class="dashed "> -->
                                                    <!-- <div class="mb-3 text-center">
                                                        <form action="upload.php" method="post" enctype="multipart/form-data">
                                                            <img id="preview" src="stock-photo.jpg" alt="Preview" class="preview-image" style="width: 150px;"><br><br>
                                                            <input type="file" id="profile_photo" name="profile_photo" accept="image/*" onchange="previewImage(event)"  value="<?=$result->profile_photo; ?>">
                                                            <br><br>
                                                            <button class="remove-button" onclick="removeImage()">Remove Picture</button>
                                                        </form>
                                                    </div> -->
                                                    <!-- <div class="mb-3 text-right">
                                                        <img id="preview" src="stock-photo.jpg" alt="Preview" class="preview-image" style="width: 150px;"><br><br>
                                                        <input type="file" id="profile_photo" name="profile_photo" accept="image/*" onchange="previewImage(event)">
                                                        <br>
                                                        <button class="remove-button" onclick="removeImage()">Remove Picture</button>
                                                    </div>   -->
                                                    <!-- <hr class="dashed "> -->
                                                    <h3 class="text-center text-gray-900">User Account</h3>
                                                    <div class="mb-3 flex">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input required type="text" class="form-control" name="username" id="username" value="<?=$result->username; ?>">
                                                    </div>
                                                    <div class="mb-3 flex">
                                                        <label for="email" class="form-label">Email Address</label>
                                                        <input required type="email" name="email" class="form-control" id="email" value="<?=$result->email; ?>">
                                                    </div>
                                                    <div class="mb-3 flex">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input required type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                                    </div>
                                                    <div class="mb-3 flex">
                                                        <label for="cpassword" class="form-label">Confrim Password</label>
                                                        <input required type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                                                    </div>

                                                    <h2 class="text-center text-gray-900">Personal Information</h2>
                                                    <div class="mb-3 flex"> 
                                                        <label for="email" class="form-label">Full Name</label>
                                                        <input required type="fullName" name="fullName" class="form-control" id="fullName" value="<?=$result->fullName; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Address</label>
                                                        <input required type="text" class="form-control" name="address" id="address" value="<?=$result->address; ?>">
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
                                                        <input required type="text" name="contactNumber" class="form-control" id="contactNumber" value="<?=$result->contactNumber; ?>">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-column">
                                                            <label for="full_name" class="form-label">Age</label>
                                                            <input required type="text" class="form-control" name="age" id="age" value="<?=$result->age; ?>">
                                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-column">
                                                                <label for="username" class="form-label">Birthday</label>
                                                                <input required type="date" class="form-control" name="birthday" id="birthday" value="<?=$result->birthday; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="valid-feedback"></div>
                                                    <div class="invalid-feedback">Please input Information</div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn"><a href="users.php"><i class="fas fa-angle-left fa-lg text-dark-100"></i> Back</button>
                                                        <button type="submit" name="update" class="btn">Update</button>
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
        </div>
        <script src="js/script.js"></script>
    </body>
</html>

<?php
include('includes/footer.php')
?>
