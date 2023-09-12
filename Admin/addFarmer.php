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
        <h1 class="text-left text-gray-900">&nbsp Add New Farmer </h1>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="form-body">
                            <!-- <div class="row"> -->
                                <div class="form-holder">
                                    <div class="form-content">
                                        <div class="form-items">
                                            <div class="container-fluid">
                                                <h2 class="text-center text-gray-900">Create Account</h2>
                                                    <p>*Fill in the data below and Write N/A if not applicable.</p>
                                                    <form method="POST" action="../databaseHandlers/addFarmer.php"> 
                                                    <form class="requires-validation" novalidate><input type="hidden" name="id">
                                                        <div class="mb-3">
                                                                    <label for="username" class="form-label">Username</label>
                                                                    <input required type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email Address</label>
                                                                    <input required type="email" name="email" class="form-control" id="email" placeholder="123@example.com">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="password" class="form-label">Password</label>
                                                                    <input required type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="cpassword" class="form-label">Repeat password</label>
                                                                    <input required type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                                                                </div>
                                                                    <hr class="dashed ">
                                                                    <h2 class="text-center text-gray-900">Personal Information</h2>
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">First Name</label>
                                                                    <input required type="text" class="form-control" name="name" id="name" placeholder="Enter First Name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="middleName" class="form-label">Middle Name</label>
                                                                    <input required type="text" class="form-control" name="middleName" id="middleName" placeholder="Enter Middle Name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="surname" class="form-label">Last Name</label>
                                                                    <input required type="text" class="form-control" name="surname" id="surname" placeholder="Enter Last Name">
                                                                </div>
                                                                <label for="Gender" class="form-label">Gender</label><br>
                                                                <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input required type="radio" name="gender" id="female" value="Female">
                                                                    <label class="form-check-label" for="female">Female</label>&nbsp;&nbsp;&nbsp;
                                                                    <input required type="radio" name="gender" id="male" value="Male">
                                                                    <label class="form-check-label" for="male">Male</label>
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
                                                                <div class="mb-3">
                                                                    <label for="username" class="form-label">Address</label>
                                                                    <input required type="text" class="form-control" name="address" id="address" placeholder="Enter Complete Address">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="username" class="form-label">Contact Number</label>
                                                                    <input required type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="09*********">
                                                                </div>
                                                                    <!-- FOR CROPS DROPDOWN -->
                                                                    <div class="mb-3">
                                                                        <?php
                                                                        $sql = "SELECT crops FROM crops";
                                                                        try {
                                                                            $stmt = $pdo->prepare($sql);
                                                                            $stmt->execute();
                                                                            $results = $stmt->fetchAll();
                                                                        } catch (Exception $ex) {
                                                                            echo ($ex->getMessage());
                                                                        }
                                                                        ?>
                                                                        <label for="crops" class="form-label">Crops</label>
                                                                        <select class="form-control" name="crops" name="crops" id="crops" required>
                                                                            <option selected disabled value="">Select Crops</option>
                                                                            <?php foreach ($results as $output) { ?>
                                                                                <option><?php echo $output["crops"]; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>

                                                                <div class="valid-feedback"></div>
                                                                <div class="invalid-feedback">Please input Information</div>
                                                            
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light"><a href="farmerProfile.php"><i class="fas fa-angle-left fa-lg text-dark-100"></i> </button>
                                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-lg text-dark-100"></i> Create Account</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </form> 
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                    </div>
                </div>
            </div>
        <script src="js/script.js"></script>
    </body>
</html>







<?php
include('includes/footer.php')
?>
