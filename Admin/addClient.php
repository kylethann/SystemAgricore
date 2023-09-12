 <?php 
include ('../config.php');
include('includes/header.php');
// require_once ('../util_func.php');
// session_start();

$query="select * from customer";
$result= $pdo->query($query); 



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
        <h1 class="text-Left text-gray-900">&nbsp Add New Client </h1>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="form-body">
                            <!-- <div class="row"> -->
                                <div class="form-holder">
                                    <div class="form-content">
                                        <div class="form-items">
                                            <div class="container-fluid">
                                            <!-- <h1 class="text-center text-gray-900">Client Profile</h1> -->
                                                <h2 class="text-center text-gray-900">Create Account</h2>
                                                    <p>*Fill in the data below and Write N/A if not applicable.</p>
                                                    <form action="../databaseHandlers/addClient.php" method="POST" >
                                                        <div class="mb-3">
                                                                    <label for="username" class="form-label">Username</label>
                                                                    <input required type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email address</label>
                                                                    <input required type="email" name="email" class="form-control" id="email" placeholder="123@example.com">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="password" class="form-label">Password</label>
                                                                    <input required type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="cpassword" class="form-label">Repeat password</label>
                                                                    <input required type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Repeat password">
                                                                </div>
                                                                    <hr class="dashed ">
                                                                <h2 class="text-center text-gray-900">Personal Information</h2>
                                                                <div class="mb-3">
                                                                    <label for="full_name" class="form-label">First Name</label>
                                                                    <input required type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter Name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="middle_name" class="form-label">Middle Name</label>
                                                                    <input required type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Middle Name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="last_name" class="form-label">Last Name</label>
                                                                    <input required type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="address" class="form-label">Address</label>
                                                                    <input required type="text" class="form-control" name="address" id="address" placeholder="Enter Complete Address">
                                                                </div>
                                                                    <!-- <div class="mb-3">
                                                                        <label for="username" class="form-label">Birthday</label>
                                                                        <input required type="date" class="form-control" name="birthday" id="birthday" placeholder="dd/mm/yyyy">
                                                                    </div> -->
                                                                <div class="mb-3">
                                                                    <label for="contact_number" class="form-label">Contact Number</label>
                                                                    <input required type="text" class="form-control" name="contact_number" id="contact_number" placeholder="09*********">
                                                                </div>
                                                                <!-- <div class="valid-feedback"></div>
                                                                <div class="invalid-feedback">Please input Information</div> -->
                                                            
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light"><a href="clientProfile.php"><i class="fas fa-angle-left fa-lg text-light-100"></i></button>
                                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-lg text-dark-100"></i> Create Account</button>
                                                                </div>
                                                            </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
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