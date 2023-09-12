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
            <h2 class="text-left text-gray-900">Farmer: Edit Information</h2>
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
                                                        $farmer_id = $_GET['id'];

                                                        $query = "SELECT * FROM farmer1 WHERE id=:far_id LIMIT 1";
                                                        // $query = "SELECT * FROM students WHERE id=:stud_id LIMIT 1";
                                                        $statement = $pdo->prepare($query);
                                                        $data = [

                                                            ':far_id' => $farmer_id

                                                        ];

                                                        $statement->execute($data);

                                                        $result = $statement->fetch(PDO::FETCH_OBJ);
                                                    }

 
                                                    ?>

                                                    <form method="POST" action="../databaseHandlers/updateFarmer.php">
                                                    <form class="requires-validation" novalidate> <input type="hidden" name="farmer_id"  value="<?=$result->id?>">
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
                                                                <!-- <hr class="dashed "> -->
                                                                <h3 class="text-center text-gray-900">Personal Information</h3>
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">First Name</label>
                                                                    <input required type="text" class="form-control" name="name" id="name" value="<?=$result->name; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="middleName" class="form-label">Middle Name</label>
                                                                    <input required type="text" class="form-control" name="middleName" id="middleName" value="<?=$result->middleName; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="surname" class="form-label">Last Name</label>
                                                                    <input required type="text" class="form-control" name="surname" id="surname" value="<?=$result->surname; ?>">
                                                                </div>
                                                                <label for="username" class="form-label">Gender</label><br>
                                                                <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input required type="radio" name="gender" id="female" value="Female">
                                                                    <label class="form-check-label" for="female">Female</label> &nbsp;&nbsp;&nbsp;
                                                                    <input required type="radio" name="gender" id="male" value="Male" >
                                                                    <label class="form-check-label" for="male">Male</label>
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
                                                                    <input required type="text" class="form-control" name="contactNumber" id="contactNumber" value="<?=$result->contactNumber; ?>">
                                                                </div>
                                                                    <!-- <div class="form-check form-check-inline">
                                                                        <label class="form-check-label">Crops</label></br>
                                                                        <input class="form-check-input" type="checkbox" id="rice" value="rice">
                                                                        <label class="form-check-label" for="rice">Rice</label>
                                                                    </div><br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" id="corn" value="corn">
                                                                        <label class="form-check-label" for="corn">Corn</label>
                                                                    </div> -->

                                                                    <!-- <div class="mb-3">
                                                                        <label class="form-check-label">Crops</label></br>
                                                                            <select name="crops">
                                                                                <option value="rice"> Rice </option>
                                                                                <option value="corn"> Corn </option>
                                                                                <option value="flour"> Poultry </option>
                                                                            </select>
                                                                    </div> -->

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
                                                                    <button type="button" class="btn"><a href="farmerProfile.php"><i class="fas fa-angle-left fa-lg text-dark-100"></i> Back</button>
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
