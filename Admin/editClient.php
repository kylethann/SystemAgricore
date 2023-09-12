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
            <h2 class="text-Left text-gray-900">Client: Edit Information</h2>
                <div class="card mb-4">
                    <div class="form-body">
                            <!-- <div class="row"> -->
                                <div class="form-holder">
                                    <div class="form-content">
                                        <div class="form-items">
                                            <div class="container">
 
                                                <?php
                                                    if(isset($_GET['id']))
                                                    {
                                                        $client_id = $_GET['id'];

                                                        $query = "SELECT * FROM customer WHERE id=:cus_id LIMIT 1";
                                                        $statement = $pdo->prepare($query);
                                                        $data = [

                                                            ':cus_id' => $client_id

                                                        ];

                                                        $statement->execute($data);

                                                        $result = $statement->fetch(PDO::FETCH_OBJ);
                                                    }

 
                                                    ?>

                                                    <form method="POST" action="../databaseHandlers/updateClient.php">
                                                    <form class="requires-validation" novalidate> <input type="hidden" name="client_id"  value="<?=$result->id?>">
                                                    <!-- <hr class="dashed "> -->
                                                    <br>
                                                    <h3 class="text-center text-gray-900">User Account</h3>
                                                        <div class="mb-3 flex">
                                                                    <label for="username" class="form-label">Username</label>
                                                                    <input required type="text" class="form-control" name="username" id="username" value="<?=$result->username; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email Address</label>
                                                                    <input required type="email" name="email" class="form-control" id="email" value="<?=$result->email; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="password" class="form-label">Password</label>
                                                                    <input required type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                                                    <input required type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                                                                </div>
                                                                <h3 class="text-center text-gray-900">Personal Information</h3>
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">First Name</label>
                                                                    <input required type="text" class="form-control" name="full_name" id="full_name" value="<?=$result->full_name; ?>">
                                                                </div>
                                                                <div class="mb-3"> 
                                                                    <label for="middleName" class="form-label">Middle Name</label>
                                                                    <input required type="text" class="form-control" name="middle_name" id="middle_name" value="<?=$result->middle_name; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="surname" class="form-label">Last Name</label>
                                                                    <input required type="text" class="form-control" name="last_name" id="last_name" value="<?=$result->last_name; ?>">
                                                                </div>
                                                                <!-- <div class="form-check form-check-inline">
                                                                    <label for="username" class="form-label">Gender</label></br>
                                                                    <input class="form-check-input" type="radio" name="gender" id="female" value="<?=$result->gender; ?>">
                                                                    <label class="form-check-label" for="female">Female</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="gender" id="male" value="<?=$result->gender; ?>">
                                                                    <label class="form-check-label" for="male">Male</label>
                                                                </div> -->
                                                                    <!-- <div class="mb-3">
                                                                        <label for="full_name" class="form-label">Age</label>
                                                                        <input required type="text" class="form-control" name="age" id="age" placeholder="Enter your Age">
                                                                    </div> -->
                                                                <div class="mb-3">
                                                                    <label for="username" class="form-label">Address</label>
                                                                    <input required type="text" class="form-control" name="address" id="address" value="<?=$result->address; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="username" class="form-label">Contact Number</label>
                                                                    <input required type="text" class="form-control" name="contact_number" id="contact_number" value="<?=$result->contact_number; ?>">
                                                                </div>
                                                                <div class="valid-feedback"></div>
                                                                <div class="invalid-feedback">Please input Information</div>
                                                            
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn" ><a href="clientProfile.php"><i class="fas fa-angle-left fa-lg text-dark-100"></i> Back</button>
                                                                    <button type="submit" name="update" class="btn">Update</button>
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
            </div>
        <script src="js/script.js"></script>
    </body>
</html>

<?php
include('includes/footer.php')
?>
